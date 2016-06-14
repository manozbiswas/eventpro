<div class="col-md-3 col-sm-12">
    <!--sidebar starts-->
    <div class="sidebar">
        <?php if (is_active_sidebar('sidebar-right')) : ?>
            <div id="secondary" class="widget-area" role="complementary">
                <?php dynamic_sidebar('sidebar-right'); ?>
            </div>
        <?php endif; ?>
        <?php if (is_active_sidebar('recent-information')) : ?>
            <?php dynamic_sidebar('recent-information'); ?>
        <?php endif; ?>
        <div class="widget">
            <h4 class="widget-title">Recent live</h4>
            <div class="widget-content">
                <ul class="recent-events">
                    <li class="recent-event">
                        <div class="event-image">
                            <a href="">
                                <img class="img-responsive"
                                     src="<?php echo get_template_directory_uri(); ?>/assets/images/recent.jpg"
                                     alt=""></a>
                        </div>
                        <div class="event-details">
                            <div class="statusbar">
                                <span class="status">Live</span>
                                <span class="time">6.10 Fri</span>
                            </div>
                            <div class="open-starts">
                                <span class="open">Open 22.00</span>
                                <span class="starts">Starts 22.00</span>
                            </div>
                            <div class="excerpt">
                                <p>Live title text<br>
                                    Live title text</p>
                            </div>
                        </div>
                    </li>
                    <li class="recent-event">
                        <div class="event-image">
                            <a href=""><img class="img-responsive"
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/recent.jpg"
                                            alt=""></a>
                        </div>
                        <div class="event-details">
                            <div class="statusbar">
                                <span class="status">Live</span>
                                <span class="time">6.10 Fri</span>
                            </div>
                            <div class="open-starts">
                                <span class="open">Open 22.00</span>
                                <span class="starts">Starts 22.00</span>
                            </div>
                            <p>Live title text<br>
                                Live title text</p>
                        </div>
                    </li>
                    <li class="recent-event">
                        <div class="event-image">
                            <a href=""><img class="img-responsive"
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/recent.jpg"
                                            alt=""></a>
                        </div>
                        <div class="event-details">
                            <div class="statusbar">
                                <span class="status">Live</span>
                                <span class="time">6.10 Fri</span>
                            </div>
                            <div class="open-starts">
                                <span class="open">Open 22.00</span>
                                <span class="starts">Starts 22.00</span>
                            </div>
                            <div class="excerpt">
                                <p>Live title text<br>
                                    Live title text</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="widget">
            <h4 class="widget-title month-schedule">Monthly Schedule</h4>
            <div class="widget-content">
                <?php get_calendar(); ?>
            </div>
        </div>
        <div class="widget">
            <h4 class="widget-title information">Information
                <span class="all"><i class="fa fa-angle-right"></i>All</span></h4>
            <div class="widget-content">
                <ul>
                    <li class="information">
                        <span class="date">2016.6.10</span>
                        <p class="excerpt">Text of news and topics.
                            Show about two to three lines. </p>
                    </li>
                    <li class="information">
                        <span class="date">2016.6.10</span>
                        <p class="excerpt">Text of news and topics.
                            Show about two to three lines. </p>
                    </li>
                    <li class="information">
                        <span class="date">2016.6.10</span>
                        <p class="excerpt">Text of news and topics.
                            Show about two to three lines. </p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="widget">
            <h4 class="widget-title twitter-feed">Tweets</h4>
            <div class="widget-content">
            </div>
        </div>
        <div class="widget">
            <div class="widget-content">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/diffusy.jpg" alt="">
            </div>
        </div>
    </div>
    <!--sidebar ends-->
</div>