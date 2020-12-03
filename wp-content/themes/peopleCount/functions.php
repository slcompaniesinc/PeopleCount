<?php

/**
 * load in the main style.css into the header
 * @return void
 */
add_action( 'wp_enqueue_scripts', 'load_main_style' );
function load_main_style(){
	wp_enqueue_style( 'style', get_stylesheet_uri());
	wp_enqueue_script( 'jquery', '/wp-includes/js/jquery/jquery.js', array(), false, true );
	wp_enqueue_script( 'font-awesome-js', 'https://kit.fontawesome.com/1dd995f5b5.js', array(), false, true );
	wp_enqueue_style( 'corporate', get_template_directory_uri().'/pages/css/themes/corporate.css' );
	wp_enqueue_style( 'select2', get_template_directory_uri().'/assets/plugins/select2/css/select2.min.css' );
	wp_enqueue_style( 'fontAwesome', get_template_directory_uri().'/assets/plugins/font-awesome/css/font-awesome.css' );
	wp_enqueue_style( 'bootstrap-external',get_template_directory_uri().'/assets/plugins/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'font_awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), false, true);
}


add_action( 'wp_enqueue_scripts', 'load_ppcdashboard_styles' );

/**
 * load in the stylesheets conditionally for a page template
 * @return void
 */
function load_ppcdashboard_styles(){
	// finds the page with the slug 'dashboard'
	if( is_page( 'ppcdashboard' ) ){
		wp_enqueue_script( 'ppcdashboardjs', get_template_directory_uri().'/js/ppcdashboard.js', array(), false, true);
		wp_enqueue_style( 'peoplecountdashboard',get_template_directory_uri().'/css/dashboard.css' );
		
		//wp_enqueue_script( '' , get_template_directory_uri().'' );
		
	}
	// add condition for the workflow board
}

// adding custom roles
add_role(
	'recruiter',
	__('Recruiter'),
	array(
		'create_users' => false,
		'edit_users' => false
	)
);

//blocking non-admin from the wordpresss dashboard
add_action( 'init', 'blockusers_init' ); function blockusers_init() { if ( is_admin() && ! current_user_can( 'administrator' ) && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) { wp_redirect( home_url() ); exit; } } 

//registering the navigation menu

add_action( 'init', 'register_navigation');
function register_navigation(){
	register_nav_menu('site-menu', __('Site Menu'));
}

?>
