<?php
if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
    require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
    require_once dirname( __FILE__ ) . '/cmb2/init.php';
}
if ( file_exists( dirname( __FILE__ ) . '/eventcpt.php' ) ) {
    require_once dirname(__FILE__) . '/eventcpt.php';
}

if ( file_exists( dirname( __FILE__ ) . '/metaboxes.php' ) ) {
    require_once dirname( __FILE__ ) . '/metaboxes.php';
}
if ( file_exists( dirname( __FILE__ ) . '/widgets.php' ) ) {
    require_once dirname( __FILE__ ) . '/widgets.php';
}
/*==========================================================
Activate ReduxFramework Admin Panel
==========================================================*/
// Include the Redux theme options Framework
if ( !class_exists( 'ReduxFramework' ) ) {
    require_once( dirname( __FILE__ ) . '/redux-framework/ReduxCore/framework.php' );
}
// Tweak the Redux framework, Register all the theme options, Registers the wpex_option function
//if ( !isset( $redux_demo ) ) {
//    require_once( dirname( __FILE__ ) . '/redux-framework/sample/sample-config.php' );
//}
if ( !isset( $redux_demo ) ) {
    require_once( dirname( __FILE__ ) . '/redux-option-config.php' );
}


