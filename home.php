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
		<main id="main" class="site-main blog-main">

			<header class="blog-title">
				<h1>Blog Posts</h1>
				<p>Online ramblings and code snippets</p>
			</header>

			<section class="content">
				<div class="container">

					<?php if ( have_posts() ) : ?> 
						<?php while ( have_posts() ) : the_post(); ?>
							<div class="blog-post-wrapper">
								<a href="<?php the_permalink(); ?>">
									<div class="blog-image-preview" style="background: url(<?php echo featured_image_url($post); ?>); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
								</a>
								<div class="blog-post-meta">
									<a href="<?php the_permalink(); ?>">
										<h3><?php the_title(); ?></h3>
									</a>
									<?php echo get_the_date('F j, Y'); ?>	
								</div> <!-- /.blog-post-meta -->
								
							</div> <!-- /.blog-post-wrapper -->



						<?php endwhile; ?>		

					<?php endif; ?>



				</div> <!-- /.container -->
				<?php numeric_pagination(); ?>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
