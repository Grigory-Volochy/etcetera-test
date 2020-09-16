<?php
/**
 * Theme Functions
 */


/* ---------------------------------------------------------------------*/
/* ----------------------------- INCLUDES  -----------------------------*/
/* ---------------------------------------------------------------------*/
require_once get_stylesheet_directory() . '/utils/html-helpers.php';
/* ---------------------------------------------------------------------*/
/* ---------------------------------------------------------------------*/



/* ---------------------------------------------------------------------*/
/* -------------------- ENQUEUE SCRIPTS AND STYLES  --------------------*/
/* ---------------------------------------------------------------------*/
add_action( 'wp_enqueue_scripts', 'wpbs_child_enqueue_styles' );
function wpbs_child_enqueue_styles(){

    // CSS
    wp_enqueue_style(
        'wpbs-child-styles',
        get_stylesheet_directory_uri() . '/static/css/theme.min.css',
        array(
            'wp-bootstrap-starter-bootstrap-css',
            'wp-bootstrap-starter-fontawesome-cdn',
            'wp-bootstrap-starter-style'
        ),
        wp_get_theme()->get('Version')
    );

    // JS
    wp_enqueue_script(
        'wpbs-child-scripts',
        get_stylesheet_directory_uri() . '/static/js/theme.min.js',
        array(
            'jquery'
        ),
        wp_get_theme()->get('Version')
    );
}
/* ---------------------------------------------------------------------*/
/* ---------------------------------------------------------------------*/



/* ---------------------------------------------------------------------*/
/* ------------------------------- MENUS  ------------------------------*/
/* ---------------------------------------------------------------------*/
function wpbs_child_register_menus(){

    register_nav_menus(
        array(
            'sidebar-menu' => __( 'Sidebar Menu' )
        )
    );
}
add_action( 'init', 'wpbs_child_register_menus' );
/* ---------------------------------------------------------------------*/
/* ---------------------------------------------------------------------*/



/* ---------------------------------------------------------------------*/
/* ------------------------------ WIDGETS  -----------------------------*/
/* ---------------------------------------------------------------------*/
function wpbs_child_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home top content',
		'id'            => 'home_top_content_1',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

}
add_action( 'widgets_init', 'wpbs_child_widgets_init' );
/* ---------------------------------------------------------------------*/
/* ---------------------------------------------------------------------*/