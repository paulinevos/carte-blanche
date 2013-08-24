<div class="row-fluid comments">
	<div id="comments" class="span12">
	<h1 class="comment_count offset2">
		<?php 
		global $post;
		if( $post->comment_count == 1 ){
			echo '1 Reactie';
		}else{
			echo $post->comment_count .' Reacties';
		}?>
	</h1>
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword offset2"><i class="icon-lock"></i> This post is password protected. Enter the password to view any comments.</p>
	</div><!-- #comments -->
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>
	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above">
			<div class="nav-previous"><?php previous_comments_link( '&larr; Oudere reacties' ); ?></div>
			<div class="nav-next"><?php next_comments_link( 'Nieuwere reacties &rarr;' ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		</div><!-- #comments -->
	</div><!-- /row -->
	<div class="row-fluid comments-list">

		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'chef_comment' ) );?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<div class="nav-previous"><?php previous_comments_link( '&larr; Oudere reacties' ); ?></div>
			<div class="nav-next"><?php next_comments_link( 'Nieuwere reacties &rarr;' ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	</div>
	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>	
		</div>
		<p class="nocomments offset2"><i class="icon-remove-sign"></i> Reacties zijn niet toegestaan.</p>
	<?php else:?>
		</div></div>
	<?php endif; ?>

	<div class="comment-form offset2">	
		<h2 id="comments-title">Laat een reactie achter</h2>

		<div class="comment-creator span8">
				<?php 	
						$commenter = wp_get_current_commenter();
						$req = get_option( 'require_name_email' );
						$aria_req = ( $req ? " aria-required='true'" : '' );

						comment_form(
							array(
								'comment_notes_before'	=> '<p class="comment-notes"><i class="icon-eye-open"></i> Uw email zal niet zichtbaar zijn</p>',
								'comment_notes_after' 	=> '',
								'title_reply'			=> '',
								'title_reply_to'		=> 'reageer op %s',
								'cancel_reply_link'		=> 'annuleer reactie',
								'label_submit'			=> 'Reageer',
								'fields'				=> array(

										'author' => '<p class="comment-form-author">' . '<label for="author">Naam</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
	            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
	'email'  => '<p class="comment-form-email"><label for="email">Email</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
	            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>'
								),
								'logged_in_as'			=> '<p class="logged-in-as"><i class="icon-user"></i> ' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out? <i class="icon-arrow-right"></i></a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>'
							)

						); ?>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>

