<?php
/*
Plugin Name: TN GitHub Theme Updater
Description: Facilitates seamless theme updates directly from GitHub for themes developed by Tahir Nurullah.
Version: 1.0
Author: Tahir Nurullah
Author URI: http://tahirnurullah.com/
*/


/** Check for updates when WordPress loads **/
add_filter( 'site_transient_update_themes', 'tn_theme_github_check_for_update' );

function tn_theme_github_check_for_update( $transient ) {
    // Get the current theme version
    $current_version = wp_get_theme( 'authentic-blog' )->get( 'Version' );
    
    // Fetch the latest release from GitHub
    $response = wp_remote_get( 'https://api.github.com/repos/tahirnurullah/authentic-blog/releases/latest' );

    if ( is_wp_error( $response ) ) {
        return $transient; // Return if the request fails
    }

    $release = json_decode( wp_remote_retrieve_body( $response ), true );
    $latest_version = $release['tag_name']; // The latest version tag

    if ( version_compare( $current_version, $latest_version, '<' ) ) {
        // If a new version is available, add update info
        $transient->response['authentic-blog'] = (object) array(
            'theme'        => 'authentic-blog',
            'new_version'  => $latest_version,
            'url'          => $release['html_url'], // Link to the GitHub release page
            'package'      => $release['zipball_url'] // URL for downloading the ZIP file
        );
    }

    return $transient;
}


/** Allow WordPress to handle the update **/
add_filter( 'upgrader_source_selection', 'tn_theme_github_source_selection', 10, 2 );

function tn_theme_github_source_selection( $source, $remote ) {
    if ( isset( $remote['package'] ) && strpos( $remote['package'], 'authentic-blog.zip' ) !== false ) {
        // Handle the download and installation of the theme
        return $source;
    }
    return $source;
}