<!-- Blog Post Item -->
<article id="tn-post-<?php the_ID(); ?>" <?php post_class( 'tn-post' ); ?>>
    <div class="tn-post-row">
        <div class="tn-post-col tn-post-col-left">
            <!-- Post Featured Image or Default -->
            <div class="tn-featured-img-wrap">
                <a href="<?php the_permalink(); ?>" class="tn-featured-img-link">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <!-- Show post featured image -->
                        <?php the_post_thumbnail( 'full' ); ?>
                    <?php elseif ( get_theme_mod( 'tn_blog_default_img_set' ) ) : ?>
                        <!-- Show data from 'Blog Settings: Default Featured Image' customizer -->
                        <img src="<?php echo esc_url( wp_get_attachment_url( get_theme_mod( 'tn_blog_default_img_set' ) ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                    <?php else : ?>
                        <!-- Show demo image if no featured or default image set -->
                        <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/default-image-ab.png' ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                    <?php endif; ?>
                </a>
            </div>
        </div>

        <div class="tn-post-col tn-post-col-right">
            <!-- Post Category with Archive Link -->
            <?php if( has_category() ) : ?>
                <div class="tn-post-cat"><?php echo wp_kses_post( get_the_category_list( ' ' ) ); ?></div>
            <?php endif; ?>
            <!-- Post Title with Single Page Link -->
            <div class="tn-post-title">
                <h3><a href="<?php the_permalink(); ?>" class="tn-post-link"><?php the_title(); ?></a></h3>
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
                <!-- Comment Icon, Link, and Count (Show if customizer enable) -->
                <?php if ( get_theme_mod( 'tn_comment_icon__set', false ) === true ) : ?>
                    <?php if ( comments_open() ) : ?> 
                        <div class="tn-post-meta tn-post-comments">
                            <a href="<?php the_permalink(); ?>#post-comments" class="tn-post-comments-link">
                                <span class="dashicons dashicons-admin-comments"></span>
                                <p class="tn-post-comment-count"><?php echo esc_html( get_comments_number() ); ?></p>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <!-- Post Excerpt (Show if customizer enable) -->
            <?php if ( get_theme_mod( 'tn_post_excerpt__set', true ) === true ) : ?>
                <div class="tn-post-excerpt">
                    <?php if( has_excerpt() ) { the_excerpt(); } ?>
                </div>
            <?php endif; ?>

            <!-- Post Tag with Archive Link (Show if customizer enable) -->
            <?php if ( get_theme_mod( 'tn_post_tags__set', false ) === true ) : ?>
                <?php if( has_tag() ) : ?>
                    <div class="tn-post-meta tn-post-tags tn-post-tags-in-loop">
                        <p class="tn-post-tags-wrap">
                            <span class="tn-tag-text-wrap">
                                <span class="dashicons dashicons-tag"></span> 
                                <span class="tn-tag-text"><?php esc_html_e( 'Tags', 'authentic-blog' ); ?>: </span>
                            </span>
                            <?php echo wp_kses_post( get_the_tag_list( '', ', ' ) ); ?>
                        </p>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</article>