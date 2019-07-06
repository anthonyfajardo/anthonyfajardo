<?php  
	$hireme = new WP_Query(array(
		'pagename'	=> 'hire-me'
	));
?>

<?php if ( $hireme->have_posts() ) : ?> 
	<?php while ( $hireme->have_posts() ) : $hireme->the_post(); ?>
		
		<?php if(have_rows('project_steps')): ?>
			<div class="project-step">
				<?php while(have_rows('project_steps')): the_row(); ?>
					<div class="step-wrapper">

						<?php $stepImage = get_sub_field('step_image'); ?>

						<div class="step-image" style="background: url(<?php echo $stepImage['sizes']['large']; ?>); background-size: cover; background-position: center;"></div>
						<h3><?php the_sub_field('step_title'); ?></h3>
						
							<p><?php the_sub_field('step_text'); ?></p>
						

					</div> <!-- /.step-wrapper -->

				<?php endwhile; ?>
			</div> <!-- /.project-steps -->
		<?php endif; ?>

	<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	<?php else: ?>		
<?php endif; ?>