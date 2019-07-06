<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package anthonyfajardo
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="section site-footer">
		<div class="site-info">
			<h5>ANTHONY FAJARDO</h5>
			<h5>Copyright &copy; <?php echo get_the_date('Y'); ?></h5>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
