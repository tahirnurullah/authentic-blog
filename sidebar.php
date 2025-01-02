<?php if ( is_active_sidebar( 'blog_sidebar' ) ) : ?>
    <aside id="tn-sidebars" class="tn-sidebars">
        <div class="tn-sidebars-inner">
            <?php dynamic_sidebar( 'blog_sidebar' ); ?>
        </div>  
    </aside>
<?php endif; ?>