<?php

/** Theme Customizer: Footer Credit */

function tn_footer_credit_customizer( $wp_customize ) {
    // Customizer Block: Create new customizer option for the theme
    $wp_customize->add_section( 'tn_footer_credit_sec', array( 
        'title' => __( 'Footer Credit', 'authentic-blog' ),
        'panel' => 'tn_theme_options',
        'priority' => 5,
    ) );
    
    // Customizer Form Output: Adding and saving values to the database & front-end
    $wp_customize->add_setting( 'tn_footer_credit_set', array(
        'type' => 'theme_mod',
        'default' => __( '©2025 Authentic Blog. Free WordPress Theme by Tahir Nurullah.', 'authentic-blog' ),
        'sanitize_callback' => 'wp_kses_post', // Sanitize HTML input (support HTML)
    ) );

    // Customizer Form: Adding controls and forms to the theme customizer area
    $wp_customize->add_control( 'tn_footer_credit_ctrl', array(
        'label' => __( 'Footer Credit Information', 'authentic-blog' ),
        'description' => __( 'Please provide the footer credit text for the bottom footer area (support "a" tag).', 'authentic-blog' ),
        'section' => 'tn_footer_credit_sec', // Link to the section
        'settings' => 'tn_footer_credit_set', // Link to the setting
        'type' => 'textarea',
    ) );
}
add_action( 'customize_register', 'tn_footer_credit_customizer' );