<?php
/*
*Template Name: Schedule page
 * To use this template, on the Add a Page, select Schedule Page from the Template drop-down menu.
 * This page will show all the schedule by months.
 * @package WordPress
 * @subpackage Eventpro
 */
get_header();
?>
<!--main content starts-->
<section class="main-content">
    <div class="container custom-container">
        <div class="row">
            <div class="col-md-9 col-sm-12">
                <!--content left starts-->
                <div class="content">
                    <div>
                        <?php
                        $args = array(
                            'post_type' => 'events', // enter custom post type
                            'orderby' => 'date',
                            'order' => 'DESC',
                        );
                        $loop = new WP_Query($args);
                        if ($loop->have_posts()):
                            while ($loop->have_posts()):
                                $loop->the_post();
                                global $post;
                                $status = get_post_meta(get_the_ID(), '_eventpro_status', false);
                                $eventDate = get_post_meta(get_the_ID(), '_eventpro_event_date', true);
                                $openAt = get_post_meta(get_the_ID(), '_eventpro_open_at', true);
                                $startAt = get_post_meta(get_the_ID(), '_eventpro_start_at', true);
                                $subTitle = get_post_meta(get_the_ID(), '_eventpro_sub_title', true);
                                $adv = get_post_meta(get_the_ID(), '_eventpro_adv', true);
                                $door = get_post_meta(get_the_ID(), '_eventpro_door', true);
                                $drink = get_post_meta(get_the_ID(), '_eventpro_drink', true);
                                //                                              print_r($text);
                                ?>
                                <div class="single-event schedule seperator">
                                    <div class="feature-image">
                                        <?php //the_post_thumbnail( 'event-image-big' );
                                        if (has_post_thumbnail($post->ID)) {
                                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'event-image-big')[0];
                                        } else {
                                            $image = get_template_directory_uri() . '/assets/images/no-featured-image.png';
                                        }
                                        ?>
                                        <a href="<?php the_permalink(); ?>"> <img class="img-responsive"
                                                                                  src="<?php echo $image; ?>"
                                                                                  alt=""></a>
                                    </div>
                                    <div class="details-pane">
                                        <ul class="make-arrow">
                                            <li class="li-status"><?php echo !empty($status) ? $status[0] : 'Live'; ?></li>
                                            <li class="bg-color-yellow li-same">
                                <span class="date  "> <?php echo !empty($eventDate) ? date("m.d", $eventDate) : ''; ?><span class="day"><?php echo !empty($eventDate) ? date("D", $eventDate) : ''; ?></span></span>
                                                <span class="bar hide-in-mobile"></span>
                                <span class="time  ">OPEN
                                    <span><?php echo !empty($openAt) ? $openAt : ""; ?></span> / START
                                    <span><?php echo !empty($startAt) ? $startAt : ''; ?></span>
                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <h2 class="event-title title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    <h4 class="sub-title">
                                        <?php echo !empty($subTitle) ? $subTitle : ''; ?>
                                    </h4>
                                    <div class="content-text">
                                        <p><?php the_excerpt(); ?></p>
                                        <ul class="ticket-package">
                                            <li><?php echo !empty($adv) ? '<span class="cc adv ">Adv </span> ¥' . $adv : ''; ?></li>
                                            <li><?php echo !empty($adv) ? '<span class="cc door ">Door </span> ¥' . $adv : ''; ?></li>
                                            <li><?php echo !empty($adv) ? '<span class="cc drink ">Drink </span> ¥' . $adv . ' / 1 order' : ''; ?></li>
                                        </ul>
                                    </div>
                                    <div class="ticket-contact">
                                        <ul>
                                            <li><i class="fa fa-angle-right"></i> <a href=<?php the_permalink(); ?>"">Details</a>
                                            </li>
                                            <li><i class="fa fa-angle-right"></i> <a href="">Ticket</a></li>
                                            <li><i class="fa fa-angle-right"></i> <a href="">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--                                <hr/>-->
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php else: ?>
                            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>f(!emp
                        <?php endif; ?>
                    </div>
                </div><!--content left ends-->
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>
<!--main content ends-->
<?php get_footer(); ?>
