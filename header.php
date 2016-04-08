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

<div id="page" class="pusher">
	<div class="ui inverted vertical <?php if (is_front_page() || is_home()):?>masthead<?php endif;?> center aligned segment">

	    <div class="ui container">
	        <div class="ui large secondary inverted pointing menu">
	            <a class="toc item">
	                <i class="sidebar icon"></i>
	            </a>
				<?php if (function_exists('jetpack_the_site_logo')) {
    jetpack_the_site_logo();
} ?>
	            <?php foreach (lean_get_menu_items('primary') as $item):?>
	            <a class=" item<?php if ($_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] == $item->url) {
    echo ' active';
}?>" href="<?= esc_html__($item->url); ?>"><?= esc_html__($item->title);?></a>
	            <?php endforeach;?>
	        </div>
	    </div>
