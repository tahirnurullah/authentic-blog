<article id="tn-single-col-<?php the_ID(); ?>" <?php post_class( 'tn-single-col tn-single-col-contents' ); ?>>
    <!-- Content: Post Header -->
    <div class="tn-single-header">
        <!-- Post Category with Archive Link -->
        <?php if( has_category() ) : ?>
            <div class="tn-post-cat"><?php echo wp_kses_post( get_the_category_list( ' ' ) ); ?></div>
        <?php endif; ?>

        <!-- Post Title -->
        <div class="tn-title-single">
            <h1 class="tn-page-heading tn-single-heading"><?php the_title(); ?></h1>
        </div>

        <!-- Post Meta -->
        <div class="tn-post-meta-wrap">
            <!-- Post Author with Archive Link-->
            <div class="tn-post-meta tn-post-author">
                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="tn-author-link">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
                    <p class="tn-author-name"><?php echo esc_html( get_the_author() ); ?></p>
                </a>
            </div>
            
            <!-- Post Date with Time Ago Format -->
            <div class="tn-post-meta tn-post-date">
                <span class="dashicons dashicons-clock"></span>
                <p class="tn-post-date-text">
                    <?php 
                        if( function_exists( 'tn_show_time_ago' ) ) {
                            tn_show_time_ago(); 
                        } 
                    ?>
                </p>
            </div>

            <!-- Comment Icon, Link, and Count -->
            <?php if ( comments_open() ) : ?> 
                <div class="tn-post-meta tn-post-comments">
                    <a href="#post-comments" class="tn-post-comments-link">
                        <span class="dashicons dashicons-admin-comments"></span>
                        <p class="tn-post-comment-count"><?php echo esc_html( get_comments_number() ); ?></p>
                    </a>
                </div>
            <?php endif; ?>
        </div>

        <!-- Post Featured Image -->
        <?php if( has_post_thumbnail() ) : ?>
            <div class="tn-single-img-wrap"><?php the_post_thumbnail( 'full' ); ?></div>
        <?php endif; ?>
    </div>

    <!-- Content: Post Content -->
    <div class="tn-single-content-wrap">
        <div class="tn-single-content-inner">
            <div class="tn-page-content tn-single-content tn-clearfix">
                <?php the_content(); ?>
            </div>
            <?php
                // Add pagination for multi-page posts (pagination in the_content())
                wp_link_pages( array(
                    'before' => '<div class="tn-page-pagination-links">
                    <span class="tn-page-links-title">' . __( 'Pages:', 'authentic-blog' ) . '</span>',
                    'after' => '</div>',
                    'link_before' => '<span>',
                    'link_after' => '</span>',
                ) );
            ?>
        </div>
    </div>

    <!-- Post Tag with Archive Link -->
    <?php if( has_tag() ) : ?>
        <div class="tn-post-meta tn-post-tags">
            <p class="tn-post-tags-wrap">
                <span class="tn-tag-text-wrap">
                    <span class="dashicons dashicons-tag"></span> 
                    <span class="tn-tag-text"><?php esc_html_e( 'Tags', 'authentic-blog' ); ?>: </span>
                </span>
                <?php echo wp_kses_post( get_the_tag_list( '', ', ' ) ); ?>
            </p>
        </div>
    <?php endif; ?>

    <!-- Post Format -->
    <div class="tn-post-meta tn-post-format">
        <p class="tn-post-format-text">
            <?php esc_html_e( 'Post Format', 'authentic-blog' ); ?>: 
            <?php 
                if ( has_post_format() ) {
                    echo esc_html( get_post_format() );
                } else {
                    echo esc_html__( 'standard' , 'authentic-blog' );
                }
            ?>
        </p>
    </div>
</article>

<!-- Content: Author Info in Single Page -->
<div class="tn-author-wrap-sp">
    <div class="tn-author-info-wrap-sp">
        <div class="tn-author-avatar-sp">
            <div class="tn-author-avatar-wrap-sp"><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?></div>
        </div>
        <div class="tn-author-details-sp">
            <h3 class="tn-author-name-sp">
                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                    <?php echo esc_html( get_the_author() ); ?>
                </a>
            </h3>
            <p class="tn-author-role"><?php tn_get_author_role(); ?></p>
            <?php if ( get_the_author_meta( 'description' ) ) : ?>
                <div class="tn-author-bio-sp"><p><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p></div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Previous & Next Post Link -->
