<!--footer starts-->
<section class="footer">
    <div class="container custom-container">
        <div class="row">
            <div class="col-md-12">
                <div class="instagram">
                    <div class="instapadding">
                        <ul class="instagram-list">
                            <li>
                                <div class="instagram-images">
                                    <img class="img-responsive"
                                         src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram-image.jpg"
                                         alt="">
                                </div>
                            </li>
                            <li>
                                <div class="instagram-images">
                                    <img class="img-responsive"
                                         src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram-image.jpg"
                                         alt="">
                                </div>
                            </li>
                            <li>
                                <div class="instagram-images">
                                    <img class="img-responsive"
                                         src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram-image.jpg"
                                         alt="">
                                </div>
                            </li>
                            <li>
                                <div class="instagram-images">
                                    <img class="img-responsive"
                                         src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram-image.jpg"
                                         alt="">
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="showallinstagrambar">
                        <button type="button" class="btn btn-primary">
                            <a href=""><span class="fa fa-instagram"></span> View on Instagram</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--map starts-->
    <section class="map">
        <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
        <div style='overflow:hidden;height:300px;width:100%;'>
            <div id='gmap_canvas' style='height:300px;width:100%;'>
            </div>
            <div>
                <small>
                    <a href="http://embedgooglemaps.com">
                        embed google maps
                    </a>
                </small>
            </div>
            <div>
                <small>
                    <a href="https://disclaimergenerator.net">disclaimer generator</a>
                </small>
            </div>
            <style>#gmap_canvas img {
                    max-width: none !important;
                    background: none !important
                }</style>
        </div>
        <script type='text/javascript'>function init_map() {
                var myOptions = {
                    zoom: 5,
                    center: new google.maps.LatLng(51.402522959911764, -0.3454249259765474),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
                marker = new google.maps.Marker({
                    map: map,
                    position: new google.maps.LatLng(51.402522959911764, -0.3454249259765474)
                });
                infowindow = new google.maps.InfoWindow({content: '<strong>Title</strong><br>London, United Kingdom<br>'});
                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.open(map, marker);
                });
                infowindow.open(map, marker);
            }
            google.maps.event.addDomListener(window, 'load', init_map);</script>
    </section><!--map ends-->
    <!--social widget starts-->
    <section class="social-widget">
        <div class="container custom-container">
            <div class="social-app">
                <ul class="social-link">
                    <?php
                    global $redux_demo;
//                    print_r($redux_demo);
                    $facebook = !empty($redux_demo['opt-facebook-link']) ? $redux_demo['opt-facebook-link'] : 'https://facebook.com';
                    $twitter = !empty($redux_demo['opt-twitter-link']) ? $redux_demo['opt-twitter-link'] : 'https://twitter.com';
                    $instagram = !empty($redux_demo['opt-instagram-link']) ? $redux_demo['opt-instagram-link'] : 'https://instagram.com';
                    $artistRecruit = !empty($redux_demo['artist-recruit-link']) ? $redux_demo['artist-recruit-link'] : '';
                    $staffRecruit = !empty($redux_demo['staff-recruit-link']) ? $redux_demo['staff-recruit-link'] : '';
                    $contactPage = !empty($redux_demo['contact-page']) ? $redux_demo['contact-page'] : '';
                    $informationPage = !empty($redux_demo['information-page']) ? $redux_demo['information-page'] : '';
                    ?>
                    <li class="artist-recruit"><a target="_blank" href="<?php echo esc_html($artistRecruit); ?>">Artist
                            Recruit</a></li>
                    <li class="staff-recruit"><a target="_blank" href="<?php echo esc_html($staffRecruit); ?>">Staff
                            Recruit</a></li>
                    <li class="social-bg facebook"><a target="_blank" href="<?php echo esc_html($facebook); ?>"><i
                                class="fa fa-facebook"></i> Facebook</a></li>
                    <li class="social-bg twitter"><a target="_blank" href="<?php echo esc_html($twitter); ?>"><i
                                class="fa fa-twitter"></i> Twitter</a></li>
                    <li class="social-bg instagram"><a target="_blank" href="<?php echo esc_html($instagram); ?>"><i
                                class="fa fa-instagram"></i> Instagram</a></li>
                </ul>
                <ul class="extra-link">
                    <li class="contact"><a target="_blank" href="<?php echo esc_html($contactPage); ?>">Contact</a></li>
                    <li class="information"><a target="_blank" href="<?php echo esc_html($informationPage); ?>">Information</a>
                    </li>
                </ul>
            </div>
        </div>
    </section><!--social widget ends-->
    <section class="footer-link">
        <div class="container custom-container">
            <div class="row">
                <?php
                if (function_exists('wp_nav_menu')) {
                    wp_nav_menu(array(
                            'menu' => 'footer_links',
                            'theme_location' => 'footer_links',
                            'menu_id' => 'dropmenu',
                            'menu_class' => '',
                            'link_before' => '<i class="fa fa-angle-right"></i> ',
                            'fallback_cb' => ''
                        )
                    );
                }
                ?>
                <div class="scrolltotopcontainer">
                    <a href="#" class="hide-in-mobile scrollToTop"><i class="fa fa-angle-up"></i> </a>
                </div>
            </div>
        </div>
    </section>
    <section class="footer-nav">
        <div class="container custom-container">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="logo">
                        <a href="<?php bloginfo('url'); ?>">
                            <?php if (!empty($redux_demo['footer_logo']['url']))
                                $footerLogo = $redux_demo['footer_logo']['url'];
                            else
                                $footerLogo = get_template_directory_uri() . '/assets/images/logo-footer.png';
                            ?>
                            <img class="img-responsive" src="<?php echo esc_html($footerLogo); ?>" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="menu">
                        <?php
                        if (function_exists('wp_nav_menu')) {
                            wp_nav_menu(array(
                                    'menu' => 'footer',
                                    'theme_location' => 'footer',
                                    'menu_id' => 'dropmenu',
                                    'menu_class' => 'footer-navbar',
                                    'fallback_cb' => 'wpj_default_menu'
                                )
                            );
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="footer-bar">
        <div class="container custom-container">
            <div class="copy-right">
                <p class="fa fa-copyright"><?php global $redux_demo;
                    echo $redux_demo['copy-right']; ?></p>
            </div>
        </div>
    </section>
</section><!--footer ends-->
</div><!--wrapper ends-->
<script>
    jQuery(function () {
        jQuery(function () {
            jQuery.scrollUp({
                scrollName: 'scrollUp',      // Element ID
                scrollDistance: 300,         // Distance from top/bottom before showing element (px)
                scrollFrom: 'top',           // 'top' or 'bottom'
                scrollSpeed: 300,            // Speed back to top (ms)
                easingType: 'linear',        // Scroll to top easing (see http://easings.net/)
                animation: 'fade',           // Fade, slide, none
                animationSpeed: 200,         // Animation speed (ms)
                scrollTrigger: false,        // Set a custom triggering element. Can be an HTML string or jQuery object
                scrollTarget: false,         // Set a custom target element for scrolling to. Can be element or number
                scrollText: '<i class="fa fa-angle-up">', // Text for element, can contain HTML
                scrollTitle: false,          // Set a custom <a> title if required.
                scrollImg: false,            // Set true to use image
                activeOverlay: false,        // Set CSS color to display scrollUp active point, e.g '#00FFFF'
                zIndex: 2147483647           // Z-Index for the overlay
            });
        });
    });
</script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function (b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function () {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = 'https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');
</script>
<?php wp_footer(); ?>
</body>
</html>
