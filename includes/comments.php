<?php
	function chef_comment( $comment, $args, $depth ) {
		
		$GLOBALS['comment'] = $comment;
		$template_url = get_bloginfo('template_url','raw');?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment row-fluid">
			<footer class="comment-meta span2">
				<div class="author-avatar">
					<?php 
					$avatar_size = 100;
					if ( '0' != $comment->comment_parent )
						$avatar_size = 80;
					echo get_avatar( $comment, $avatar_size );
					?>
				</div>
			</footer>

			<div class="comment-content span10">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation">UW reactie wordt eerst goedgekeurd.</em>
					<br />
				<?php else:?> 
			<?php
					/* translators: 1: comment author, 2: date and time */
					echo '<div class="comment-user-info">';
						echo '<strong class="fn">'.ucwords( get_comment_author_link() ).'</strong>';
						edit_comment_link( '<i class="icon-edit"></i> Bewerk', '<span class="edit-link">', '</span>' );
						echo '<span class="comment_date"><i class="icon-time"></i>'.get_comment_date('n F Y').' op '.get_comment_date('G:i').'</span>';
					echo '</div>';
					?>

				<?php comment_text(); ?>

				<?php endif; ?>

				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => '<i class="icon-share-alt"></i> Reageer', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!-- .reply -->

			</div>

			<div class="clearfix"></div>
		</article><!-- #comment-## -->

	<?php
	
	}
?>