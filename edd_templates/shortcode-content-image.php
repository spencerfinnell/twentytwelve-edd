<?php
/**
 * Download image
 *
 * @package Twenty_Twelve_EDD
 * @since Twenty Twelve EDD 1.0
 */
?>

<a href="<?php the_permalink(); ?>" rel="bookmark" class="item-archive-preview">
	<span class="overlay"><span class="overlay-inner">
		<strong><?php the_title(); ?></strong>
		<span class="button edd-submit blue">View Details</span>
	</span></span>

	<?php the_post_thumbnail( 'large' ); ?>
</a>