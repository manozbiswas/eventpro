<?php

/* Register sidebars and widgetized areas ********************************************/
add_action('widgets_init', 'eventpro_widget_areas');
function eventpro_widget_areas()
{
    register_sidebar(array(
        'name' => __('Sidebar Right', 'eventpro'),
        'id' => 'sidebar-right',
        'description' => __('Drag widgets to this area to show the content to the right sitebar.', 'eventpro'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
//    register_sidebar( array(
//        'name' => __( 'Recent Events', 'eventpro' ),
//        'id' => 'recent-events',
//        'description' => __( 'An widget area for recent events.', 'eventpro' ),
//        'before_widget' => '<div class="widget">',
//        'after_widget' => '</div>',
//        'before_title' => '<h4 class="widget-title">',
//        'after_title' => '</h4>',
//    ) );
//    register_sidebar(array(
//        'name' => __('Recent Information', 'eventpro'),
//        'id' => 'recent-information',
//        'description' => __('An widget area for recent information.', 'eventpro'),
//        'before_widget' => '<div class="widget">',
//        'after_widget' => '</div>',
//        'before_title' => '<h4 class="widget-title information">',
//        'after_title' => '</h4>',
//    ));
//    register_sidebar(array(
//        'name' => __( 'Schedule Calender', 'eventpro' ),
//        'id' => 'schedule-calender',
//        'description' => __( 'An this widget area for the event calender.', 'eventpro' ),
//        'before_widget' => '<div id="%1$s" class="widget %2$s">',
//        'after_widget' => '</div>',
//        'before_title' => '<h4 class="widget-title">',
//        'after_title' => '</h4>',
//    ) );
//
//    register_sidebar( array(
//        'name' => __( 'Twitter widget', 'eventpro' ),
//        'id' => 'twitter-widget',
//        'description' => __( 'An optional widget area for your twitter tweet.', 'eventpro' ),
//        'before_widget' => '<div id="%1$s" class="widget %2$s">',
//        'after_widget' => '</div>',
//        'before_title' => '<h4 class="widget-title" >',
//        'after_title' => '</h4>',
//    ) );
//
//    register_sidebar( array(
//        'name' => __( 'Diffusy Images', 'brightpage' ),
//        'id' => 'diffusy-widget',
//        'description' => __( 'An optional widget area for diffusy.', 'brightpage' ),
//        'before_widget' => '<div id="%1$s" class="widget %2$s">',
//        'after_widget' => '</div>',
//        'before_title' => '<h4 class="widget-title">',
//        'after_title' => '</h4>',
//    ) );
}

/*
 * Create Recent Event Widget
 */

register_widget('RecentEventWidget');

class RecentEventWidget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'recent_event_widget', // Base ID
            'Recent Event Widget', // Name
            array('description' => __('Displays your latest Event list.
            Outputs the post thumbnail, title and date open start sessions per listing')
            )
        );
    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['numberOfListings'] = strip_tags($new_instance['numberOfListings']);
        return $instance;
    }

    function form($instance)
    {
        if ($instance) {
            $title = esc_attr($instance['title']);
            $numberOfListings = esc_attr($instance['numberOfListings']);
        } else {
            $title = '';
            $numberOfListings = '';
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'realty_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"/>
        </p>
        <p>
            <label
                for="<?php echo $this->get_field_id('numberOfListings'); ?>"><?php _e('Number of Listings:', 'realty_widget'); ?></label>
            <select id="<?php echo $this->get_field_id('numberOfListings'); ?>"
                    name="<?php echo $this->get_field_name('numberOfListings'); ?>">
                <?php for ($x = 1; $x <= 10; $x++): ?>
                    <option <?php echo $x == $numberOfListings ? 'selected="selected"' : ''; ?>
                        value="<?php echo $x; ?>"><?php echo $x; ?></option>
                <?php endfor; ?>
            </select>
        </p>
        <?php
    }

    function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $numberOfListings = $instance['numberOfListings'];
        echo $before_widget;
        if ($title) {
            echo $before_title . $title . $after_title;
        }
        $this->getRecentEventsLists($numberOfListings);
        echo $after_widget;
    }

    function getRecentEventsLists($numberOfListings)
    {
        global $post;
        $listings = new WP_Query();
        $listings->query('post_type=events&posts_per_page=' . $numberOfListings);
        if ($listings->found_posts > 0) {
            echo ' <div class="widget-content"><ul class="recent-events">';
            while ($listings->have_posts()) {
                $listings->the_post();
                $image = (has_post_thumbnail($post->ID)) ? wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'event-image-thumbnails')[0] : '';
                $status = get_post_meta($post->ID, '_eventpro_status', false);
                $eventDate = get_post_meta($post->ID, '_eventpro_event_date', true);
                $openAt = get_post_meta($post->ID, '_eventpro_open_at', true);
                $startAt = get_post_meta($post->ID, '_eventpro_start_at', true);
                ?>
                <li class="recent-event">
                    <a href="<?php echo get_permalink(); ?>">
                        <div class="event-image">

                            <img class="img-responsive" src="<?php echo $image; ?>" alt="">

                        </div>
                        <div class="event-details">
                            <div class="statusbar">
                                <ul class="arrow-recent">
                                    <li>Live</li>
                                    <li>
                                        <span class="date"><?php echo !empty($eventDate) ? date("m.d", $eventDate) : ''; ?></span>
                                        <span class="day"><?php echo !empty($eventDate) ? date("D", $eventDate) : ''; ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="open-starts">
                                <span class="open">Open <span><?php echo !empty($openAt) ? $openAt : "" ?></span></span>
                                <span class="starts">Starts <span><?php echo !empty($startAt) ? $startAt : "" ?></span></span>
                            </div>
                            <div class="excerpt">
                                <p><?php echo excerpt(6); ?></p>
                            </div>
                        </div>
                    </a>
                </li>
                <?php
            }
            echo '</ul></div>';
            wp_reset_postdata();
        } else {
            echo '<p style="padding:25px;">No listing found</p>';
        }
    }
} //end class Realty_Widget


