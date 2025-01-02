<?php if ( post_password_required() ) { return; } ?>

<!-- Post Comments & Form -->
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
        
        <!-- Comments Header -->
		<h2 class="comments-title">
			<?php
			    printf( wp_kses_post( _nx( 'One thought on "%2$s"', '%1$s thoughts on "%2$s"', get_comments_number(), 'comments title', 'authentic-blog' ) ), number_format_i18n( get_comments_number() ), '<span>' . esc_html( get_the_title() ) . '</span>' );
			?>
		</h2>
        
        <!-- Comments List -->
        <ol class="comment-list">
            <?php
                wp_list_comments( array(
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'avatar_size' => 70,
                ) );
            ?>
        </ol>
        
        <!-- Comments Navigation -->
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav class="navigation comment-navigation" role="navigation">
				<h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'authentic-blog' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'authentic-blog' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'authentic-blog' ) ); ?></div>
			</nav>
		<?php endif; ?>

        <!-- If No Comment Found or Closed -->
		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'authentic-blog' ); ?></p>
		<?php endif; ?>

	<?php endif; ?>

    <!-- Comment Form -->
	<?php comment_form(); ?>
</div>