<div class="content-header">
    <h1 class="heading">RECOMMEND LIVE EVENT</h1>
    <a href="<?php global $redux_demo;
    echo !empty($redux_demo['schedule-page']) ? $redux_demo['schedule-page'] : ''; ?>"
       class="btn btn-primary link-schedule">
        <i class="fa fa-angle-right"></i>
        Schedule
    </a>
    <hr class="header-line"/>
</div>
<div class="events row">
    <?php
    $args = array(
        'post_type' => 'events', // enter custom post type
        'orderby' => 'date',
        'order' => 'DESC',
    );
    $loop = new WP_Query($args);
    if ($loop->have_posts()):
        while ($loop->have_posts()): $loop->the_post();
            global $post;
            ?>
            <div class="col-md-6 col-sm-6">
                <div class="event">
                    <?php
                    $status = get_post_meta(get_the_ID(), '_eventpro_status', false);
                    $eventDate = get_post_meta(get_the_ID(), '_eventpro_event_date', true);
                    $openAt = get_post_meta(get_the_ID(), '_eventpro_open_at', true);
                    $startAt = get_post_meta(get_the_ID(), '_eventpro_start_at', true);
                    //                                              print_r($text);
                    ?>
                    <div class="featured-image">
                        <a href="<?php the_permalink(); ?>">
                            <?php //the_post_thumbnail( 'event-image-big' );
                            if (has_post_thumbnail($post->ID)) {
                                $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'event-image-medium')[0];
                            } else {
                                $image = get_template_directory_uri() . '/assets/images/no-featured-image.png';
                            }
                            ?>
                            <img class="img-responsive" src="<?php echo $image; ?>" alt="">
                        </a>
                    </div>
                    <div class="details-pane">
                        <ul class="make-arrow">
                            <li class="li-status"><?php echo !empty($status) ? $status[0] : 'Live'; ?></li>
                            <li class="bg-color-yellow li-same">
                                <span class="date"> <?php echo !empty($eventDate) ? date("m.d", $eventDate) : ''; ?><span class="day"><?php echo !empty($eventDate) ? date("D", $eventDate) : ''; ?></span></span> |
                                <span class="time  ">OPEN
                                    <span><?php echo !empty($openAt) ? $openAt : ""; ?></span> / START
                                    <span><?php echo !empty($startAt) ? $startAt : ''; ?></span>
                                </span>
                            </li>
                        </ul>
<!--                        <span class="status"></span>-->
<!--                            <span class="bg-color-yellow same">-->
<!--                                -->
<!--                            </span>-->
                    </div>
                    <h3 class="title"><a
                            href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="excerpt">
                        <p><?php echo excerpt(10); ?></p>
                    </div>
                </div>
            </div>
            <?php
        endwhile;
    endif;
    ?>
</div>