<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Twelve already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Twenty_Twelve_EDD
 * @since Twenty Twelve EDD 1.0
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title">
					<?php if ( is_tax( array( 'download_category', 'download_tag' ) ) ) : ?>
						<?php single_term_title(); ?>
					<?php else : ?>
						<?php echo apply_filters( 'twentytwelve_edd_downloads_title', edd_get_label_plural() ); ?>
					<?php endif; ?>
				</h1>
			</header><!-- .archive-header -->

			<div class="edd_downloads_list" data-columns>
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'content', 'download' );

				endwhile;
			?>
			</div>

			<?php twentytwelve_content_nav( 'nav-below' ); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>