<!doctype html>
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
<!--    <link rel="stylesheet" href="--><?php //echo get_template_directory_uri();?><!--/assets/css/bootstrap.min.css">-->
<!--    <link rel="stylesheet" href="--><?php //echo get_template_directory_uri();?><!--/assets/css/font-awesome.min.css">-->
<!--    <link id="scrollUpTheme" rel="stylesheet" href="--><?php //echo get_template_directory_uri();?><!--/assets/css/tab.css">-->
<!--    <link rel="stylesheet" href="--><?php //echo get_stylesheet_uri();?><!--">-->
    <script src="<?php echo get_template_directory_uri();?>/assets/js/modernizr-2.8.3.min.js"></script>
    <?php wp_head();?>
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
                    <div class="col-md-6">
                        <div class="logo">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/logo.png" alt="logo">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="link-bar ">
                            <ul class="link-bar-nav">
                                <li class="link-only"><a href="#">Artist Recruit</a></li>
                                <li class="link-only"><a href="#">staff Recruit</a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                            <!--<ul class="social-icon">-->
                            <!--<li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
                            <!--<li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
                            <!--<li><a href="#"><i class="fa fa-instagram"></i></a></li>-->
                            <!--</ul>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <nav class="navbar navbar-default">
                <div class="container custom-container">
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
                        <ul class="nav navbar-nav">
                            <!--<li class=""><a href="#"><i class="nav-icon home-icon"></i>Home</a></li>-->
                            <!--<li class=""><a href="#"><i class="nav-icon about-icon"></i>about</a></li>-->
                            <!--<li class=""><a href="#"><i class="nav-icon schedule-icon"></i>schedule</a></li>-->
                            <!--<li class=""><a href="#"><i class="nav-icon equipment-icon"></i>equipment</a></li>-->
                            <!--<li class=""><a href="#"><i class="nav-icon hall-rental-icon"></i>Hall rental</a></li>-->
                            <!--<li class=""><a href="#"><i class="nav-icon ticket-icon"></i>ticket</a></li>-->
                            <!--<li class=""><a href="#"><i class="nav-icon contact-icon"></i>Contact</a></li>-->
                            <!--<li class=""><a href="#"><i class="nav-icon access-icon"></i>access</a></li>-->
                            <li class=""><a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/icon/home-icon.png">Home</a></li>
                            <li class=""><a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/icon/about-icon.png">about</a></li>
                            <li class=""><a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/icon/schedule-icon.png">schedule</a></li>
                            <li class=""><a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/icon/equipment-icon.png">equipment</a></li>
                            <li class=""><a href="#">


                                    <?php echo get_template_directory_uri();?>/assets/images/icon/hall-rental-icon.png">Hall rental</a>
                            </li>
                            <li class=""><a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/icon/ticket-icon.png">ticket</a></li>
                            <li class=""><a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/icon/contact-icon.png">Contact</a></li>
                            <li class=""><a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/icon/access-icon.png">access</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <hr class="header-line"/>
        </div>
    </section>
    <!--header ends-->