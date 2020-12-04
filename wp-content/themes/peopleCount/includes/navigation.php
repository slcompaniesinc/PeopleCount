<?
include_once( $_SERVER['DOCUMENT_ROOT'].'/wp-load.php' );

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body class="fixed-header menu-pin menu-behind">
		<nav>
			<? 

			wp_nav_menu(
				array(
					'theme_location' => 'site-menu',
					'menu_class' => 'menu-items'
				)
			);

			?>
		</nav>

</body>
</html>

