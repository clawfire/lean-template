<?php
/* Template Name: Homepage */

 /**
  * Home page template file.
  *
  * It take the lead on index.php and override it.
  *
  * @author Thibault Milan <hello@thibaultmilan.com>
  */
 get_header(); ?>
<div class="ui inverted vertical masthead center aligned segment">

    <div class="ui container">
        <div class="ui large secondary inverted pointing menu">
            <a class="toc item">
                <i class="sidebar icon"></i>
            </a>
            <a class="active item">Home</a>
            <a class="item">Work</a>
            <a class="item">Company</a>
            <a class="item">Careers</a>
        </div>
    </div>

    <div class="ui text container">
        <?php the_post(); the_content();?>
    </div>

</div>
<div class="ui vertical stripe segment">
    <div class="ui middle aligned stackable grid container">
        <div class="row">
            <div class="eight wide column">
                <h3 class="ui header">We Help Companies and Companions</h3>
                <p>We can give your company superpowers to do things that they never thought possible. Let us delight your customers and empower your needs...through pure data analytics.</p>
                <h3 class="ui header">We Make Bananas That Can Dance</h3>
                <p>Yes that's right, you thought it was the stuff of dreams, but even bananas can be bioengineered.</p>
            </div>
            <div class="six wide right floated column">
                <img src="assets/images/wireframe/white-image.png" class="ui large bordered rounded image">
            </div>
        </div>
        <div class="row">
            <div class="center aligned column">
                <a class="ui huge button">Check Them Out</a>
            </div>
        </div>
    </div>
</div>


<div class="ui vertical stripe quote segment">
    <div class="ui equal width stackable internally celled grid">
        <div class="center aligned row">
            <?php
                $quotes = new WP_Query(
                    array(
                        'post_type' => 'quote',
                        'posts_per_page' => 2,
                    )
                );
                if ($quotes->have_posts()):

                    while ($quotes->have_posts()):
                        $quotes->the_post();?>
            <div class="column">
                <?php the_title('<h3>', '</h3>');?>
                <?php if (get_post_custom_values('quote_author')): ?>
                    <p>
                        <strong><?= get_post_custom_values('quote_author')[0] ?></strong>
                        <?= get_post_custom_values('quote_author_position')[0] ?>
                    </p>
                <?php endif;?>
            </div>
            <?php
                    endwhile;
                endif;
            ?>
        </div>
    </div>
</div>

<div class="ui vertical stripe segment">
    <div class="ui text container">
        <?php
            $posts = new WP_Query(
                array(
                    'post_type' => 'post',
                    'posts_per_page' => 1,
                )
            );
            if ($posts->have_posts()) :
                /* Start the Loop */
                while ($posts->have_posts()) : $posts->the_post();

                the_title('<h3 class="ui header">', '</h3>');
                the_excerpt();?>
        <a class="ui large button" href="<?php the_permalink()?>"><?= esc_html__('Read More', 'continuous'); ?></a>
        <?php
            endwhile;
            endif;
        ?>
    </div>
</div>
<?php
get_footer();
