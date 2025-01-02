    <!-- Footer -->
    <footer class="tn-footer">
        <!-- Footer: Main -->
        <section class="tn-section tn-footer-main">
            <div class="tn-container">
                <div class="tn-row tn-footer-row">
                    <!-- Footer Sidebar: Column 01 -->
                    <div class="tn-col tn-footer-col tn-ft-col-1">
                        <?php if ( is_active_sidebar( 'footer_sidebar_1' ) ) : ?>
                            <aside class="tn-footer-widgets">
                                <div class="tn-footer-widgets-inner">
                                    <?php dynamic_sidebar( 'footer_sidebar_1' ); ?>
                                </div>
                            </aside>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Footer Sidebar: Column 02 -->
                    <div class="tn-col tn-footer-col tn-ft-col-2">
                        <?php if ( is_active_sidebar( 'footer_sidebar_2' ) ) : ?>
                            <aside class="tn-footer-widgets">
                                <div class="tn-footer-widgets-inner">
                                    <?php dynamic_sidebar( 'footer_sidebar_2' ); ?>
                                </div>
                            </aside>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Footer Sidebar: Column 03 -->
                    <div class="tn-col tn-footer-col tn-ft-col-3">
                        <?php if ( is_active_sidebar( 'footer_sidebar_3' ) ) : ?>
                            <aside class="tn-footer-widgets">
                                <div class="tn-footer-widgets-inner">
                                    <?php dynamic_sidebar( 'footer_sidebar_3' ); ?>
                                </div>
                            </aside>
                        <?php endif; ?>
                    </div>

                    <!-- Footer Sidebar: Column 04 -->
                    <div class="tn-col tn-footer-col tn-ft-col-4">
                        <?php if ( is_active_sidebar( 'footer_sidebar_4' ) ) : ?>
                            <aside class="tn-footer-widgets">
                                <div class="tn-footer-widgets-inner">
                                    <?php dynamic_sidebar( 'footer_sidebar_4' ); ?>
                                </div>
                            </aside>
                        <?php endif; ?>
                    </div>

                    <!-- Start: Edit Button for Footer Area -->
                    <?php tn_edit_icon( '/customize.php?autofocus[panel]=widgets', __( 'Add widget to your footer sidebar', 'authentic-blog' ) ); ?>
                    <!-- End: Edit Button for Footer Area -->
                </div>
            </div>
        </section>

        <!-- Footer: Bottom -->
        <section class="tn-section tn-footer-bottom">
            <div class="tn-container">
                <div class="tn-row">
                    <div class="tn-col tn-footer-credit-col">
                        <div class="tn-footer-credit">
                            <!-- Show data from 'Footer Credit' customizer (with Allowed HTML) -->
                            <?php 
                                echo wp_kses( 
                                    get_theme_mod( 'tn_footer_credit_set', __( '©2025 Authentic Blog. Free WordPress Theme by Tahir Nurullah.', 'authentic-blog' ) ), 
                                    array( 'a' => array( 'href' => array(), 'title' => array(), 'target' => array() ) ) 
                                ); 
                            ?>
                        </div>

                        <!-- Start: Edit Button for Footer Credit Area -->
                        <?php tn_edit_icon( '/customize.php?autofocus[section]=tn_footer_credit_sec', __( 'Update your footer credit text', 'authentic-blog' ) ); ?>
                        <!-- End: Edit Button for Footer Credit Area -->
                    </div>
                </div>
            </div>
        </section>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>