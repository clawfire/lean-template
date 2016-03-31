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
	<!-- Following Menu -->
	<div class="ui large top fixed hidden menu">
	<?php wp_nav_menu(array(
        'theme_location' => 'primary',
        'menu_id' => 'primary-menu',
        'container_class' => 'ui container',
        'items_wrap' => '%3$s',
    )); ?>
	</div>


	<!-- Sidebar Menu -->
	<?php wp_nav_menu(array(
        'theme_location' => 'primary',
        'menu_id' => 'primary-menu',
        'container_class' => 'ui vertical inverted sidebar menu',
        'items_wrap' => '%3$s',
    )); ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'continuous'); ?></a>
<div id="page" class="pusher">
	<?php if (!is_front_page() && !is_home()) : ?>
		<header id="masthead" class="ui container" role="banner">
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
		</header>
	<?php endif; ?>
