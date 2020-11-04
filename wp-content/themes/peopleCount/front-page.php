<?php
/**
 * Template Name: Login
 */
?>
<?
// eventually, change this to be on its own login template then, create a frontpage for this
session_start();
wp_head();
include get_template_directory().'/API/Utility.php';


$loginInfo = array(
	'redirect' => home_url( '/ppcdashboard/' ),
	'form_id'        => 'loginform',
    'label_username' => __( 'Username or Email Address' ),
    'label_password' => __( 'Password' ),
    'label_remember' => __( 'Remember Me' ),
    'label_log_in'   => __( 'Log In' ),
    'id_username'    => 'user_login',
    'id_password'    => 'user_pass',
    'id_remember'    => 'rememberme',
    'id_submit'      => 'wp-submit',
    'remember'       => true,
    'value_username' => '',
    // Set 'value_remember' to true to default the "Remember me" checkbox to checked.
    'value_remember' => false,
);

wp_login_form($loginInfo);



