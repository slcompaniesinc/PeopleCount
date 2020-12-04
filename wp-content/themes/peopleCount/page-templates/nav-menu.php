<? /* Template Name: Navigation Menu Template */ 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body class="fixed-header menu-pin menu-behind">

	<!-- BEGIN SIDEBAR -->
	<!-- BEGIN SIDEBPANEL-->
	<nav class="page-sidebar" data-pages="sidebar">
		<!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
		<div class="sidebar-overlay-slide from-top" id="appMenu"> </div>
		<!-- END SIDEBAR MENU TOP TRAY CONTENT-->
		<!-- BEGIN SIDEBAR MENU HEADER-->
		<div class="sidebar-header"> <img src="<?php echo get_template_directory_uri().'/assets/img/logo_white.png'?>" alt="logo" class="brand" data-src="<?php echo get_template_directory_uri().'/assets/img/logo_white.png'?>" data-src-retina="https://final.peoplecount.work/public_html/wp-content/themes/peopleCount/img/logo_white_2x.png" width="78" height="22">
			<div class="sidebar-header-controls">
				<button aria-label="Toggle Drawer" type="button" class="btn btn-icon-link invert sidebar-slide-toggle m-l-20 m-r-10" data-pages-toggle="#appMenu"> <i class="pg-icon">chevron_down</i> </button>
				<button aria-label="Pin Menu" type="button" class="btn btn-icon-link invert d-lg-inline-block d-xlg-inline-block d-md-inline-block d-sm-none d-none" data-toggle-pin="sidebar"> <i class="pg-icon"></i> </button>
			</div>
		</div>
		<!-- END SIDEBAR MENU HEADER-->
		<!-- START SIDEBAR MENU -->
		<div class="sidebar-menu">
			<!-- BEGIN SIDEBAR MENU ITEMS-->
			<? 

			wp_nav_menu(
				array(
					'theme_location' => 'site-menu',
					'menu_class' => 'menu-items'
				)
			);

			?>
			<div class="clearfix"></div>
		</div>
		<!-- END SIDEBAR MENU -->
	</nav>

</body>
</html>

