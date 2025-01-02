<?php

/** Display the post publish date as 'Time Ago' format or other formats based on the selection from Customizer: 'Publish Date Format' */
function tn_show_time_ago( $post_id = null ) {
    if ( !$post_id ) {
        $post_id = get_the_ID(); // Use the current post ID if not provided
    }

    // Get the Customizer setting from 'Publish Date Format' Customizer
    $get_publish_date_format = get_theme_mod( 'tn_blog_publish_date_set', 'time_ago' );

    // Get the publish date from post
    $tn_post_date = get_the_date( 'U', $post_id ); // Get Unix timestamp of the publish date
    $tn_current_time = current_time( 'timestamp' ); // Get current time as Unix timestamp
    $tn_months_ago = strtotime( '-12 months', $tn_current_time ); // Calculate past 12 months with the current time

    // Show the time format based on the selection
    if ( $get_publish_date_format ) {
        if ( $get_publish_date_format === 'time_ago' ) {
            // Display the time ago format
            echo esc_html( human_time_diff( $tn_post_date, $tn_current_time ) ) . ' ' . esc_html__( 'ago', 'authentic-blog' );
        }
        elseif ( $get_publish_date_format === 'time_ago_with_normal_date' ) {
            if ( $tn_post_date > $tn_months_ago ) {
                // Display the time ago format before 12 months
                echo esc_html( human_time_diff( $tn_post_date, $tn_current_time ) ) . ' ' . esc_html__( 'ago', 'authentic-blog' );
            } else {
                // Display the normal publish date after 11 months
                echo esc_html( get_the_date( 'd F Y', $post_id ) );
            }
        }
        elseif ( $get_publish_date_format === 'normal_date' ) {
            // Display the normal publish date
            echo esc_html( get_the_date( 'd F Y', $post_id ) );
        }
        else {
            // Display the time ago format
            echo esc_html( human_time_diff( $tn_post_date, $tn_current_time ) ) . ' ' . esc_html__( 'ago', 'authentic-blog' );
        }
    }
}