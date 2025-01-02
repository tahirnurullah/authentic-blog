<?php

/** Register various options for the theme */
function tn_configuration() {
    // Global Text Domain and languages file
    $tn_textdomain = 'authentic-blog';
    load_theme_textdomain( $tn_textdomain, get_template_directory() . '/languages' );

    // Register menus for the theme
    register_nav_menus( array(
        'main_menu'      => __( 'Main Menu', 'authentic-blog' ),
        'secondary_menu' => __( 'Secondary Menu', 'authentic-blog' ),
    ) );
    // Register dynamic title & tagline for the HTML title tag
    add_theme_support( 'title-tag' );
    // Register custom header for the theme
    add_theme_support( 'custom-header' );
    // Register post thumbnails (featured image) for the theme
    add_theme_support( 'post-thumbnails' );
    // Register post formats
    add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'link', 'quote' ) );
    // Register custom logo for the theme
    add_theme_support( 'custom-logo', array(
        'height'      => 66,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
    // Register custom background for the theme
    add_theme_support( 'custom-background', array(
        'default-size' => 'cover',
        'default-repeat' => 'no-repeat',
        'default-color' => 'ffffff',
        'flex-width'  => true,
    ) );
    // Register HTML5 markup for specific theme elements
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    // Register feed links for the post, comments, etc.
    add_theme_support( 'automatic-feed-links' );
    // Register responsive embed option for the theme
    add_theme_support( 'responsive-embeds' );
    // Register Align Wide (wide and full-width alignments for contents) for the theme
    add_theme_support( 'align-wide' );
    // Register editor sytem for the WordPress admin panel based on the theme
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/editor-style.css' );
    // Register block styles (Gutenberg) for the theme
    add_theme_support( 'wp-block-styles' );
}
add_action( 'after_setup_theme', 'tn_configuration', 0 );


/** Register sidebars for the theme */
function tn_register_sidebars() {
    // For Blog Pages
    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'authentic-blog' ),
	    'id'            => 'blog_sidebar',
	    'description'   => __( 'This is a blog sidebar placed in the Blog and Single Blog Pages. You can add your Widgets Here.', 'authentic-blog' ),
	    'before_widget' => '<div class="tn-sidebar tn-blog-sidebar">',
	    'after_widget'  => '</div>',
	    'before_title'  => '<h3 class="tn-sidebar-heading">',
	    'after_title'   => '</h3>'
    ) );

    // For Footer: 01
    register_sidebar( array(
        'name'          => __( 'Footer Sidebar: Column 01', 'authentic-blog' ),
	    'id'            => 'footer_sidebar_1',
	    'description'   => __( 'This is a footer sidebar placed in the footer area. You can add your Widgets Here.', 'authentic-blog' ),
	    'before_widget' => '<div class="tn-footer-sidebar tn-fs-1">',
	    'after_widget'  => '</div>',
	    'before_title'  => '<h3 class="tn-footer-sidebar-heading">',
	    'after_title'   => '</h3>'
    ) );
    // For Footer: 02
    register_sidebar( array(
        'name'          => __( 'Footer Sidebar: Column 02', 'authentic-blog' ),
	    'id'            => 'footer_sidebar_2',
	    'description'   => __( 'This is a footer sidebar placed in the footer area. You can add your Widgets Here.', 'authentic-blog' ),
	    'before_widget' => '<div class="tn-footer-sidebar tn-fs-2">',
	    'after_widget'  => '</div>',
	    'before_title'  => '<h3 class="tn-footer-sidebar-heading">',
	    'after_title'   => '</h3>'
    ) );
    // For Footer: 03
    register_sidebar( array(
        'name'          => __( 'Footer Sidebar: Column 03', 'authentic-blog' ),
	    'id'            => 'footer_sidebar_3',
	    'description'   => __( 'This is a footer sidebar placed in the footer area. You can add your Widgets Here.', 'authentic-blog' ),
	    'before_widget' => '<div class="tn-footer-sidebar tn-fs-3">',
	    'after_widget'  => '</div>',
	    'before_title'  => '<h3 class="tn-footer-sidebar-heading">',
	    'after_title'   => '</h3>'
    ) );
    // For Footer: 04
    register_sidebar( array(
        'name'          => __( 'Footer Sidebar: Column 04', 'authentic-blog' ),
	    'id'            => 'footer_sidebar_4',
	    'description'   => __( 'This is a footer sidebar placed in the footer area. You can add your Widgets Here.', 'authentic-blog' ),
	    'before_widget' => '<div class="tn-footer-sidebar tn-fs-4">',
	    'after_widget'  => '</div>',
	    'before_title'  => '<h3 class="tn-footer-sidebar-heading">',
	    'after_title'   => '</h3>'
    ) );
}
add_action( 'widgets_init', 'tn_register_sidebars' );