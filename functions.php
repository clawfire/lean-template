<?php
/**
 * continuous functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */
if (!function_exists('continuous_setup')) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function continuous_setup()
{
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on continuous, use a find and replace
     * to change 'continuous' to the name of your theme in all the template files.
     */
    load_theme_textdomain('continuous', get_template_directory().'/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(array(
        'primary' => esc_html__('Primary', 'continuous'),
    ));

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    /*
     * Enable support for Post Formats.
     * See https://developer.wordpress.org/themes/functionality/post-formats/
     */
    add_theme_support('post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
    ));

    // Set up the WordPress core custom background feature.
    add_theme_support('custom-background', apply_filters('continuous_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    )));
}
endif;
add_action('after_setup_theme', 'continuous_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function continuous_content_width()
{
    $GLOBALS['content_width'] = apply_filters('continuous_content_width', 640);
}
add_action('after_setup_theme', 'continuous_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function continuous_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'continuous'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'continuous'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer : left', 'continuous'),
        'id' => 'footer-1',
        'description' => esc_html__('Add widgets here.', 'continuous'),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="ui inverted header">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer : center', 'continuous'),
        'id' => 'footer-2',
        'description' => esc_html__('Add widgets here.', 'continuous'),
        'before_widget' => '<div id="%1$s" class="column %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="ui inverted header">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer : right', 'continuous'),
        'id' => 'footer-3',
        'description' => esc_html__('Add widgets here.', 'continuous'),
        'before_widget' => '<div id="%1$s" class="column %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="ui inverted header">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'continuous_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function continuous_scripts()
{
    wp_enqueue_style('continuous-style', get_stylesheet_uri(), array('open-sans-font'));
    wp_enqueue_style('open-sans-font', 'https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,700italic,700');

    wp_enqueue_script('continuous-navigation', get_template_directory_uri().'/js/navigation.js', array('dropdown'), '20151215', true);

    wp_enqueue_script('continuous-skip-link-focus-fix', get_template_directory_uri().'/js/skip-link-focus-fix.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_enqueue_script('dropdown', get_template_directory_uri().'/styles/semantic-ui/components/dropdown.min.js', array('jquery', 'transition'), '', true);
    wp_enqueue_script('transition', get_template_directory_uri().'/styles/semantic-ui/components/transition.min.js', array('jquery'), '', true);
    wp_enqueue_script('visibility', get_template_directory_uri().'/styles/semantic-ui/components/visibility.min.js', array('jquery'), '', true);
    wp_enqueue_script('sidebar', get_template_directory_uri().'/styles/semantic-ui/components/sidebar.min.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'continuous_scripts');

/**
 * Add the class .item to the <li> tags in a menu.
 */
function add_class_on_li($classes, $item, $args)
{
    $classes[] = 'item';

    return $classes;
}
add_filter('nav_menu_css_class', 'add_class_on_li', 1, 3);

/**
 * Limit the number of post returned in the main WP loop in the homepage.
 *
 * @param object $query the original WP query
 */
function one_posts_on_homepage($query)
{
    if ($query->is_home() && $query->is_main_query()) {
        $query->set('posts_per_page', 1);
    }
}
add_action('pre_get_posts', 'one_posts_on_homepage');

/*
* Register Custom Post Type Quotes.
*/
if (!function_exists('custom_post_type_quotes')) {
    function custom_post_type_quotes()
    {
        $labels = array(
            'name' => _x('Quotes', 'Post Type General Name', 'continuous'),
            'singular_name' => _x('Quote', 'Post Type Singular Name', 'continuous'),
            'menu_name' => __('Quotes', 'continuous'),
            'name_admin_bar' => __('Post Type', 'continuous'),
            'archives' => __('Quote Archives', 'continuous'),
            'parent_item_colon' => __('Parent Quote:', 'continuous'),
            'all_items' => __('All Quotes', 'continuous'),
            'add_new_item' => __('Add New Quote', 'continuous'),
            'add_new' => __('Add New', 'continuous'),
            'new_item' => __('New Quote', 'continuous'),
            'edit_item' => __('Edit Quote', 'continuous'),
            'update_item' => __('Update Quote', 'continuous'),
            'view_item' => __('View Quote', 'continuous'),
            'search_items' => __('Search Quote', 'continuous'),
            'not_found' => __('Not found', 'continuous'),
            'not_found_in_trash' => __('Not found in Trash', 'continuous'),
            'featured_image' => __('Featured Image', 'continuous'),
            'set_featured_image' => __('Set featured image', 'continuous'),
            'remove_featured_image' => __('Remove featured image', 'continuous'),
            'use_featured_image' => __('Use as featured image', 'continuous'),
            'insert_into_item' => __('Insert into quote', 'continuous'),
            'uploaded_to_this_item' => __('Uploaded to this quote', 'continuous'),
            'items_list' => __('Quotes list', 'continuous'),
            'items_list_navigation' => __('Quotes list navigation', 'continuous'),
            'filter_items_list' => __('Filter quotes list', 'continuous'),
        );
        $args = array(
            'label' => __('Quote', 'continuous'),
            'description' => __('A quote from a client', 'continuous'),
            'labels' => $labels,
            'supports' => array('title', 'custom-fields'),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-format-quote',
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => true,
            'publicly_queryable' => false,
            'rewrite' => false,
            'capability_type' => 'page',
        );
        register_post_type('quote', $args);
    }
    add_action('init', 'custom_post_type_quotes', 0);
}

/**
 * Add icon shortcut.
 */
function icon($atts)
{

    // Attributes
    extract(shortcode_atts(
        array(
            'color' => 'black',
            'icon' => '',
            'size' => 'medium',
        ), $atts)
    );

    // Code
    return '<i class="$color $size $icon icon"></i>';
}
add_shortcode('icon', 'icon');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory().'/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory().'/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory().'/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory().'/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory().'/inc/jetpack.php';
