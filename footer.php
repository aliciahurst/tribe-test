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
		<div class="footer-flourish">
			<span><img src="wp-content/themes/test-theme/assets/flourish@2x.png" height="32px" width="43px" /></span>
		</div>
		<div class="site-info">
			&copy; 2015 <a href="http://tri.be">Modern Tribe Inc.</a>
			<span class="sep"> | </span>
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'test-theme' ) ); ?>" class="wp-link"><?php printf( esc_html__( 'Proudly powered by %s', 'test-theme' ), 'WordPress' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script>

  $(function(){
    
    $('.grid').masonry({
      itemSelector: '.grid-item',
      columnWidth: 100,
      gutterWidth: 30,
      isAnimated: true,
      isFitWidth: true,
    });

  });

</script>

</body>
</html>
