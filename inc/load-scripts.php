<?php

/** Load associate files for the theme */

function tn_load_scripts() {
    // Theme stylesheet
    wp_enqueue_style( 'main-style', get_stylesheet_uri(), array(), '1.00', 'all' );
    
    // Load dashicons on frontend
    wp_enqueue_style( 'dashicons' );
    
    // jQuery packages from WP
    wp_enqueue_script( 'jquery' );
    
    // Custom JS
    wp_enqueue_script( 'main-script', get_theme_file_uri( '/assets/js/custom.js' ), array( 'jquery' ), '1.00', true );
    
    // Script enqueued: comment-reply
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'tn_load_scripts' );