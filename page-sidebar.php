<?php
/**
 * Template Name: Page with Sidebar
 *
 * The template for displaying pages with sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-page
 *
 * @package ND
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div class="site-main__wrapper">
				<div class="site-main__container">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div><!-- .site-main__container -->
				<?php get_sidebar(); ?>
			</div><!-- .site-main__wrapper -->
		<?php else : ?>
			<div class="site-main__container">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			</div><!-- .site-main__container -->
		<?php endif; ?>
	</main><!-- #main -->

<?php
get_footer();
