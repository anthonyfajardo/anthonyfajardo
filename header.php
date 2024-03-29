<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package anthonyfajardo
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'anthonyfajardo' ); ?></a>
		<header id="masthead" class="site-header">
			
			<?php if(is_home()): ?>
				<div class="header-container blog-nav">
			<?php else: ?>
				<div class="header-container">
			<?php endif; ?>
			
				<div class="site-branding">
					<?php if(!is_front_page()): ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>	
					<?php endif; ?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
					<div id="menu-toggle">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</div>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary',
					) );
					?>
				</nav><!-- #site-navigation -->
			</div> <!-- /.header-container -->
		</header><!-- #masthead -->
	<div id="content" class="site-content">
