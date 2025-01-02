<?php

/** Block patterns for the theme */

// Register a hero section pattern.
function tn_register_hero_pattern() {
    register_block_pattern(
        'authentic-blog/tn-hero-section',
        array(
            'title' => __( 'Simple Hero Section', 'authentic-blog' ),
            'blockTypes' => array( 'core/paragraph', 'core/heading' ),
            'description' => __( 'A hero section with a heading, subheading, and call-to-action button.', 'authentic-blog' ),
            'content' => '
                <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"50px","bottom":"50px"}}},"backgroundColor":"light-blue"} -->
                <div class="wp-block-group alignfull has-light-blue-background-color has-background" style="padding-top:50px;padding-bottom:50px;">
                    <!-- wp:heading {"level":1,"textAlign":"center"} -->
                    <h1 class="has-text-align-center">' . __( 'Welcome to Authentic Blog', 'authentic-blog' ) . '</h1>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center">' . __( 'Discover amazing stories and insights.', 'authentic-blog' ) . '</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons">
                        <!-- wp:button -->
                        <div class="wp-block-button">
                            <a class="wp-block-button__link">' . __( 'Read More', 'authentic-blog' ) . '</a>
                        </div><!-- /wp:button -->
                    </div><!-- /wp:buttons -->
                </div><!-- /wp:group -->
            ',
        )
    );
}
add_action( 'init', 'tn_register_hero_pattern' );