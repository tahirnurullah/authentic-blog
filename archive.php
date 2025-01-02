<?php get_header(); ?>
    <!-- Content -->
    <div class="tn-site-content">
        <div class="tn-content-area">
            <main class="tn-site-main tn-archive-main">
                <!-- Content: Archive Header -->
                <?php get_template_part( 'parts/content', 'archive-header' ); ?>

                <!-- Content: Blog Posts Archive & Sidebars -->
                <section id="blog-posts" class="tn-section tn-blog tn-archive-blog">
                    <div class="tn-container">
                        <div class="tn-row tn-blog-row <?php echo esc_attr( tn_dynamic_class_blog_grid() ); ?>">
                            <!-- Content: Blog Posts -->
                            <div class="tn-col tn-blog-col tn-blog-posts">
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