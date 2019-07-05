<?php  
	
	$portfolio = new WP_Query(array(
		'post_type'	=> 'portfolio'
	));

?>


<?php if ( $portfolio->have_posts() ) : ?> 
	<?php while ( $portfolio->have_posts() ) : $portfolio->the_post(); ?>
		<div class="portfolio-item">
			<div class="portfolio-image">
				<a href="<?php the_field('portfolio_url'); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
			</div>
			<div class="portfolio-info">
				<h3>
					<a href="<?php the_field('portfolio_url'); ?>"><?php the_title(); ?></a>
				</h3>
				<?php the_content(); ?>			
			</div>
		</div> <!-- /.portfolio-item -->
	<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	<?php else: ?>		
<?php endif; ?>