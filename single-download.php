<?php
/**
 * The Template for displaying all single downloads.
 *
 * @package Twenty_Twelve_EDD
 * @since Twenty Twelve EDD 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="item-details">
					<div class="item-preview">
						<div class="item-main-preview">
							<?php the_post_thumbnail( 'full' ); ?>
						</div>
					</div>

					<div class="item-prices">
						<h1 class="entry-title"><?php the_title(); ?></h1>

						<?php echo edd_get_purchase_link( apply_filters( 'twentytwelve_edd_get_purchase_link', array() ) ); ?>

						<?php echo get_the_term_list( $post->ID, 'download_tag', '<p class="tag-links"><span class="screen-reader-text">' . __( 'Tagged with:', 'twenty-twelve-edd' ) . '</span>', ',&nbsp;', '</p>' ); ?>
					</div>
				</div>

				<?php get_sidebar( 'download' ); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

				<nav class="nav-single">
					<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve-edd' ); ?></h3>
					<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve-edd' ) . '</span> %title' ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve-edd' ) . '</span>' ); ?></span>
				</nav><!-- .nav-single -->

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>