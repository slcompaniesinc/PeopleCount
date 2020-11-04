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
	if( is_page( 'ppcdashboard' ) ){
		wp_enqueue_style( 'font_awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
		wp_enqueue_style( 'peoplecountdashboard',get_template_directory_uri().'/dashboard.css' );
		wp_enqueue_script( 'font-awesome-js', 'https://kit.fontawesome.com/1dd995f5b5.js' );
		wp_enqueue_style( 'corporate', get_template_directory_uri().'/pages/css/themes/corporate.css' );
		wp_enqueue_style( 'select2', get_template_directory_uri().'/assets/plugins/select2/css/select2.min.css' );
		wp_enqueue_style( 'jquery-scrollbar', get_template_directory_uri().'/assets/plugins/jquery-scrollbar/jquery.scrollbar.css' );
		wp_enqueue_style( 'fontAwesome', get_template_directory_uri().'/assets/plugins/font-awesome/css/font-awesome.css' );
		wp_enqueue_style( 'pace-theme-flash', get_template_directory_uri().'/assets/plugins/pace/pace-theme-flash.css' );
		wp_enqueue_style( 'bootstrap-external',get_template_directory_uri().'/assets/plugins/bootstrap/css/bootstrap.min.css' );


	}
}


?>
