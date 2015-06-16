<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package test-theme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			&copy; 2015 <a href="http://tri.be">Modern Tribe Inc.</a>
			<span class="sep"> | </span>
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'test-theme' ) ); ?>"><?php printf( esc_html__( 'Proudly Powered by %s', 'test-theme' ), 'WordPress' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
