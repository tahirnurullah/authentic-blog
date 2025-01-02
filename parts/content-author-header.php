<section class="tn-section tn-page-header tn-archive-header tn-author-header">
    <div class="tn-container">
        <div class="tn-row">
            <!-- Author Avatar -->
            <div class="tn-col tn-author-header-img">
                <div class="tn-author-img-wrap">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
                </div>
            </div>
            
            <!-- Author Info -->
            <div class="tn-col tn-author-header-info">
                <div class="tn-author-info">
                    <!-- Get author meta -->
                    <?php
                        $author_fname = get_the_author_meta( 'first_name' );
                        $author_lname = get_the_author_meta( 'last_name' );
                        $author_name = get_the_author_meta( 'display_name' );
                        $author_description = get_the_author_meta( 'description' );
                        $author_email = get_the_author_meta( 'email' );
                        $author_website = get_the_author_meta( 'url' );
                        $author_posts_link = get_author_posts_url( get_the_author_meta( 'ID' ) );
                    ?>
                    
                    <h1 class="tn-page-heading tn-author-info-name"><?php echo esc_html( $author_name ); ?></h1>
                    <p class="tn-author-role"><?php tn_get_author_role(); ?></p>
                    <div class="tn-archive-desc tn-author-info-bio">
                        <?php if ( $author_description ) : ?>
                            <p><?php echo esc_html( $author_description ); ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Post count for Author using _nx() function -->
                    <?php 
                        // Dynamic Post Count
                        $archive_total_posts = $wp_query->found_posts;
                        $archive_item_text = sprintf( _nx( 'article', 'articles', $archive_total_posts, 'author post count', 'authentic-blog' ), number_format_i18n( $archive_total_posts ) );
                    ?>
                    <div class="tn-line"><span class="tn-line-inner"></span></div>
                    <?php if ( $archive_total_posts !== 0 ) : ?>
                        <p class="tn-archive-total">
                            <?php esc_html_e( 'Posted', 'authentic-blog' ); ?> 
                            <strong><?php echo esc_html( $archive_total_posts ); ?> </strong>
                            <?php echo esc_html( $archive_item_text ); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section> 