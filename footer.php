<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>

	</div><!-- #content -->


	<footer class="ui inverted vertical footer segment" role="contentinfo">
		<div class="ui container">
			<div class="ui stackable inverted divided equal height stackable three columns grid">
				<div class="column">
					<a href="<?php echo esc_url(__('https://wordpress.org/', 'continuous')); ?>"><?php printf(esc_html__('Proudly powered by %s', 'continuous'), 'WordPress'); ?></a>
					<span class="sep"> | </span>
					<?php printf(esc_html__('Theme: %1$s by %2$s.', 'continuous'), 'lean', '<a href="http://thibaultmilan.com" rel="designer">Thibault Milan</a>'); ?>
				</div>
				<?php dynamic_sidebar('footer-1'); ?>
				<?php dynamic_sidebar('footer-2'); ?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
