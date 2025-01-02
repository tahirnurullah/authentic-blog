<section class="tn-section tn-page-header tn-archive-header">
    <div class="tn-container">
        <div class="tn-row">
            <div class="tn-col tn-page-header-col">
                <?php 
                    // Dynamic Archive Title
                    the_archive_title( '<h1 class="tn-page-heading">', '</h1>' );
                    // Dynamic Archive Description
                    the_archive_description( '<div class="tn-archive-desc">', '</div>' );
                    // Dynamic Post Count using _nx() Function
                    $archive_total_posts = $wp_query->found_posts;
                    $archive_item_text = sprintf( _nx( 'article', 'articles', $archive_total_posts, 'archive post count', 'authentic-blog' ), number_format_i18n( $archive_total_posts ) );
                ?>
                <div class="tn-line"><span class="tn-line-inner"></span></div>
                <?php if ( $archive_total_posts !== 0 ) : ?>
                    <p class="tn-archive-total">
                        <strong><?php echo esc_html( $archive_total_posts ); ?> </strong>
                        <?php echo esc_html( $archive_item_text ); ?> <?php esc_html_e( 'found in', 'authentic-blog' ); ?> 
                        <strong><?php echo esc_html( get_the_archive_title() ); ?></strong>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>