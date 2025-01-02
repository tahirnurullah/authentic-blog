<?php get_header(); ?>
    <!-- Content -->
    <div class="tn-site-content">
        <div class="tn-content-area">
            <main class="tn-site-main tn-single-main">
                
                <section class="tn-section tn-single">
                    <div class="tn-container">
                        <div class="tn-row">
                            <div class="tn-col tn-single-col">
                                <?php while( have_posts() ) : the_post(); ?>
                                    <!-- Post Contents -->
                                    <?php get_template_part( 'parts/content', 'single' ); ?>  
                                <?php endwhile; ?>
                            </div>
                            <!-- Content: Sidebars -->
                            <div class="tn-col tn-single-col tn-single-col-sidebars">
                                <?php get_sidebar(); ?>

                                <!-- Start: Edit Site Logo Button for Admin -->
                                <?php tn_edit_icon( '/customize.php?autofocus[panel]=widgets', __( 'Add widget to your blog sidebar', 'authentic-blog' ) ); ?>
                                <!-- End: Edit Site Logo Button for Admin -->
                            </div>
                        </div>
                    </div>
                </section>

            </main>
        </div>
    </div>
<?php get_footer(); ?>