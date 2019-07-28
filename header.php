<?php

/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @see https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- Facebook SDK -->
	<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s);
			js.id = id;
			js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2';
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<!--/ Facebook SDK -->

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'basis'); ?></a>

		<header id="masthead" class="site-header">
			<div class="site-branding">
				<?php
				if (has_custom_logo()) :
					the_custom_logo();
				elseif (is_front_page() && is_home()) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
				<?php
				elseif (!has_custom_logo()) :
					?>
					<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
				<?php
				endif;
				$basis_description = get_bloginfo('description', 'display');
				if ($basis_description || is_customize_preview()) :
					?>
					<p class="site-description"><?php echo $basis_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<?php
				wp_nav_menu(array(
					'theme_location' => 'menu-1',
					'menu_id' => 'primary-menu',
				));
				?>
			</nav><!-- #site-navigation -->

			<div class="site-banner">
			</div>
		</header><!-- #masthead -->

		<div id="content" class="site-body">