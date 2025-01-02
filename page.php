<?php get_header(); ?>
    <!-- Content -->
    <div class="tn-site-content">
        <div class="tn-content-area">
            <main class="tn-site-main tn-page-main">
                <?php while( have_posts() ) : the_post(); ?>
                    <div id="tn-page-<?php the_ID(); ?>" <?php post_class( 'tn-page-wrap' ); ?>>
                        <!-- Content: Page Header -->
                        <section class="tn-section tn-page-header">
                            <!-- Banner Image -->
                            <?php if( has_custom_header() ) : ?>
                                <div class="tn-page-banner-wrap">
                                    <img src="<?php header_image(); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" />
                                </div>
                                <div class="tn-page-banner-overlay"></div>
                            <?php endif; ?>
                            
                            <!-- Page Heading: Title -->
                            <div class="tn-container">
                                <div class="tn-row">
                                    <div class="tn-col tn-page-header-col">
                                        <h1 class="tn-page-heading"><?php the_title(); ?></h1>
                                    </div>
                                </div>
                            </div>

                            <!-- Start: Edit Header Image Button for Admin -->
                            <?php tn_edit_icon( '/customize.php?autofocus[section]=header_image', __( 'Update page header by adding banner image', 'authentic-blog' ) ); ?>
                            <!-- End: Edit Header Image Button for Admin -->
                        </section>
                        
                        <!-- Content: Page -->
                        <section class="tn-section tn-page">
                            <div class="tn-container">
                                <div class="tn-row tn-page-row">
                                    <!-- Content: Page -->
                                    <div class="tn-col tn-page-details">
                                        <div class="tn-page-details-row">
                                            <div class="tn-page-details-col">
                                                <!-- Page Description -->
                                                <div class="tn-page-content tn-clearfix">
                                                    <?php the_content(); ?>
                                                </div>
                                                <?php
                                                    // Add pagination for multi-page page (pagination in the_content())
                                                    wp_link_pages( array(
                                                        'before' => '<div class="tn-page-pagination-links">
                                                        <span class="tn-page-links-title">' . esc_html__( 'Pages', 'authentic-blog' ) . ': </span>',
                                                        'after' => '</div>',
                                                        'link_before' => '<span>',
                                                        'link_after' => '</span>',
                                                    ) );
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                <?php endwhile; ?>
            </main>
        </div>
    </div>
<?php get_footer(); ?>