<?php get_header(); ?>
    <!-- Content -->
    <div class="tn-site-content">
        <div class="tn-content-area">
            <main class="tn-site-main">

                <!-- Content: Hero / Banner -->
                <?php get_template_part( 'parts/content', 'hero' ); ?>
                
                <!-- Content: Blog Posts & Sidebars -->
                <section id="blog-posts" class="tn-section tn-blog <?php if ( get_theme_mod( 'tn_blog_title_set' ) ) { echo esc_attr( 'tn-blog-title-active' ); } ?>">
                    <div class="tn-container">
                        <div class="tn-row tn-blog-row <?php echo esc_attr( tn_dynamic_class_blog_grid() ); ?>">
                            <!-- Content: Blog Posts -->
                            <div class="tn-col tn-blog-col tn-blog-posts">
                                <!-- Section Heading -->
                                <?php if ( get_theme_mod( 'tn_blog_title_set' ) ) : ?>
                                    <h3 class="tn-section-heading">
                                        <?php
                                            $blog_sec_title = get_theme_mod( 'tn_blog_title_set', __( '<span>Blog</span> Posts', 'authentic-blog' ) ); 
                                            echo wp_kses( $blog_sec_title, array( 'span' => array( 'class' => array() ) ) ); 
                                        ?>
                                    </h3>
                                <?php endif; ?>
                                
                                <!-- Start: Edit Site Logo Button for Admin -->
                                <?php tn_edit_icon( '/customize.php?autofocus[section]=tn_blog_sec', __( 'Update your Blog settings', 'authentic-blog' ) ); ?>
                                <!-- End: Edit Site Logo Button for Admin -->

                                <?php if( have_posts() ) : ?>

                                    <!-- Post Loop -->
                                    <div class="tn-blog-loop-wrap">
                                        <?php while( have_posts() ) : the_post(); ?>
                                            <?php get_template_part( 'parts/content' ); ?>
                                        <?php endwhile; ?>
                                    </div>
                                    
                                    <!-- Post Pagination -->
                                    <?php get_template_part( 'parts/content', 'pagination' ); ?>

                                <!-- If no post found -->    
                                <?php else: ?>
                                    <div class="tn-not-found">
                                        <h2 class="tn-not-found-text"><?php esc_html_e( 'No post item has been published yet.', 'authentic-blog' ); ?></h2>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php if ( get_theme_mod( 'tn_blog_grid_column_set' ) !== 'three_cols_without_sidebar' ) : ?>
                                <!-- Content: Sidebars -->
                                <div class="tn-col tn-blog-col tn-blog-sidebar-wrap">
                                    <?php get_sidebar(); ?>

                                    <!-- Start: Edit Site Logo Button for Admin -->
                                    <?php tn_edit_icon( '/customize.php?autofocus[panel]=widgets', __( 'Add widget to your blog sidebar', 'authentic-blog' ) ); ?>
                                    <!-- End: Edit Site Logo Button for Admin -->
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
<?php get_footer(); ?>