<!-- Custom Search Form -->
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="tn-fields-wrap">
        <span class="tn-close-search dashicons dashicons-dismiss"></span>
        <div class="tn-form-group">
            <input type="text" class="tn-form-field" name="s" id="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php echo esc_attr( __( 'Search', 'authentic-blog' ) ); ?>..." required>
        </div>
        <div class="tn-submit-wrap">
            <input type="submit" id="searchsubmit" class="tn-button tn-search-submit" value="<?php echo esc_attr( __( 'Search', 'authentic-blog' ) ); ?>">
        </div>
    </div>
</form>