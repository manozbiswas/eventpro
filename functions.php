<?php


if (file_exists(dirname(__FILE__) . '/lib/require.php')) {
    require_once dirname(__FILE__) . '/lib/require.php';
}
//global $redux_demo;
//print_r($redux_demo);
/**
 * Enqueue scripts and styles.
 *
 * @since Event pro 1.0
 */
function eventpro_scripts()
{

    // Load the Internet Explorer specific stylesheet.
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/assets/css/font-awesome.min.css');
    wp_enqueue_style('tab-css', get_template_directory_uri() . '/assets/css/tab.css');
    // Load our main stylesheet.
    wp_enqueue_style('main-style-sheet', get_stylesheet_uri());

    //Load wordpress default jquery
    wp_enqueue_script("jquery");
    //Load other scripts
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '', true);
    wp_enqueue_script('scrollup-js', get_template_directory_uri() . '/assets/js/jquery.scrollUp.js', array(), '', true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array(), '20141010', true);

}

add_action('wp_enqueue_scripts', 'eventpro_scripts');


/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support('title-tag');
add_theme_support('post-thumbnails', array('post', 'events')); // Add it for posts
set_post_thumbnail_size(200, 200, true); // Normal post thumbnails, hard crop mode
add_image_size('event-image-big', 720, 470, true); // Event image, hard crop mode
add_image_size('event-image-medium', 310, 200, true); // Event image, hard crop mode
add_image_size('event-image-thumbnails', 180, 180, true); // Post thumbnails, hard crop mode
add_image_size('slider-image', 690, 460, true); // Post thumbnails for slider, hard crop mode
/*
 * Enable support for Post Thumbnails on posts and pages.
 *
 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
 */


//// This theme uses wp_nav_menu() in two locations.
//register_nav_menus( array(
//    'primary' => __( 'Primary Menu',      'twentyfifteen' ),
//    'social'  => __( 'Social Links Menu', 'twentyfifteen' ),
//) );
// This theme uses wp_nav_menu() in two locations.
add_action('init', 'wpj_register_menu');
function wpj_register_menu()
{
    if (function_exists('register_nav_menu')) {
        register_nav_menus(array(
            'main' => __('Main Menu', 'eventpro'),
            'footer' => __('Footer Menu', 'eventpro'),
            'footer_links' => __('Footer Links ', 'eventpro'),
        ));
    }
}

function wpj_default_menu()
{
    echo '<ul id="dropmenu">';
    if ('page' != get_option('show_on_front')) {
        echo '<li><a href="' . home_url() . '/">Home</a></li>';
    }
    wp_list_pages('title_li=');
    echo '</ul>';
}

/*
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */
add_theme_support('html5', array(
    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
));

/*
 * Enable support for Post Formats.
 *
 * See: https://codex.wordpress.org/Post_Formats
 */
add_theme_support('post-formats', array(
    'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
));

/* Set the excerpt length */

function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}
/*Use this code in your template file
 * <?php echo excerpt(25); ?>
 */
function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
        $content = implode(" ",$content);
    }
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}

function eventpro_new_excerpt_length($length) {
    return 10;
}
//add_filter('excerpt_length', 'eventpro_new_excerpt_length');

/** remove redux menu under the tools **/
add_action('admin_menu', 'remove_redux_menu', 12);
function remove_redux_menu()
{
    remove_submenu_page('tools.php', 'redux-about');
}