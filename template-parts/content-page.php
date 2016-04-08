<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php the_title('<h1 class="ui centered dividing header">', '</h1>'); ?>
	</header>

	<div class="entry-content">
		<?php
            the_content();

            wp_link_pages(array(
                'before' => '<div class="page-links">'.esc_html__('Pages:', 'continuous'),
                'after' => '</div>',
            ));
        ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php if ( current_user_can( 'edit_pages' )) :?>
		<a href="<?= get_edit_post_link() ?>" title="Edit <?php the_title()?>" class="ui blue mini right floated button"><?php printf(
            /* translators: %s: Name of current post */
            esc_html__('Edit %s', 'continuous'),
            the_title('', '', false)
        ) ?></a>
		<?php endif;?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
