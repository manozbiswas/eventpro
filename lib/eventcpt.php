<?php
/*
* Creating a function to create our CPT
*/

function custom_post_type()
{
// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Events', 'Post Type General Name', 'eventpro'),
        'singular_name' => _x('Event', 'Post Type Singular Name', 'eventpro'),
        'menu_name' => __('Events', 'eventpro'),
        'parent_item_colon' => __('Parent Event', 'eventpro'),
        'all_items' => __('All Events', 'eventpro'),
        'view_item' => __('View Event', 'eventpro'),
        'add_new_item' => __('Add New Event', 'eventpro'),
        'add_new' => __('Add New', 'eventpro'),
        'edit_item' => __('Edit Event', 'eventpro'),
        'update_item' => __('Update Event', 'eventpro'),
        'search_items' => __('Search Event', 'eventpro'),
        'not_found' => __('Not Found', 'eventpro'),
        'not_found_in_trash' => __('Not found in Trash', 'eventpro'),
    );

// Set other options for Custom Post Type

    $args = array(
        'label' => __('Events', 'eventpro'),
        'description' => __('Event news and reviews', 'eventpro'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => get_template_directory_uri() . "/assets/images/icon/schedule-icon.png",
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );

    // Registering your Custom Post Type
    register_post_type('Events', $args);

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action('init', 'custom_post_type', 0);

add_action('admin_head', 'cpt_icons');
function cpt_icons()
{
    ?>
    <style type="text/css" media="screen">
        #menu-posts-events .wp-menu-image img {
            opacity: 0.6;
            padding: 0;
        }

        #menu-posts-events .wp-menu-image img:hover {
            color: #00B9EB;
        }
    </style>
<?php } ?>

<?php
/**
 *Event taxonomies
 */
function event_taxonomies()
{
    $labels = array(
        'name' => _x('Categories', 'taxonomy general name'),
        'singular_name' => _x('Category', 'taxonomy singular name'),
        'search_items' => __('Search Event Categories'),
        'all_items' => __('All Event Categories'),
        'parent_item' => __('Parent Event Category'),
        'parent_item_colon' => __('Parent Event Category:'),
        'edit_item' => __('Edit Event Category'),
        'update_item' => __('Update Event Category'),
        'add_new_item' => __('Add New Event Category'),
        'new_item_name' => __('New Event Category'),
        'menu_name' => __('Categories'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'show_admin_column'=> true
    );
    register_taxonomy('event_category', 'events', $args);
/*
 * Tag taxonomy
 */
    $labels = array(
        'name' => _x('Tags', 'taxonomy general name'),
        'singular_name' => _x('Tag', 'taxonomy singular name'),
        'search_items' => __('Search Event Tags'),
        'all_items' => __('All Event Tags'),
        'parent_item' => __('Parent Event Tag'),
        'parent_item_colon' => __('Parent Event Tag:'),
        'edit_item' => __('Edit Event Tag'),
        'update_item' => __('Update Event Tag'),
        'add_new_item' => __('Add New Event Tag'),
        'new_item_name' => __('New Event Tag'),
        'menu_name' => __('Tags'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'show_admin_column'=> true
    );
    register_taxonomy('event_tag', 'events', $args);
}

add_action('init', 'event_taxonomies', 0);

