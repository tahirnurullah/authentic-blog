<?php get_header(); ?>
    <!-- Content -->
    <div class="tn-site-content">
        <div class="tn-content-area">
            <main class="tn-site-main tn-page-main">
                <div id="tn-page-404" class="tn-page-404">
                    <!-- Content: 404 Page -->
                    <section class="tn-section tn-page tn-section-404">
                        <div class="tn-container">
                            <div class="tn-row tn-page-row tn-page-row-404">
                                <!-- Content: 404 Page -->
                                <div class="tn-col tn-col-404">
                                    <div class="tn-404-content">
                                        <h1 class="tn-404-heading"><?php esc_html_e( '404', 'authentic-blog' ); ?></h1>
                                        <p class="tn-404-text"><?php esc_html_e( 'The page you are looking for does not exist!', 'authentic-blog' ); ?></p>
                                        <a href="<?php echo esc_url( home_url() ); ?>" class="tn-button-simple">
                                            <span class="dashicons dashicons-arrow-left-alt"></span> <?php esc_html_e( 'Back to homepage', 'authentic-blog' ); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </div>
<?php get_footer(); ?>