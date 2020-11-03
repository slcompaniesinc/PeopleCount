<?php

/**
 * load in the main style.css into the header
 * @return void
 */
add_action( 'wp_enqueue_scripts', 'load_main_style' );
function load_main_style(){
	wp_enqueue_style( 'style', get_stylesheet_uri());
}


add_action( 'wp_enqueue_scripts', 'load_test_stylesheet' );

/**
 * load in the stylesheets conditionally for a page template
 * @return void
 */
function load_test_stylesheet(){
	// finds the page with the slug 'dashboard'
	if( is_page( 'dashboard' ) ){
		wp_enqueue_style( 'font_awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
		wp_enqueue_style( 'peoplecountdashboard', get_stylesheet_directory(). '/css/dashboard.css' );
	}
}


?>