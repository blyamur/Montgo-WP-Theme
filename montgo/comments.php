<?php
if ( post_password_required() ) {
	return;
}
?>
<!-- START ADVERT BLOCK -->
<div style="margin-top:1.2em;">
	<!-- GOOGLE AD CODE -->
</div> 
<!-- END ADVERT BLOCK -->
<div id="comments" class="comments-area">
	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				comments_number( '', esc_html__( 'comment 1 ', 'mo' ), esc_html__( 'comment % ', 'mo' ) );
			?>
		</h2>
        
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="comment-navigation">
			<h3 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'mo' ); ?></h3>
			<div class="nav-links">
				<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'mo' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'mo' ) ); ?></div>
			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 60,
				) );
			?>
		</ol><!-- .comment-list -->
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="comment-navigation">
			<h3 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'mo' ); ?></h3>
			<div class="nav-links">
				<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'mo' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'mo' ) ); ?></div>
			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	<?php endif; // Check for have_comments(). ?>
	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments closed.', 'mo' ); ?></p>
	<?php endif; ?>

	<?php comment_form( array(
		'title_reply'         => esc_html__( 'Add comments', 'mo' ),
		'comment_notes_after' => '',
	) ); ?>

</div><!-- #comments -->
