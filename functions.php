<?php

/** Style and script files */
require_once get_parent_theme_file_path( 'inc/load-scripts.php' );

/** Theme setup files */
require_once get_parent_theme_file_path( 'inc/theme-setup.php' );

/** Theme functions file */
require_once get_parent_theme_file_path( 'inc/tn-functions.php' );

/** Theme Customizer */
require_once get_parent_theme_file_path( 'inc/theme-customizer.php' );

/** 'Time Ago' feature file */
require_once get_parent_theme_file_path( 'inc/time-ago-format.php' );

/** Admin features file */
require_once get_parent_theme_file_path( 'inc/admin-features.php' );

/** Theme block styles and patterns */
require_once get_parent_theme_file_path( 'inc/blocks/styles/block-styles.php' );
require_once get_parent_theme_file_path( 'inc/blocks/patterns/block-patterns.php' );

/** Activate Plugins */
// TN GitHub Theme Updater
require_once get_parent_theme_file_path( 'inc/activate-plugins/activate-tn-theme-updater.php' );