<div class="col-md-3 col-sm-12">
    <!--sidebar starts-->
    <div class="sidebar">
        <?php if (is_active_sidebar('sidebar-right')) : ?>
            <div id="secondary" class="widget-area" role="complementary">
                <?php dynamic_sidebar('sidebar-right'); ?>
            </div>
        <?php endif; ?>
        <div class="widget">
            <h4 class="widget-title month-schedule">Monthly Schedule</h4>
            <div class="widget-content">
                <?php get_calendar(); ?>
            </div>
        </div>
<!--        --><?php //if (is_active_sidebar('recent-information')) : ?>
<!--            --><?php //dynamic_sidebar('recent-information'); ?>
<!--        --><?php //endif; ?>
        <div class="widget">
            <h4 class="widget-title twitter-feed">Tweets</h4>
            <div class="widget-content">
            </div>
        </div>
        <div class="widget">
            <div class="widget-content">
                <div class="difusy">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/diffusy.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!--sidebar ends-->
</div>