<?php
/**
 * Template part for displaying posts.
 *
 * @package test-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid-item' ); ?>>
	<div class="entry-thumbnail">
		<?php if ( has_post_thumbnail() ) : ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	<?php the_post_thumbnail(); ?>
	</a>
<?php endif; ?>
	</div>

	<div class="entry-wrapper">
		<header class="entry-header">
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		</header>

		<div class="entry-content">
			<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'test-theme' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
				?>

				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'test-theme' ),
					'after'  => '</div>',
					) );
					?>
		</div>
	</div>
</article>
