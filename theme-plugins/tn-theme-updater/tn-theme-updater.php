<?php
/*
Plugin Name: TN GitHub Theme Updater
Description: Automatically provides updates for the 'authentic-blog' theme from GitHub.
Version: 1.0
Author: Tahir Nurullah
Author URI: https://tahirnurullah.com/
*/


if ( !class_exists( 'TN_GitHub_Theme_Updater' ) ) {
    class TN_GitHub_Theme_Updater
    {
        private $theme_slug = 'authentic-blog';
        private $github_user = 'tahirnurullah';
        private $repo_name = 'authentic-blog';
        private $github_api_url;
        private $transient_key;

        public function __construct()
        {
            $this->github_api_url = "https://api.github.com/repos/{$this->github_user}/{$this->repo_name}/releases";
            $this->transient_key = "{$this->theme_slug}_update_info";

            add_filter( 'site_transient_update_themes', [$this, 'check_for_updates'] );
            add_filter( 'upgrader_source_selection', [$this, 'rename_github_folder'], 10, 3 );
        }

        /**
         * Check for theme updates from GitHub.
         */
        public function check_for_updates( $transient )
        {
            if ( empty( $transient->checked ) ) {
                return $transient;
            }

            // Use a transient to reduce API calls
            $release_data = get_transient( $this->transient_key );
            if ( !$release_data ) {
                $response = wp_remote_get( $this->github_api_url, [
                    'headers' => [
                        'Accept' => 'application/vnd.github.v3+json',
                    ],
                ] );

                if ( is_wp_error( $response ) ) {
                    return $transient;
                }

                $release_data = json_decode( wp_remote_retrieve_body( $response ), true );
                if ( empty( $release_data ) ) {
                    return $transient;
                }

                set_transient( $this->transient_key, $release_data, HOUR_IN_SECONDS );
            }

            $latest_release = $release_data[0] ?? null;
            if ( !$latest_release || empty( $latest_release['tag_name'] ) ) {
                return $transient;
            }

            $latest_version = ltrim( $latest_release['tag_name'], 'v' );
            $current_version = wp_get_theme( $this->theme_slug )->get( 'Version' );

            if ( version_compare( $latest_version, $current_version, '>' ) ) {
                $transient->response[$this->theme_slug] = [
                    'new_version' => $latest_version,
                    'package'     => $latest_release['zipball_url'],
                    'url'         => $latest_release['html_url'],
                ];
            }

            return $transient;
        }

        /**
         * Rename the GitHub folder to match the theme slug after download.
         */
        public function rename_github_folder( $source, $remote_source, $upgrader )
        {
            if ( strpos( $source, $this->repo_name ) !== false ) {
                $new_source = trailingslashit( $remote_source ) . $this->theme_slug;
                rename( $source, $new_source );
                return $new_source;
            }

            return $source;
        }
    }

    new TN_GitHub_Theme_Updater();
}