<?php
/*
Plugin Name: AB Theme Updater
Description: Handles updates for the Authentic Blog theme.
Version: 1.2
Author: Tahir Nurullah
Author URI: https://tahirnurullah.com/
*/

// Check for updates when WordPress loads
add_filter( 'site_transient_update_themes', 'tn_theme_check_for_update' );

function tn_theme_check_for_update( $transient ) {
    // Get the current theme version
    $current_version = wp_get_theme( 'authentic-blog' )->get( 'Version' );

    // Fetch the update information from your server
    $response = wp_remote_get( 'https://tahirnurullah.com/tn-updates/theme-update.php?version=' . time() );

    if ( is_wp_error( $response ) ) {
        return $transient; // Return if the request fails
    }

    $update_info = json_decode( wp_remote_retrieve_body( $response ), true ); // Ensure it is an array

    if ( version_compare( $current_version, $update_info['version'], '<' ) ) {
        // If a new version is available, add update info
        $transient->response['authentic-blog'] = array(
            'theme' => 'authentic-blog',
            'new_version' => $update_info['version'],
            'url' => $update_info['changelog'],
            'package' => $update_info['download_url']
        );
    }

    return $transient;
}

// Allow WordPress to handle the update
add_filter( 'upgrader_source_selection', 'tn_theme_source_selection', 10, 2 );
function tn_theme_source_selection( $source, $remote ) {
    if ( isset( $remote['package'] ) && strpos( $remote['package'], 'authentic-blog.zip' ) !== false ) {
        // Handle the download and installation of the theme
        return $source;
    }
    return $source;
}
