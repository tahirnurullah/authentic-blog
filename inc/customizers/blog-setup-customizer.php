<?php

/** Theme Customizer: Blog Setup */

function tn_blog_setup_customizer( $wp_customize ) {
    // Blog Setup: Change the blog item's filters, orders, etc.
    $wp_customize->add_section( 'tn_blog_sec', array( 
        'title' => __( 'Blog Setup', 'authentic-blog' ),
        'panel' => 'tn_theme_options',
        'priority' => 3,
    ) );

    // Blog Setup: Top Title
    $wp_customize->add_setting( 'tn_blog_title_set', array(
        'type' => 'theme_mod',
        'default' => __( '<span>Blog</span> Posts', 'authentic-blog' ),
        'sanitize_callback' => 'wp_kses_post', // Sanitize HTML input (support HTML)
    ) );
    $wp_customize->add_control( 'tn_blog_title_ctrl', array(
        'label' => __( 'Blog Title', 'authentic-blog' ),
        'description' => __( 'Set the title for the blog posts section. (Support "span" tag).', 'authentic-blog' ),
        'section' => 'tn_blog_sec',
        'settings' => 'tn_blog_title_set',
        'type' => 'text',
    ) );


    // Blog Setup: Blog Grid (Blog Posts + Sidebar): 1/2/3 [Select Box]
    $wp_customize->add_setting( 'tn_blog_grid_column_set', array(
        'type' => 'theme_mod',
        'default' => 'three_cols_including_sidebar',
        'sanitize_callback' => 'sanitize_text_field', // Sanitize Select field (custom)
    ) );
    $wp_customize->add_control( 'tn_blog_grid_column_ctrl', array(
        'label' => __( 'Blog Grid & Columns', 'authentic-blog' ),
        'description' => __( 'Choose the layout for displaying blog posts.', 'authentic-blog' ),
        'section' => 'tn_blog_sec',
        'settings' => 'tn_blog_grid_column_set',
        'type' => 'select',
        'choices' => array(
            'three_cols_including_sidebar' => esc_html__( '3 Columns: Blog Posts + Sidebar (Default)', 'authentic-blog' ),
            'two_cols_including_sidebar' => esc_html__( '2 Columns: Blog Posts + Sidebar', 'authentic-blog' ),
            'three_cols_without_sidebar' => esc_html__( '3 Columns: Only Blog Posts (No Sidebar)', 'authentic-blog' ),
        ),
    ) );

    // Blog Setup: Publish Date Format [Select Box]
    $wp_customize->add_setting( 'tn_blog_publish_date_set', array(
        'type' => 'theme_mod',
        'default' => 'time_ago',
        'sanitize_callback' => 'sanitize_text_field', // Sanitize Select field (custom)
    ) );
    $wp_customize->add_control( 'tn_blog_publish_date_ctrl', array(
        'label' => __( 'Publish Date Format', 'authentic-blog' ),
        'description' => __( 'Select how the publish date is displayed.', 'authentic-blog' ),
        'section' => 'tn_blog_sec',
        'settings' => 'tn_blog_publish_date_set',
        'type' => 'select',
        'choices' => array(
            'normal_date' => esc_html__( 'Normal date format', 'authentic-blog' ),
            'time_ago' => esc_html__( 'Time ago format (Default)', 'authentic-blog' ),
            'time_ago_with_normal_date' => esc_html__( 'Time ago with normal date format', 'authentic-blog' ),
        ),
    ) );

    // Blog Setup: Default Featured Image [Upload]
    $wp_customize->add_setting( 'tn_blog_default_img_set', array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'absint', // Sanitize Number field (since image gives an ID when upload)
    ) );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'tn_blog_default_img_ctrl', array(
        'label' => __( 'Default Featured Image', 'authentic-blog' ),
        'description' => __( 'Upload default featured image for the post.', 'authentic-blog' ),
        'section' => 'tn_blog_sec',
        'settings' => 'tn_blog_default_img_set',
        'mime_type' => 'image',
    ) ) );

    // Blog Setup: Update post features (meta, block, etc.) from the loop [Checkbox]
    
    // 1. Add / Remove 'Comment' Icon & Count Text
    $wp_customize->add_setting( 'tn_comment_icon__set', array(
        'type' => 'theme_mod',
        'default' => false,
        'sanitize_callback' => 'rest_sanitize_boolean', // Sanitize Checkbox field 
    ) );
    $wp_customize->add_control( 'tn_comment_icon__ctrl', array(
        'label' => __( 'Show Comment Icon', 'authentic-blog' ),
        'description' => __( 'Show comment icon (witn count) on the post item from Blog Loop.', 'authentic-blog' ),
        'section' => 'tn_blog_sec',
        'settings' => 'tn_comment_icon__set',
        'type' => 'checkbox',
    ) );

    // 2. Add / Remove 'Post Excerpt' Block
    $wp_customize->add_setting( 'tn_post_excerpt__set', array(
        'type' => 'theme_mod',
        'default' => true,
        'sanitize_callback' => 'rest_sanitize_boolean', // Sanitize Checkbox field 
    ) );
    $wp_customize->add_control( 'tn_post_excerpt__ctrl', array(
        'label' => __( 'Show Post Excerpt', 'authentic-blog' ),
        'description' => __( 'Show post excerpt on the post item from Blog Loop.', 'authentic-blog' ),
        'section' => 'tn_blog_sec',
        'settings' => 'tn_post_excerpt__set',
        'type' => 'checkbox',
    ) );

    // 3. Add / Remove 'Tags' Option
    $wp_customize->add_setting( 'tn_post_tags__set', array(
        'type' => 'theme_mod',
        'default' => false,
        'sanitize_callback' => 'rest_sanitize_boolean', // Sanitize Checkbox field 
    ) );
    $wp_customize->add_control( 'tn_post_tags__ctrl', array(
        'label' => __( 'Show Post Tags', 'authentic-blog' ),
        'description' => __( 'Show post tags on the post item from Blog Loop.', 'authentic-blog' ),
        'section' => 'tn_blog_sec',
        'settings' => 'tn_post_tags__set',
        'type' => 'checkbox',
    ) );
}
add_action( 'customize_register', 'tn_blog_setup_customizer' );