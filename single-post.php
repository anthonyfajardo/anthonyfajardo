<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package anthonyfajardo
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main single-post">
			<div class="container">

				<?php if ( have_posts() ) : ?> 
					<?php while ( have_posts() ) : the_post(); ?> 
						<div class="single-post-wrapper">
							<?php if(has_post_thumbnail()): ?>
								<div class="featured-image" style="background: url(<?php echo featured_image_url($post); ?>); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
							<?php endif; ?>
							<div class="single-post-meta">
								<h2><?php the_title(); ?></h2>
								<p><?php echo get_the_date('F j Y'); ?></p>
							</div>

							<div class="single-post-content">
								<?php the_content(); ?>
							</div>

						</div> <!-- /.single-post-wrapper -->

						<?php  
							the_post_navigation(array(
								'prev_text'		=> __('<< Previous: <span>%title</span>'),
								'next_text'		=> __('Next: <span>%title</span> >>'),
								'taxonomy'		=> __('post_tag'),
								'screen_reader_text'	=> __('Continue Reading')
							));
						?>

					<?php endwhile; ?>
				<?php endif; ?>
			
			</div> <!-- /.container -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
