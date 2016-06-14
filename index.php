<?php
get_header();
?>    <!--main content starts-->
    <section class="main-content" xmlns="http://www.w3.org/1999/html">
        <div class="container custom-container">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <!--content left starts-->
                    <div class="content">
                        <div class="single-event post">
                            <?php
                            if (have_posts()):
                                while (have_posts()):
                                    the_post();
                                    $status = get_post_meta(get_the_ID(), '_eventpro_status', false);
                                    $eventDate = get_post_meta(get_the_ID(), '_eventpro_event_date', true);
                                    //                                              print_r($text);
                                    ?>
                                    <div class="post-content">
                                        <div class="feature-image">
                                            <?php //the_post_thumbnail( 'event-image-big' );
                                            if (has_post_thumbnail($post->ID)) {
                                                $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'event-image-big')[0];
                                            } else {
                                                $image = '';//get_template_directory_uri() . '/assets/images/no-featured-image.png';
                                            }
                                            ?>
                                            <a href="<?php the_permalink(); ?>"><img class="img-responsive"
                                                                                     src="<?php echo $image; ?>" alt=""></a>
                                        </div>
                                        <div class="details-pane">
                                            <span class="post-status">Info</span>
                                                <span class="post-date">
                                                     <?php echo the_time('Y.m.d D') ?>
                                                </span>
                                        </div>
                                        <h3 class="event-title title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                        <div class="content-text">
                                            <p><?php the_excerpt(); ?></p>
                                        </div>
                                        <div class="ticket-contact">
                                            <ul>
                                                <li><i class="fa fa-angle-right"></i> <a
                                                        href="<?php the_permalink(); ?>">Details</a></li>
                                                <li><i class="fa fa-angle-right"></i> <a href="">Contact</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <hr/>
                                <?php endwhile; ?>
                                <div class="nextpast loadmore">
                                    <ul>
                                        <li style="">
                                           <a href="#">Load more</a>
                                        </li>
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