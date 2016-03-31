<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="ui container" role="banner">
		<nav id="site-navigation" role="navigation" class="ui labeled icon dropdown floated left button" aria-controls="primary-menu" aria-expanded="false">
			<i class="sidebar icon"></i>
			<?php esc_html_e('Menu', 'continuous'); ?>
			<?php wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id' => 'primary-menu',
                'container_class' => 'menu',
                'items_wrap' => '%3$s',
            )); ?>

		</nav><!-- #site-navigation -->
		<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'continuous'); ?></a>
		<div class="site-branding">
			<?php
            if (is_front_page() && is_home()) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
			<?php else : ?>
				<h2 class="ui center aligned icon header">
				  <img src="<?= get_header_image() ?>" alt="<?php bloginfo('name')?>" class="ui small image" />
				  <div class="content">
					<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
						<?php bloginfo('name');?>
					</a>
					<?php
                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) : ?>
					<div class="sub header"><?= $description; /* WPCS: xss ok. */ ?></div>
					<?php endif; ?>
				  </div>
				</h2>
			<?php endif; ?>
		</div><!-- .site-branding -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
