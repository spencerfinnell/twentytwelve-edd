<?php
/**
 * Download content for displaying download results.
 *
 * @package Twenty_Twelve_EDD
 * @since Twenty Twelve EDD 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'edd_download' ); ?>>
	<a href="<?php the_permalink(); ?>" rel="bookmark" class="item-archive-preview">
		<span class="overlay"><span class="overlay-inner">
			<strong><?php the_title(); ?></strong>
			<span class="button edd-submit blue">View Details</span>
		</span></span>

		<?php the_post_thumbnail( 'large' ); ?>
	</a>
</article><!-- #post-## -->