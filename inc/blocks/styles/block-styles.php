<?php

/** Block styles for the theme */

// Custom block styles for buttons.
function tn_register_block_styles() {
    register_block_style(
        'core/button',
        array(
            'name'  => 'outline',
            'label' => __( 'Outline', 'authentic-blog' ),
            'inline_style' => '.is-style-outline, .is-style-outline a { 
                border: 2px solid var(--wp--preset--color--primary); 
                background: transparent;
                color: var(--wp--preset--color--primary);
            }',
        )
    );

    register_block_style(
        'core/button',
        array(
            'name'  => 'rounded',
            'label' => __( 'Rounded', 'authentic-blog' ),
            'inline_style' => '.is-style-rounded, .is-style-rounded a { 
                border-radius: 50px;
                border: 2px solid var(--wp--preset--color--primary); 
                background: transparent;
                color: var(--wp--preset--color--primary);
            }',
        )
    );
}
add_action( 'init', 'tn_register_block_styles' );

// Custom block styles for headings.
function tn_register_heading_styles() {
    register_block_style(
        'core/heading',
        array(
            'name'  => 'highlight',
            'label' => __( 'Highlight', 'authentic-blog' ),
            'inline_style' => '.is-style-highlight { 
                background-color: var(--wp--preset--color--background-secondary);
                border-radius: 6px;
            }',
        )
    );
}
add_action( 'init', 'tn_register_heading_styles' );

// Custom block styles for columns.
function tn_register_columns_styles() {
    register_block_style(
        'core/columns',
        array(
            'name'  => 'shadow',
            'label' => __( 'Shadow', 'authentic-blog' ),
            'inline_style' => '.is-style-shadow {
                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
                padding: 30px;
                border-radius: 6px;
            }',
        )
    );
}
add_action( 'init', 'tn_register_columns_styles' );