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
		<main id="main" class="site-main">
			<header id="hero" class="parallax-header" style="background: url(<?php echo featured_image_url($post); ?>);background-size: cover;">
				<div class="header-wrapper">
					<div class="header-text">
						<h4>ANTHONY FAJARDO</h4>
						<h1>Web Developer</h1>
						<h4 class="title">(Front-end)</h4>
					</div>
				</div>
			</header>


			<?php if ( have_posts() ) : ?> 
				<?php while ( have_posts() ) : the_post(); ?>
					<section class="section content">
						<?php the_content(); ?>	
					</section>					
					
					<section class="section work-with-me">
						<h2>WHY WORK WITH ME?</h2>
						<?php if(have_rows('work_with_me')): ?>
							<div class="work-with-me-container">
								<?php while(have_rows('work_with_me')): the_row(); ?>
									<div class="work-with-me-wrapper">
										<?php $image = get_sub_field('image'); ?>
										<div class="wwm-image" style="background: url(<?php echo $image['sizes']['large']; ?>); background-position: center; background-size: cover;">
										</div>									
										<div class="wwm-text">
											<?php the_sub_field('wwm_text'); ?>	
										</div>
										
									</div>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
					</section>


					<section id="portfolio" class="section portfolio">
						<h2>PORTFOLIO</h2>
						<?php get_template_part('template-parts/portfolio'); ?>
					</section>

					<section id="contact" class="section">
						<h2>GETTING IN TOUCH WITH ME</h2>
						<div class="contact-wrapper">
							<a href="<?php echo get_template_directory_uri() . '/collaborate' ?> ">COLLABORATE</a>
							<a href="<?php echo get_template_directory_uri() . '/hire-me'; ?>">I NEED A WEBSITE</a>
						</div>
					</section>

				<?php endwhile; ?>
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
