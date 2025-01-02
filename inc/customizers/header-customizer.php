<?php

/** Theme Customizer: Header */

function tn_header_customizer( $wp_customize ) {
    // Header: Arrange items from the main header area.
    $wp_customize->add_section( 'tn_header_sec', array(
        'title' => __( 'Header', 'authentic-blog' ),
        'panel' => 'tn_theme_options',
        'priority' => 1,
    ) );

    // Header: Enable / Disable fixed header
    $wp_customize->add_setting( 'tn_header_sticky_set', array(
        'type' => 'theme_mod',
        'default' => false,
        'sanitize_callback' => 'rest_sanitize_boolean', // Sanitize Checkbox field 
    ) );
    $wp_customize->add_control( 'tn_header_sticky_ctrl', array(
        'label' => __( 'Enable Fixed Header', 'authentic-blog' ),
        'description' => __( 'After enabling this option, the header will be sticky when the user scrolls down the page.', 'authentic-blog' ),
        'section' => 'tn_header_sec',
        'settings' => 'tn_header_sticky_set',
        'type' => 'checkbox',
    ) );

    // Header: Show / Hide search icon from the header (from main-menu area)
    $wp_customize->add_setting( 'tn_header_search_set', array(
        'type' => 'theme_mod',
        'default' => false,
        'sanitize_callback' => 'rest_sanitize_boolean', // Sanitize Checkbox field 
    ) );
    $wp_customize->add_control( 'tn_header_search_ctrl', array(
        'label' => __( 'Hide Search Icon', 'authentic-blog' ),
        'description' => __( 'Hide search icon from the header area.', 'authentic-blog' ),
        'section' => 'tn_header_sec',
        'settings' => 'tn_header_search_set',
        'type' => 'checkbox',
    ) );
}
add_action( 'customize_register', 'tn_header_customizer' );