<?php
/**
 * Download image
 *
 * @package Twenty_Twelve_EDD
 * @since Twenty Twelve EDD 1.0
 */

global $edd_options;

$color = isset( $edd_options[ 'checkout_color' ] ) ? $edd_options[ 'checkout_color' ] : 'blue';
?>

<a href="<?php the_permalink(); ?>" rel="bookmark" class="item-archive-preview">
	<span class="overlay"><span class="overlay-inner">
		<strong><?php the_title(); ?></strong>
		<span class="button edd-submit <?php echo $color; ?>"><?php _e( 'View Details', 'twentytwelve-edd' ); ?></span>
	</span></span>

	<?php the_post_thumbnail( 'large' ); ?>
</a>