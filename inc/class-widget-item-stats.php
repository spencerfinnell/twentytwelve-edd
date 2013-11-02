<?php
/**
 * Item Stats
 *
 * @since Photo One 1.0
 */
class TwentyTwelve_EDD_Widget_Stats extends TwentyTwelve_EDD_Widget {
	
	/**
	 * Constructor
	 */
	public function __construct() {
		$this->widget_cssclass    = 'twentytwelve_edd_widget_stats';
		$this->widget_description = sprintf( __( 'Display useful statistics about a %s.', 'twentytwelve-edd' ), edd_get_label_singular() );
		$this->widget_id          = 'twentytwelve_edd_widget_stats';
		$this->widget_name        = sprintf( __( '%s Stats', 'twentytwelve-edd' ), edd_get_label_singular() );
		$this->settings           = array(
			'title' => array(
				'label' => __( 'Title', 'twentytwelve-edd' ),
				'type'  => 'text',
				'std'   => ''
			)
		);
		parent::__construct();
	}

	/**
	 * widget function.
	 *
	 * @see WP_Widget
	 * @access public
	 * @param array $args
	 * @param array $instance
	 * @return void
	 */
	function widget( $args, $instance ) {
		if ( $this->get_cached_widget( $args ) )
			return;

		ob_start();

		global $post;

		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );

		echo $before_widget;

			if ( $title ) echo $before_title . $title . $after_title;
		?>
			<div class="item-stats">
				<div class="item-stat">
					<?php echo edd_get_download_sales_stats( $post->ID ); ?>
					<small><?php echo _n( 'Purchase', 'Purchases', edd_get_download_sales_stats( $post->ID ), 'twentytwelve-edd' ); ?></small>
				</div>

				<?php if ( ! class_exists( 'EDD_Reviews' ) ) : ?>

				<div class="item-stat">
					<a href="#comments">
						<?php echo get_comments_number(); ?>
						<small><?php echo _n( 'Comment', 'Comments', get_comments_number(), 'twentytwelve-edd' ); ?></small>
					</a>
				</div>

				<?php else : ?>

				<div class="item-stat">
					<?php edd_reviews()->average_rating(); ?>
					<small><?php _e( 'Average Rating', 'twentytwelve-edd' ); ?></small>
				</div>
				
				<?php endif; ?>
			</div>
		<?php
		echo $after_widget;

		$content = ob_get_clean();

		echo $content;

		$this->cache_widget( $args, $content );
	}
}