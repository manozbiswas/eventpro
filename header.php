<?php
global $redux_demo;
//print_r($redux_demo);
?>
<!DOCTYPE html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Event management Application</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <!---->
    <!--    <link rel="stylesheet" href="-->
    <?php //echo get_template_directory_uri();?><!--/assets/css/bootstrap.min.css">-->
    <!--    <link rel="stylesheet" href="-->
    <?php //echo get_template_directory_uri();?><!--/assets/css/font-awesome.min.css">-->
    <!--    <link id="scrollUpTheme" rel="stylesheet" href="-->
    <?php //echo get_template_directory_uri();?><!--/assets/css/tab.css">-->
    <!--    <link rel="stylesheet" href="--><?php //echo get_stylesheet_uri();?><!--">-->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/modernizr-2.8.3.min.js"></script>
    <?php wp_head(); ?>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<!--wrapper starts-->
<div class="container-fluid wrapper">
    <!--header starts-->
    <section class="header">
        <div class="header-top">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="logo">
                            <?php if(!empty($redux_demo['header_logo']['url']))
                                  $logo = $redux_demo['header_logo']['url'];
                                 else
                                  $logo = get_template_directory_uri().'/assets/images/logo.png';
                            ?>
                            <a href="<?php bloginfo('url'); ?>"><img class="image-responsive" src="<?php echo $logo; ?>" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="link-bar hide-in-mobile">
                            <?php
                            global $redux_demo;
//                                                print_r($redux_demo);
                            $facebook = !empty($redux_demo['opt-facebook-link']) ? $redux_demo['opt-facebook-link'] : 'https://facebook.com';
                            $twitter = !empty($redux_demo['opt-twitter-link']) ? $redux_demo['opt-twitter-link'] : 'https://twitter.com';
                            $instagram = !empty($redux_demo['opt-instagram-link']) ? $redux_demo['opt-instagram-link'] : 'https://instagram.com';
                            $artistRecruit = !empty($redux_demo['header-artist-recruit-link']) ? $redux_demo['header-artist-recruit-link'] : '';
                            $staffRecruit = !empty($redux_demo['header-staff-recruit-link']) ? $redux_demo['header-staff-recruit-link'] : '';

                            ?>
                            <ul class="link-bar-nav">
                                <li class="link-only"><a target="_blank" href="<?php echo !empty($artistRecruit)? esc_html($artistRecruit): ''; ?>">Artist Recruit</a></li>
                                <li class="link-only"><a target="_blank" href="<?php echo !empty($staffRecruit)? esc_html($staffRecruit): ''; ?>">staff Recruit</a></li>
                                <li><a target="_blank" href="<?php echo !empty($facebook)? esc_html($facebook): ''; ?>"><i class="fa fa-facebook"></i></a></li>
                                <li><a target="_blank" href="<?php echo !empty($twitter)? esc_html($twitter) : ''; ?>"><i class="fa fa-twitter"></i></a></li>
                                <li><a target="_blank" href="<?php echo !empty($instagram)? esc_html($instagram): ''; ?>"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <nav class="navbar navbar-default">
                <div class="container custom-container">
                <div class="row">
                <div class="col-sm-12">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <?php
                        if (function_exists('wp_nav_menu')) {
                            wp_nav_menu(array(
                                    'menu' => 'main',
                                    'theme_location' => 'main',
                                    'menu_id' => 'dropmenu',
                                    'menu_class' => 'nav navbar-nav',
                                    'fallback_cb' => 'wpj_default_menu'
                                )
                            );
                        } else {
                            wpj_default_menu();
                        }
                        ?>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
                </div><!-- /.container-fluid -->
                </div><!-- /.container-fluid -->
            </nav>
            <hr class="header-line"/>
        </div>
    </section><!--header ends-->