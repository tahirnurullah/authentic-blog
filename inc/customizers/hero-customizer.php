<?php

/** Theme Customizer: Hero Section */

function tn_hero_section_customizer( $wp_customize ) {
    // Hero Section: Parent Section in the Customizer
    $wp_customize->add_section( 'tn_hero_sec', array( 
        'title' => __( 'Hero Section', 'authentic-blog' ),
        'panel' => 'tn_theme_options',
        'priority' => 4,
    ) );

    // Hero Section: Title
    $wp_customize->add_setting( 'tn_hero_title_set', array(
        'type' => 'theme_mod',
        'default' => __( '<span>Authentic Blog is a place</span> where you can find your perfect blogs', 'authentic-blog' ),
        'sanitize_callback' => 'wp_kses_post', // Sanitize HTML input (support HTML)
    ) );
    $wp_customize->add_control( 'tn_hero_title_ctrl', array(
        'label' => __( 'Hero Title', 'authentic-blog' ),
        'description' => __( 'Set the title for the hero section. You can use the "span" tag within the title text to highlight specific words or phrases, creating a styled effect in the hero area. For example, see the current design or default title text for reference. (Support only "span" tag).', 'authentic-blog' ),
        'section' => 'tn_hero_sec',
        'settings' => 'tn_hero_title_set',
        'type' => 'textarea',
    ) );

    // Hero Section: Text
    $wp_customize->add_setting( 'tn_hero_text_set', array(
        'type' => 'theme_mod',
        'default' => __( 'The foundation of authentic blogging is rooted in the idea that content should be honest and reflective of the blogger\'s true self.', 'authentic-blog' ),
        'sanitize_callback' => 'sanitize_textarea_field', // Sanitize Textarea field (does not support HTML)
    ) );
    $wp_customize->add_control( 'tn_hero_text_ctrl', array(
        'label' => __( 'Hero Text', 'authentic-blog' ),
        'description' => __( 'Provide short paragraph for the hero section.', 'authentic-blog' ),
        'section' => 'tn_hero_sec',
        'settings' => 'tn_hero_text_set',
        'type' => 'textarea',
    ) );

    // Hero Section: Button Text
    $wp_customize->add_setting( 'tn_hero_btntext_set', array(
        'type' => 'theme_mod',
        'default' => __( 'Learn More', 'authentic-blog' ),
        'sanitize_callback' => 'sanitize_text_field', // Sanitize Text field
    ) );
    $wp_customize->add_control( 'tn_hero_btntext_ctrl', array(
        'label' => __( 'Hero Button Text', 'authentic-blog' ),
        'description' => __( 'Provide text for the hero button.', 'authentic-blog' ),
        'section' => 'tn_hero_sec',
        'settings' => 'tn_hero_btntext_set',
        'type' => 'text',
    ) );

    // Hero Section: Button Link
    $wp_customize->add_setting( 'tn_hero_btnlink_set', array(
        'type' => 'theme_mod',
        'default' => __( '#', 'authentic-blog' ),
        'sanitize_callback' => 'esc_url_raw', // Sanitize URL field
    ) );
    $wp_customize->add_control( 'tn_hero_btnlink_ctrl', array(
        'label' => __( 'Hero Button Link', 'authentic-blog' ),
        'description' => __( 'Provide link for the hero button.', 'authentic-blog' ),
        'section' => 'tn_hero_sec',
        'settings' => 'tn_hero_btnlink_set',
        'type' => 'url',
    ) );

    // Hero Section: Image
    $wp_customize->add_setting( 'tn_hero_img_set', array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'absint', // Sanitize Number field (since image gives an ID when upload)
    ) );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'tn_hero_img_ctrl', array(
        'label' => __( 'Hero Image', 'authentic-blog' ),
        'description' => __( 'Upload image for the hero section.', 'authentic-blog' ),
        'section' => 'tn_hero_sec',
        'settings' => 'tn_hero_img_set',
        'mime_type' => 'image',
    ) ) );
}
add_action( 'customize_register', 'tn_hero_section_customizer' );