/*
 * Recent Information
 */
register_widget('RecentInFormationWidget');

class RecentInFormationWidget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'recent_information_widget', // Base ID
            'Recent Information Widget', // Name
            array(
                'classname' => 'information',
                'description' => __('Displays your latest Information.
                   Outputs the post title and date per listing')
            )
        );
    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['numberOfListings'] = strip_tags($new_instance['numberOfListings']);
        $instance['allPostLinks'] = $new_instance['allPostLinks'];
        return $instance;
    }

    function form($instance)
    {
        if ($instance) {
            $title = esc_attr($instance['title']);
            $numberOfListings = esc_attr($instance['numberOfListings']);
            $allPostLinks = $instance['allPostLinks'];
        } else {
            $title = '';
            $numberOfListings = '';
            $allPostLinks = '';
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'realty_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"/>
        </p>
        <p>
            <label
                for="<?php echo $this->get_field_id('allPostLinks'); ?>"><?php _e('All Post Link', 'eventpro_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('allPostLinks'); ?>"
                   name="<?php echo $this->get_field_name('allPostLinks'); ?>" type="text"
                   value="<?php echo $allPostLinks; ?>"/>
        </p>
        <p>
            <label
                for="<?php echo $this->get_field_id('numberOfListings'); ?>"><?php _e('Number of Listings:', 'realty_widget'); ?></label>
            <select id="<?php echo $this->get_field_id('numberOfListings'); ?>"
                    name="<?php echo $this->get_field_name('numberOfListings'); ?>">
                <?php for ($x = 1; $x <= 10; $x++): ?>
                    <option <?php echo $x == $numberOfListings ? 'selected="selected"' : ''; ?>
                        value="<?php echo $x; ?>"><?php echo $x; ?></option>
                <?php endfor; ?>
            </select>
        </p>
        <?php
    }

    function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $numberOfListings = $instance['numberOfListings'];
        $allPostLinks = $instance['allPostLinks'];
        echo $before_widget;
        if ($title) {
            echo $before_title . $title . '<a href="' . $allPostLinks . '"><span class="all"><i class="fa fa-angle-right"></i>All</span></a>' . $after_title;
        }
        $this->getRecentInformationLists($numberOfListings);
        echo $after_widget;
    }

    function getRecentInformationLists($numberOfListings)
    {
        global $post;

        $args = array(
            'post_type' => 'post',// enter custom post type
            'posts_per_page' => $numberOfListings,
            'orderby' => 'date',
            'order' => 'DESC',
        );
        $listings = new WP_Query($args);
//        $listings->query('post_type=posts&posts_per_page=' . $numberOfListings);
        if ($listings->have_posts()) {
            echo ' <div class="widget-content"><ul class="">';
            while ($listings->have_posts()) {
                $listings->the_post();
                $image = (has_post_thumbnail($post->ID)) ? wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'event-image-thumbnails')[0] : '';
                ?>
                <li class="information">
                    <a href="<?php echo the_permalink(); ?>"> <span
                            class="date"><?php echo the_time('Y.m.d D') ?></span>
                        <p class="excerpt"><?php echo excerpt(20); ?></p>
                    </a>
                </li>
                <?php
            }
            echo '</ul></div>';
            wp_reset_postdata();
        } else {
            echo '<p style="padding:25px;">No listing found</p>';
        }
    }
} //end class Realty_Widget
