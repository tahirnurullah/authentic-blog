<?php

/** Main Customizer */
function tn_theme_customizer( $wp_customize ) {
    // Customizer Panel: Main Section for all Customizer sections (Panel is Parent, and Section is Child)
    $wp_customize->add_panel( 'tn_theme_options', array(
        'title' => __( 'Theme Options', 'authentic-blog' ),
        'priority' => 30,
    ) );
}
add_action( 'customize_register', 'tn_theme_customizer' );


/** Customizer: Header Section */
require_once get_parent_theme_file_path( 'inc/customizers/header-customizer.php' );

/** Customizer: Blog Setup */
require_once get_parent_theme_file_path( 'inc/customizers/blog-setup-customizer.php' );

/** Customizer: Hero Section */
require_once get_parent_theme_file_path( 'inc/customizers/hero-customizer.php' );

/** Customizer: Footer Credit */
require_once get_parent_theme_file_path( 'inc/customizers/footer-customizer.php' );