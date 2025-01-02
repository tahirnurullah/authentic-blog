<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Meta Tags -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php if ( has_nav_menu( 'secondary_menu' ) ) : ?>
        <!-- Secondary Header (Optional) -->
        <section class="tn-section tn-top-bar">
            <div class="tn-container">
                <div class="tn-row">
                    <div class="tn-col">
                        <?php wp_nav_menu( array( 'theme_location' => 'secondary_menu', 'menu_class' => 'tn-secondary-menu' ) ); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Main Header -->
    <header class="tn-header <?php echo esc_attr( tn_dynamic_class() ); ?>">
        <section class="tn-section tn-header-wrap">
            <div class="tn-container">
                <div class="tn-row tn-header-row">
                    <!-- Main Header: Logo -->
                    <div class="tn-col tn-header-col tn-logo-wrap">
                        <?php if ( has_custom_logo() ) : ?>
                            <?php the_custom_logo(); ?>
                        <?php else : ?>
                            <a href="<?php echo esc_url( home_url() ); ?>">
                                <h1 class="tn-logo-alt"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
                            </a>
                        <?php endif; ?>

                        <!-- Start: Edit Button for Site Logo -->
                        <?php tn_edit_icon( '/customize.php?autofocus[section]=title_tagline', __( 'Add Your Site Logo', 'authentic-blog' ) ); ?>
                        <!-- End: Edit Button for Site Logo -->
                    </div>

                    <!-- Main Header: Nav & Search -->
                    <div class="tn-col tn-header-col tn-menu-wrap">
                        <!-- Mobile Menu Button -->
                        <a id="tn-menu__toggle" href="javascript:void(0);" class="tn-mobile-menu-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                        
                        <!-- Mobile Menu Overlay -->
                        <div id="tn-menu__overlay" class="tn-menu-overlay"></div>
                        
                        <!-- Nav & Search Wrap -->
                        <div id="tn-menu__wrapper" class="tn-menu-inner">
                            <div class="tn-menu-inner-row">
                                <!-- Mobile Menu Header -->
                                <div class="tn-mobile-menu-header">
                                    <a href="<?php echo esc_url( home_url() ); ?>">
                                        <h3><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h3>
                                    </a>
                                </div>

                                <!-- Main Menu -->
                                <nav class="tn-nav">
                                    <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'menu_class' => 'tn-main-menu' ) ); ?>
                                    
                                    <!-- Start: Edit Button for Main Menu -->
                                    <?php tn_edit_icon( '/customize.php?autofocus[panel]=nav_menus', __( 'Add menu items in the main menu area', 'authentic-blog' ) ); ?>
                                    <!-- End: Edit Button for Main Menu -->
                                </nav>

                                <?php if ( get_theme_mod( 'tn_header_search_set', false ) === false ) : ?>
                                    <!-- Search Form -->
                                    <div class="tn-setting-item tn-search-top">
                                        <a href="javascript:void(0);" class="tn-setting-btn tn-search-btn">
                                            <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/tn-search-icon.png' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                                        </a>
                                        <div class="tn-search-modal">
                                            <?php get_search_form(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </header>