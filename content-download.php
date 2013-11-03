<?php
/**
 * Download content for displaying download results.
 *
 * @package Twenty_Twelve_EDD
 * @since Twenty Twelve EDD 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'edd_download' ); ?>>
	<?php edd_get_template_part( 'shortcode', 'content-image' ); ?>
</article><!-- #post-## -->