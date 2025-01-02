<?php 

/** Remove all archive title prefixes, for example 'Category or Tag or Other' texts from archive title */
add_filter( 'get_the_archive_title_prefix', '__return_false' );


/** Get the user role for loop, and single pages */
function tn_get_author_role() {
    // Get the user ID (only apply in loop pages and single.php)
    $tn_author_id = get_the_author_meta('ID');
    // Get the autho user data using current user ID
    $tn_user = get_userdata( $tn_author_id );

    // Check if user exists and has roles
    if ( $tn_user && !empty( $tn_user->roles ) ) {
        // Return the first role (primary role)
        echo esc_html( $tn_user->roles[0] );
    } else {
        echo esc_html__( 'No role assigned', 'authentic-blog' );
    }
}


/** Dynamic class based on the customizers: Blog Setup -> Blog Grid & Columns */
function tn_dynamic_class_blog_grid() {
    // Get the Customizer setting from 'Blog Grid & Columns' Customizer
    $get_blog_grid_cols = get_theme_mod( 'tn_blog_grid_column_set', 'three_cols_including_sidebar' );
    
    $set_blog_grid_cols_class = '';
    if ( $get_blog_grid_cols === 'two_cols_including_sidebar' ) {
        $set_blog_grid_cols_class .= 'tn-two-cols-blog-row';
    } 
    elseif ( $get_blog_grid_cols === 'three_cols_without_sidebar' ) { 
        $set_blog_grid_cols_class .= 'tn-three-cols-blog-row';
    } 
    else {
        $set_blog_grid_cols_class .= 'tn-default-blog-row';
    }
    return $set_blog_grid_cols_class;
}


/** Dynamic class based on the customizers: Fixed Header Customizers */
function tn_dynamic_class() {
    if ( get_theme_mod( 'tn_header_sticky_set', false ) === true ) {
        return 'tn-fixed-header-enable';
    } else {
        return '';
    }
}