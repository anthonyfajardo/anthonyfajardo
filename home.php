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



			<section class="content">
				

					<?php if ( have_posts() ) : ?> 

						<?php  
							$image = featured_image_url($post);
						?>
						
						<?php if($image): ?>
							<header class="blog-title" style="background: url(<?php echo featured_image_url($post);?>); background-size: cover; background-position: center;">
						<?php else: ?>
							<header class="blog-title no-image">
						<?php endif; ?>
							<h1>Blog Posts</h1>
							<p>Online ramblings and code snippets</p>
						</header>

						<div class="container">
							<?php while ( have_posts() ) : the_post(); ?>
								<a href="<?php the_permalink(); ?>">
									<div class="blog-post-wrapper">
										<?php if(has_post_thumbnail()): ?>
											<div class="blog-image-preview" style="background: url(<?php echo featured_image_url($post); ?>); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
										<?php else: ?>	
											<div class="blog-image-preview no-image"></div>
										<?php endif; ?>
											
									
										<div class="blog-post-meta">
											<h3><?php the_title(); ?></h3>
											<h5><?php echo get_the_date('F j, Y'); ?>	</h5>
										</div> <!-- /.blog-post-meta -->
									</div> <!-- /.blog-post-wrapper -->
								</a>



							<?php endwhile; ?>		
						</div> <!-- /.container -->

						<?php else: ?>
							<div class="no-post">
								<h1>NO BLOG POST</h1>
							</div>

					<?php endif; ?>



				
				<?php numeric_pagination(); ?>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
