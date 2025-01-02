<section class="tn-section tn-page-header tn-archive-header tn-search-header">
    <div class="tn-container">
        <div class="tn-row">
            <div class="tn-col tn-page-header-col">
                <h1 class="tn-page-heading tn-search-result-title">
                    <?php esc_html_e( 'Showing results for', 'authentic-blog' ); ?>: 
                    <span class="tn-search-value">'<?php echo esc_html( get_search_query() ); ?>'</span>
                </h1>
                <!-- Count search results using _nx() function-->
                <?php
                    $count_search_item = $wp_query->found_posts;
                    $item_text = sprintf( _nx( 'post', 'posts', $count_search_item, 'search result count', 'authentic-blog' ), number_format_i18n( $count_search_item ) );
                ?>
                <div class="tn-line"><span class="tn-line-inner"></span></div>
                <?php if ( $count_search_item !== 0 ) : ?>
                    <p class="tn-archive-total">
                        <strong><?php echo esc_html( $count_search_item ); ?></strong> 
                        <?php echo esc_html( $item_text ); ?> <?php esc_html_e( 'found', 'authentic-blog' ); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>