<?php
/*
*Template Name: Front Page
 * To use this template, on the Add a Page, select Front Page from the Template drop-down menu.
 * @package WordPress
 * @subpackage Eventpro
 */
get_header();
get_template_part('banner');
?>
    <!--main content starts-->
    <section class="main-content">
        <div class="container custom-container">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <!--content left starts-->
                    <div class="content">
                        <?php get_template_part('content-event');?>
                    </div ><!--content left ends-->
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>
    <!--main content ends-->
<?php get_footer(); ?>