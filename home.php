<?php
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
        <h1 class="ui inverted header">
            Imagine-a-Company
        </h1>
        <h2>Do whatever you want when you want to.</h2>
        <div class="ui huge primary button">Get Started <i class="right arrow icon"></i></div>
    </div>

</div>
<?php
get_sidebar();
get_footer();
