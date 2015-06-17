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
   <span><img src="wp-content/themes/test-theme/assets/img/flourish-b@2x.png" height="32px" width="43px" /></span>
 </div>
 <div class="site-info">
   &copy; 2015 <a href="http://tri.be">Modern Tribe Inc.</a>
   <span class="sep"> | </span>
   <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'test-theme' ) ); ?>" class="wp-link"><?php printf( esc_html__( 'Proudly powered by %s', 'test-theme' ), 'WordPress' ); ?></a>
 </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->
<!-- Normally would use Grunt to concat the JS files -->
<?php wp_footer(); ?>

<script>

  $(function(){
    $('#menu').slicknav({
    prependTo:'#site-navigation',
    label: '&#9776;'
  });

    var $container = $('#main');
    
    $('.grid').masonry({
      itemSelector: '.grid-item',
      columnWidth: 100,
      gutterWidth: 30,
      isAnimated: true,
      isFitWidth: true,
    });
  });

  // Couldn't get this part to work, but I tried! 
  //   $container.infinitescroll({
  //     navSelector  : '#next',    // selector for the paged navigation 
  //     nextSelector : '#next a',  // selector for the NEXT link (to page 2)
  //     itemSelector : '.grid-item',     // selector for all items you'll retrieve
  //     loading: {
  //         finishedMsg: 'No more pages to load.',
  //         img: 'http://i.imgur.com/6RMhx.gif'
  //       }
  //     },

  //     // trigger Masonry as a callback
  //     function( newElements ) {
  //       // hide new items while they are loading
  //       //var $newElems = $( newElements ).css({ opacity: 0 });
  //       // ensure that images load before adding to masonry layout
  //       $newElems.imagesLoaded(function(){
  //         // show elems now they're ready
  //         $newElems.animate({ opacity: 1 });
  //         $container.masonry( 'appended', $newElems, true ); 
  //       });
  //     }
  //   );
  // });


</script>


</body>
</html>
