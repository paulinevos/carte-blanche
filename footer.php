<?php
/**
 *
 * @package Carte Blanche
 * @since 2012
 */
global $cuisine, $style;

?>
		<div class="clearfix"></div>
	</div><!-- #main -->


<!-- Do the footer in the container, or underneath: -->
<?php if( $style['footer-size'] == 'boxed' ):?>

	<footer id="footer" class="footer-boxed footer-container fluid-row">

		<?php get_template_part( 'template', 'footer' );?>

	</footer><!-- #colophon -->

	<div class="copyright-boxed copyright-container">
		<div class="left">
		</div>
		<div class="right pull-right">
			<a href="http://www.chefduweb.nl" class="mustache" title="Made by Chef du Web"></a>
		</div><div class="clearfix"></div>
	</div>

<?php endif;?>

		<div class="clearfix"></div>
</div> <!-- container -->	

<?php if( $style['footer-size'] == 'wide' ):?>

	<div class="footer-container fluid-row" id="footer">
		<footer id="colophon" class="container">

			<?php get_template_part( 'template', 'footer' );?>

		</footer>
	</div>
	<div class="copyright-container fluid-row">
		<div class="container">
			<div class="left">

			</div>
			<div class="right">
				<a href="http://www.chefduweb.nl" class="mustache" title="Made by Chef du Web"></a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

<?php endif;?>


<?php wp_footer(); ?>
</body>
</html>