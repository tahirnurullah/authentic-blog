<?php get_header(); ?>
    <!-- Content -->
    <div class="tn-site-content">
        <div class="tn-content-area">
            <main class="tn-site-main tn-search-main">
                <!-- Content: Search Info -->
                <?php get_template_part( 'parts/content', 'search-header' ); ?>
                
                <!-- Content: Search Results & Sidebars -->
                <section id="blog-posts" class="tn-section tn-blog tn-search-blog">
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
                                
                                <!-- If no search result -->
                                <?php else: ?>
                                    <div class="tn-not-found tn-not-found-search">
                                        <h2 class="tn-not-found-text"><?php esc_html_e( 'Sorry, nothing matched your search criteria. Please try again with some different keywords.', 'authentic-blog' ); ?></h2>
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