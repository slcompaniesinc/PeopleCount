<?php /* Template Name: Dashboard Template */

wp_head();

include_once get_template_directory().'/API/Employer.php';
include_once get_template_directory().'/API/Utility.php';

// user object which holds all the user info
$current_user = wp_get_current_user();
//database connection
$mysqli = new mysqli( 'localhost', 'finalpeo_wp763' , 'Sp)s7o5J1.' , 'finalpeo_wp763' );
$username = $current_user->user_login;
$employer_id = $current_user->id;


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
	<meta content="" name="description" />
	<meta content="" name="author" />
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta charset="utf-8" />
	<title>People Count</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
</head>
<body class="fixed-header menu-pin menu-behind">
	<!--HEADER-->
	<?  include_once( get_template_directory_uri(). '/includes/menuheader.php' );?>
	<!--END HEADER-->
	<div id="main">
		<nav id="ppc-sidebar">
			<? 

			wp_nav_menu(
				array(
					'theme_location' => 'site-menu',
					'menu_class' => 'menu-items'
				)
			);

			?>
		</nav>
		<article>
			<!-- FIRST ROW OF WIDGETS --> 
			<div class="page-content-row">
				
						
			<!-- END FIRST ROW OF WIDGETS -->
		</article>
	</div>

	<!-- FOOTER BEGIN -->
	<? include_once(  get_template_directory_uri(). '/includes/ppc-footer.php' ); ?>
<?wp_footer( );?>
</body>
</html>