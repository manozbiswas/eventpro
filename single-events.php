<?php
get_header();
?>    <!--main content starts-->
    <section class="main-content">
        <div class="container custom-container">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <!--content left starts-->
                    <div class="content">
                        <div class="single-event">
                            <?php
                            if (have_posts()):
                                while (have_posts()):
                                    the_post();
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
                                    <div class="feature-image">
                                        <?php //the_post_thumbnail( 'event-image-big' );
                                        if (has_post_thumbnail($post->ID)) {
                                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'event-image-big')[0];
                                        } else {
                                            $image = get_template_directory_uri() . '/assets/images/no-featured-image.png';
                                        }
                                        ?>
                                        <img class="img-responsive" src="<?php echo $image; ?>" alt="">
                                    </div>
                                    <div class="details-pane">
                                        <span class="status"><?php echo !empty($status) ? $status[0] : 'Live'; ?></span>
                                                <span class="bg-color-yellow same">
                                                     <span
                                                         class="date  "> <?php echo !empty($eventDate) ? date("m.d D", $eventDate) : ''; ?></span>
                                                    <span
                                                        class="time  ">OPEN <span><?php echo !empty($openAt) ? $openAt : ""; ?></span> / START
                                                        <span><?php echo !empty($startAt) ? $startAt : ''; ?></span>
                                                    </span>
                                                </span>
                                    </div>
                                    <h2 class="event-title title">
                                        <?php the_title(); ?>
                                    </h2>
                                    <h4 class="sub-title">
                                        <?php echo !empty($subTitle) ? $subTitle : ''; ?>
                                    </h4>
                                    <div class="content-text">
                                        <p><?php the_content(); ?></p>
                                        <ul class="ticket-package">
                                            <li><?php echo !empty($adv) ? '<span class="cc adv ">Adv </span> ¥' . $adv : ''; ?></li>
                                            <li><?php echo !empty($adv) ? '<span class="cc door ">Door </span> ¥' . $adv : ''; ?></li>
                                            <li><?php echo !empty($adv) ? '<span class="cc drink ">Drink </span> ¥' . $adv . ' / 1 order' : ''; ?></li>
                                        </ul>
                                    </div>
                                    <div class="ticket-contact">
                                        <ul>
                                            <li><i class="fa fa-angle-right"></i> <a href="">Ticket</a></li>
                                            <li><i class="fa fa-angle-right"></i> <a href="">Contact</a></li>
                                        </ul>
                                    </div>
                                    <hr/>
                                <?php endwhile; ?>
                                <div class="nextpast">
                                    <ul>
                                        <?php if ($link = get_previous_post_link()): ?>
                                            <li style="float:left">
                                                <i class="fa fa-angle-left"></i>
                                                <?php previous_post_link('%link', 'previous'); ?>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ($link = get_next_post_link()): ?>
                                            <li style="float:right">
                                                <i class="fa fa-angle-right"> </i>
                                                <?php next_post_link('%link', 'Next'); ?>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
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