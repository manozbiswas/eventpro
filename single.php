<?php
get_header();
?>    <!--main content starts-->
    <section class="main-content">
        <div class="container custom-container">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <!--content left starts-->
                    <div class="content">
                        single post
                        <div class="single-event post">
                            <?php if (have_posts()): ?>
                                <?php while (have_posts()): ?>
                                    <?php the_post(); ?>
                                    <div class="feature-image">
                                        <?php //the_post_thumbnail( 'event-image-big' );
                                        if (has_post_thumbnail($post->ID)) {
                                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'event-image-big')[0];
                                        } else {
                                            $image = '';//get_template_directory_uri() . '/assets/images/no-featured-image.png';
                                        }
                                        ?>
                                        <img class="img-responsive" src="<?php echo $image; ?>" alt="">
                                    </div>
                                    <div class="details-pane">
                                        <span class="post-status">Info</span>
                                                <span class="post-date">
                                                     <?php echo the_time('Y.m.d D') ?>
                                                </span>
                                    </div>
                                    <h3 class="event-title title">
                                        <?php the_title(); ?>
                                    </h3>
                                    <div class="content-text">
                                        <p><?php the_content(); ?></p>
                                    </div>
                                    <div class="ticket-contact">
                                        <ul>
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
                                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
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