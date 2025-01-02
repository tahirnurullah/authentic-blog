<?php

/** Display edit buttons and icons for Admin in the Frontend */
function tn_edit_icon($editURL, $editHelpText) {
    if ( is_user_logged_in() ) { 
        if ( current_user_can( 'edit_theme_options' ) ) {
            echo '<a href="' . esc_url( admin_url( $editURL ) ) . '" class="tn-admin-edit-button" title="' . esc_attr( $editHelpText ) . '"><span class="dashicons dashicons-edit"></span></a>';
        }
    }
}