<?php
/**
 * The sidebar containing the downloads widget areas.
 *
 * If no active widgets in the sidebar, they will be hidden completely.
 *
 * @package Twenty_Twelve_EDD
 * @since Twenty Twelve EDD 1.0
 */

/*
 * The download page widget area is triggered if any of the areas
 * have widgets. So let's check that first.
 *
 * If none of the sidebars have widgets, then let's bail early.
 */
if ( ! is_active_sidebar( 'sidebar-4' ) )
	return;

// If we get this far, we have widgets. Let do this.

$widgets = wp_get_sidebars_widgets();
$count   = count( $widgets[ 'sidebar-4' ] );
?>
<div id="secondary" class="widget-area" role="complementary">
	<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
	<div class="download-widgets widgets-<?php echo absint( $count ); ?>">
		<?php dynamic_sidebar( 'sidebar-4' ); ?>
	</div><!-- .first -->
	<?php endif; ?>
</div><!-- #secondary -->