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

<script>
// The jquery wasn't firing up for some reason! Can debug later, but for now I just put in vanilla JS instead! 

var elem = document.querySelector('.grid');
var msnry = new Masonry( elem, {
  // options
  itemSelector: '.grid-item',
  columnWidth: 370
});

// element argument can be a selector string
//   for an individual element
var msnry = new Masonry( '.grid', {
  // options
});
</script>

</body>
</html>
