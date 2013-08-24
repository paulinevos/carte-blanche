<?php
/**
 *
 * Template Name: Contact
 *
 *
 * @package Carte Blanche
 * @since 2012
 */

get_header();?>
<div class="fullwidth contact">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<h1 class="pagetitle"><?php the_title();?></h1>

	<div class="fullwidth">
		<?php if( cuisine_has_plugin( 'chef-forms' ) ):?>
			<div class="contact_form">
				<?php chef_form();?>
			</div>
		<?php endif;?>
		
		<div class="contact_map">
			<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.nl/maps?f=q&amp;source=s_q&amp;hl=nl&amp;geocode=&amp;q=to+wonder&amp;aq=&amp;sll=51.754967,5.516145&amp;sspn=0.123875,0.265732&amp;ie=UTF8&amp;hq=to+wonder&amp;hnear=&amp;ll=51.790863,5.536037&amp;spn=0.123837,0.265732&amp;t=m&amp;z=12&amp;iwloc=A&amp;cid=11708842423323673519&amp;output=embed"></iframe>
		</div>

		<div class="contact_content">
			<?php the_content();?>
		</div>

	</div>

	<?php endwhile;?>
</div>
<?php get_footer();?>