<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package anthonyfajardo
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="subpages" class="site-main hireme">
			
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>

				
				<?php get_template_part('template-parts/hireme'); ?>

				<?php echo do_shortcode('[contact-form-7 id="61" title="HIRE ME"]'); ?>



			<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
