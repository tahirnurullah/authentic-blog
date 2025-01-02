<?php 

/** Automatically install and activate the TN GitHub Theme Updater plugin when the theme is activated **/

function activate_tn_github_theme_updater_plugin() {
    // Path to the folder containing the plugin
    $plugin_dir = get_template_directory() . '/bundled-plugins/tn-github-theme-updater';

    // Check if the plugin folder is already copied
    if ( file_exists( $plugin_dir ) && ! is_plugin_active( 'tn-github-theme-updater/tn-github-theme-updater.php' ) ) {
        // Install the plugin by copying the entire folder to the plugins directory
        if ( ! file_exists( WP_PLUGIN_DIR . '/tn-github-theme-updater' ) ) {
            mkdir( WP_PLUGIN_DIR . '/tn-github-theme-updater', 0755, true );
            // Copy the entire folder, not just the file
            tn_copy_directory( $plugin_dir, WP_PLUGIN_DIR . '/tn-github-theme-updater' );
        }
        
        // Activate the plugin
        activate_plugin( 'tn-github-theme-updater/tn-github-theme-updater.php' );
    }
}
add_action( 'after_switch_theme', 'activate_tn_github_theme_updater_plugin' );

/** Helper function to copy the directory and its contents **/
function tn_copy_directory( $source, $destination ) {
    // Ensure source is a directory
    if ( is_dir( $source ) ) {
        // Create destination directory if it doesn't exist
        if ( ! is_dir( $destination ) ) {
            mkdir( $destination, 0755, true );
        }

        // Copy all files and subdirectories from source to destination
        $files = array_diff( scandir( $source ), array( '.', '..' ) );
        foreach ( $files as $file ) {
            $sourcePath = $source . '/' . $file;
            $destinationPath = $destination . '/' . $file;

            if ( is_dir( $sourcePath ) ) {
                tn_copy_directory( $sourcePath, $destinationPath ); // Recursively copy directories
            } else {
                copy( $sourcePath, $destinationPath ); // Copy files
            }
        }
    }
}