<div class="tn-post-navigations">
    <!-- Give class to single post navs -->
    <?php 
        // Next Post
        $tn_spnav_next = get_next_post();
        // Previous Post
        $tn_spnav_prev = get_previous_post();
    ?>

    <?php if( $tn_spnav_prev ) : ?>
        <?php 
            $tn_spn_prev__link = get_permalink( $tn_spnav_prev->ID );
            $tn_spn_prev__img = get_the_post_thumbnail_url( $tn_spnav_prev->ID );
            $tn_spn_prev__title = get_the_title( $tn_spnav_prev->ID );
        ?>
        <div class="tn-post-nevigation tn-post-prev">
            <a href="<?php echo $tn_spn_prev__link; ?>" class="tn-single-post-navs">
                <div class="tn-spn-img-wrap">
                    <?php if( $tn_spn_prev__img ) : ?>
                        <!-- Show post featured image -->
                        <img src="<?php echo esc_url( $tn_spn_prev__img ); ?>" alt="<?php echo esc_attr( $tn_spn_prev__title ); ?>">
                    <?php elseif ( get_theme_mod( 'tn_blog_default_img_set' ) ) : ?>
                        <!-- Show data from 'Blog Settings: Default Featured Image' customizer -->
                        <img src="<?php echo esc_url( wp_get_attachment_url( get_theme_mod( 'tn_blog_default_img_set' ) ) ); ?>" alt="<?php echo esc_attr( $tn_spn_prev__title ); ?>">
                    <?php else : ?>
                        <!-- Show demo image if no featured image or defaul set -->
                        <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/default-image-ab.png' ) ); ?>" alt="<?php echo esc_attr( $tn_spn_prev__title ); ?>">
                    <?php endif; ?>
                </div>
                <p class="tn-sp-nav-title"><?php _e( 'Previous Post', 'authentic-blog' ); ?></p>
            </a>
        </div>
    <?php endif; ?>

    <?php if( $tn_spnav_next ) : ?>
        <?php 
            $tn_spn_next__link = get_permalink( $tn_spnav_next->ID );
            $tn_spn_next__img = get_the_post_thumbnail_url( $tn_spnav_next->ID );
            $tn_spn_next__title = get_the_title( $tn_spnav_next->ID );
        ?>
        <div class="tn-post-nevigation tn-post-next">
            <a href="<?php echo $tn_spn_next__link; ?>" class="tn-single-post-navs">
                <p class="tn-sp-nav-title"><?php _e( 'Next Post', 'authentic-blog' ); ?></p>
                <div class="tn-spn-img-wrap">
                    <?php if( $tn_spn_next__img ) : ?>
                        <!-- Show post featured image -->
                        <img src="<?php echo esc_url( $tn_spn_next__img ); ?>" alt="<?php echo esc_attr( $tn_spn_next__title ); ?>">
                    <?php elseif ( get_theme_mod( 'tn_blog_default_img_set' ) ) : ?>
                        <!-- Show data from 'Blog Settings: Default Featured Image' customizer -->
                        <img src="<?php echo esc_url( wp_get_attachment_url( get_theme_mod( 'tn_blog_default_img_set' ) ) ); ?>" alt="<?php echo esc_attr( $tn_spn_next__title ); ?>">
                    <?php else : ?>
                        <!-- Show demo image if no featured image or default set -->
                        <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/default-image-ab.png' ) ); ?>" alt="<?php echo esc_attr( $tn_spn_next__title ); ?>">
                    <?php endif; ?>
                </div>
            </a>
        </div>
    <?php endif; ?>
</div>

<!-- Post Comments -->
<div id="post-comments" class="tn-comments-wrap">
    <?php if ( comments_open() || get_comments_number() ) { comments_template(); } ?>
</div>