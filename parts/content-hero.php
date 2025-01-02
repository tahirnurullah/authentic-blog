<section class="tn-section tn-hero tn-hero-home">
    <div class="tn-container">
        <div class="tn-row">
            <!-- Start: edit button for Hero Section -->
            <?php tn_edit_icon( '/customize.php?autofocus[section]=tn_hero_sec', __( 'Update Your Hero Section', 'authentic-blog' ) ); ?>
            <!-- End: edit button for Hero Section -->

            <!-- Hero Header: Content -->
            <div class="tn-col tn-hero-content-left">
                <div class="tn-hero-content">
                    <div class="tn-hero-content-inner">
                         <!-- Get all data from 'Hero Section' customizer -->
                        <?php
                            $hero_title = get_theme_mod( 'tn_hero_title_set', __( '<span>Authentic Blog is a place</span> where you can find your perfect blogs', 'authentic-blog' ) );
                            $hero_text = get_theme_mod( 'tn_hero_text_set', __( 'The foundation of authentic blogging is rooted in the idea that content should be honest and reflective of the blogger\'s true self.', 'authentic-blog' ) );
                            $hero_btn_text = get_theme_mod( 'tn_hero_btntext_set', __( 'Learn More', 'authentic-blog' ) );
                            $hero_btn_link = get_theme_mod( 'tn_hero_btnlink_set', __( '#', 'authentic-blog' ) );
                            $hero_img = get_theme_mod( 'tn_hero_img_set' );
                        ?>
                        <!-- Show data from 'Hero Section' customizer -->
                        <h1 class="tn-hero-header"><?php echo wp_kses( $hero_title, array( 'span' => array( 'class' => array() ) ) ); ?></h1>
                        <p class="tn-hero-text"><?php echo esc_html( $hero_text ); ?></p>
                        <div class="tn-button-wrap">
                            <a href="<?php echo esc_url( $hero_btn_link ); ?>" class="tn-button tn-button-hero"><?php echo esc_html( $hero_btn_text ); ?></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hero Header: Image -->
            <div class="tn-col tn-hero-img-right">
                <div class="tn-hero-img-wrap">
                    <?php if( $hero_img ) : ?>
                        <!-- Show data from 'Hero Section' customizer -->
                        <img src="<?php echo esc_url( wp_get_attachment_url( $hero_img ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                    <?php else : ?>
                        <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/default-image-ab.png' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>