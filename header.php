<?php /* SITE HEADER */ ?>

<!doctype html>
<html <?php language_attributes(); ?> class="js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'menu17' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php the_custom_logo(); ?>
			<?php if (is_front_page() && is_home()) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
			<?php endif; ?>
			<?php
			$menu17_description = get_bloginfo( 'description', 'display' );
			if ( $menu17_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $menu17_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<!-- TEMPLATE PART - NAVIGATION -->
		<div class="navigation-top">
			<div class="wrap">
				<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Top Menu', 'menu17'); ?>">
					<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
						<?php //esc_html_e('MENU', 'menu17'); ?>
						<?php
							echo menu17_get_svg(array('icon' => 'bars'));
							echo menu17_get_svg(array('icon' => 'close'));
							_e('Menu', 'menu17');
						?>
					</button>
					<?php
					wp_nav_menu(array(
						'theme_location' => 'top',
						'menu_id'        => 'top-menu',
					));
					?>
				</nav><!-- #site-navigation -->
			</div>
		</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
