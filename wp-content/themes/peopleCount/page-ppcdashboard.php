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

$checkuserSql = 'SELECT * FROM wp4s_applied_associates';
$result = $mysqli->query($checkuserSql);
?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta charset="utf-8" />
	<title>People Count</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="apple-touch-icon" href="https://final.peoplecount.work/public_html/wp-content/themes/peopleCount/pages/ico/60.png">
	<link rel="apple-touch-icon" sizes="76x76" href="https://final.peoplecount.work/public_html/wp-content/themes/peopleCount/pages/ico/76.png">
	<link rel="apple-touch-icon" sizes="120x120" href="https://final.peoplecount.work/public_html/wp-content/themes/peopleCount/pages/ico/120.png">
	<link rel="apple-touch-icon" sizes="152x152" href="https://final.peoplecount.work/public_html/wp-content/themes/peopleCount/pages/ico/152.png">
	
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
	<meta content="" name="description" />
	<meta content="" name="author" />
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
	<!-- END SIDEBAR -->
	<!-- END SIDEBAR -->
	<!-- START PAGE-CONTAINER -->
	<div class="page-container">
		<!-- START PAGE HEADER WRAPPER -->
		<!-- START MODAL -->
		<div id="myModal" class="modalContainer hideElement" >

				  <!-- Modal content -->
				  <div class="modal-cont" id="modal-div" >
				    <span class="closebutton" id="close">×</span>
				     <div id="content-modal" style="position: relative; ">

				     	<!-- START CLIENT UPLOAD FORM -->
				     	<div id="upload-container" style="display: none;"> 
				     		<h1 id="uploads-header"> </h1>
				     		<ul id="upload-form" class="wrapper">
				     			<li class="upload-row">
				     				<label for="client-name">
				     					Name
				     				</label>
				     				<select name="client-name" id="client-name">
									  <option value="volvo">Volvo</option>
									</select>

				     			</li>

				     			<li class="upload-row">
				     				<label for="client-email">
				     					Email
				     				</label>
				     				<select name="client-email" id="client-email">
									  <option value="volvo">Volvo</option>
									</select>

				     			</li>
				     			<li class="upload-row">
				     				<label for="client-phone">
				     					Phone
				     				</label>
				     				<select name="client-phone" id="client-phone">
									  <option value="volvo">Volvo</option>
									</select>

				     			</li>
				     			<li class="upload-row">
				     				<label for="client-address">
				     					Address
				     				</label>
				     				<select name="client-address" id="client-address">
									  <option value="volvo">Volvo</option>
									</select>

				     			</li>
				     			<li class="upload-row">
				     			
				     			</li>


				     		</ul>


				     	</div>
				     	<!-- END CLIENT UPLOAD FORM -->
								     	<!-- START TABLE -->
						<div class ="content-container" id="container_table"> 
						  <h1 class="table-header" id="main-header"></h1>

						 <div class="table-header">
						 	<table>
						 		<thead>
						 			<tr>
						 				<th id="first-header" class="table-header"></th>
						 				<th id="name-header" class="table-header">Name</th>
						 				<th id="date-header" class="table-header"></th>
						 			</tr>
						 		</thead>
						 	</table>
						 </div>
						 <div class="table-content spaceholder">
						 	<table id="applied_table" cellpadding="0" cellspacing="0" border="0">
						 		<tbody id="t_body">
						 			<!-- just need to manually make rows and checkboxes -->
						 		</tbody>
						 	</table>
						 </div>

						</div>
						<!-- END TABLE -->

						<!--START WORKFLOW FORM -->
						<div id="workflow-container" style="display: none;">
							<div>
							<h1 class="table-header moveleft" id="workflow-header">Applicant</h1>
							<div style="text-align:center;width: 100%;">
								<!-- New Applicants Approval Form -->
								<ul class="noBullets" id="workflow-list">
									<li id="submitter"><span>Submitted by: </span><span></span> </li>
									<li id="submitdate"><span>Submitted at: </span><span></span> </li>
									<li id="status"><span>Status: </span><span></span></li>
									<li id="notes">Note</li>
									<li><textarea id="workflow-text" style="width: 275px;height: 125px;"></textarea></li>
								</ul>
								<div id="workflow-buttons" class="content-container noBullets">
				     			<button id="approvebutton">
				     				<span><i class="fas fa-check"></i></span>APPROVE
				     			</button>
				     			<button id="denyButton">
				     				<span><i class="fas fa-window-close"></i></span> DECLINE
				     			</button>
				     			
				     		</div>
				     		<div id="wrkfl-active-buttons" class="content-container noBullets" style="display: none;">
				     			<button id="wrkfl-submit-active">
				     				SUBMIT
				     			</button>
				     			<button id="wrkfl-cancel-active">
				     				CANCEL
				     			</button>
				     		</div>
				     		
								 <!-- End New Applicants Approval Form -->




								
				     		
							</div>
						</div>
						</div>
						

						<!-- END WORKFLOW FORM -->
				     		
				    </div>
				    <div id="content-modaltwo">
				    	<div id="modal-buttons">
				     			<button id="selectall">
				     				SELECT ALL
				     			</button>
				     			<button id="editButton">
				     				EDIT
				     			</button>
				     			<button id="delete">
				     				DELETE
				     			</button>
				     		</div>

				     		
				    </div>
				</div>
				  </div>
				 
		<!-- END MODAL -->	

		
		<!-- START HEADER -->
		<div class="header ">
			<!-- START MOBILE SIDEBAR TOGGLE --><a href="#" class="btn-link toggle-sidebar d-lg-none pg-icon btn-icon-link" data-toggle="sidebar">
				menu</a>
			<!-- END MOBILE SIDEBAR TOGGLE -->
			<div class="">
				<div class="brand inline  m-l-10 "> <img src="<?php echo get_template_directory_uri().'/images/peoplecount.png'?>" style="width: 120px; height: 50px;"> </div>
				<!-- START NOTIFICATION LIST -->
				<ul class="d-lg-inline-block d-none notification-list no-margin d-lg-inline-block b-grey b-l b-r no-style p-l-20 p-r-20">
					<li class="p-r-5 inline">
						<div class="dropdown">
							<a href="javascript:;" id="notification-center" class="header-icon  btn-icon-link" data-toggle="dropdown"> <i class="pg-icon">world</i> <span class="bubble"></span> </a>
							<!-- START Notification Dropdown -->
							<div class="dropdown-menu notification-toggle" role="menu" aria-labelledby="notification-center">
								<!-- START Notification -->
								<div class="notification-panel">
									<!-- START Notification Body-->
									<div class="notification-body scrollable">
										<!-- START Notification Item-->
										<div class="notification-item unread clearfix">
											<!-- START Notification Item-->
											<div class="heading open">
												<a href="#" class="text-complete pull-left d-flex align-items-center"> <i class="pg-icon m-r-10">map</i> <span class="bold">Carrot Design</span> <span class="fs-12 m-l-10">David Nester</span> </a>
												<div class="pull-right">
													<div class="thumbnail-wrapper d16 circular inline m-t-15 m-r-10 toggle-more-details">
														<div><i class="pg-icon">chevron_down</i> </div>
													</div> <span class=" time">few sec ago</span> </div>
												<div class="more-details">
													<div class="more-details-inner">
														<h5 class="semi-bold fs-16">“Apple’s Motivation - Innovation <br>
															distinguishes between <br>
															A leader and a follower.”</h5>
														<p class="small hint-text"> Commented on john Smiths wall.
															<br> via pages framework. </p>
													</div>
												</div>
											</div>
											<!-- END Notification Item-->
											<!-- START Notification Item Right Side-->
											<div class="option" data-toggle="tooltip" data-placement="left" title="mark as read">
												<a href="#" class="mark"></a>
											</div>
											<!-- END Notification Item Right Side-->
										</div>
										<!-- START Notification Body-->
										<!-- START Notification Item-->
										<div class="notification-item  clearfix">
											<div class="heading">
												<a href="#" class="text-danger pull-left"> <i class="pg-icon m-r-10">alert_warning</i> <span class="bold">98% Server Load</span> <span class="fs-12 m-l-10">Take Action</span> </a> <span class="pull-right time">2 mins ago</span> </div>
											<!-- START Notification Item Right Side-->
											<div class="option">
												<a href="#" class="mark"></a>
											</div>
											<!-- END Notification Item Right Side-->
										</div>
										<!-- END Notification Item-->
										<!-- START Notification Item-->
										<div class="notification-item  clearfix">
											<div class="heading">
												<a href="#" class="text-warning pull-left"> <i class="pg-icon m-r-10">alert_warning</i> <span class="bold">Warning Notification</span> <span class="fs-12 m-l-10">Buy Now</span> </a> <span class="pull-right time">yesterday</span> </div>
											<!-- START Notification Item Right Side-->
											<div class="option">
												<a href="#" class="mark"></a>
											</div>
											<!-- END Notification Item Right Side-->
										</div>
										<!-- END Notification Item-->
										<!-- START Notification Item-->
										<div class="notification-item unread clearfix">
											<div class="heading">
												<div class="thumbnail-wrapper d24 circular b-white m-r-5 b-a b-white m-t-10 m-r-10"> <img width="30" height="30" data-src-retina="<?php echo get_template_directory_uri().'/assets/img/profiles/1x.jpg'?>" data-src="<?php echo get_template_directory_uri().'/assets/img/profiles/1.jpg'?>" alt="" src="<?php echo get_template_directory_uri().'/assets/img/profiles/1.jpg'?>"> </div>
												<a href="#" class="text-complete pull-left"> <span class="bold">Revox Design Labs</span> <span class="fs-12 m-l-10">Owners</span> </a> <span class="pull-right time">11:00pm</span> </div>
											<!-- START Notification Item Right Side-->
											<div class="option" data-toggle="tooltip" data-placement="left" title="mark as read">
												<a href="#" class="mark"></a>
											</div>
											<!-- END Notification Item Right Side-->
										</div>
										<!-- END Notification Item-->
									</div>
									<!-- END Notification Body-->
									<!-- START Notification Footer-->
									<div class="notification-footer text-center"> <a href="#" class="">Read all notifications</a>
										<a data-toggle="refresh" class="portlet-refresh text-black pull-right" href="#"> <i class="pg-refresh_new"></i> </a>
									</div>
									<!-- START Notification Footer-->
								</div>
								<!-- END Notification -->
							</div>
							<!-- END Notification Dropdown -->
						</div>
					</li>
					<li class="p-r-5 inline">
						<a href="#" class="header-icon  btn-icon-link"> <i class="pg-icon">link_alt</i> </a>
					</li>
					<li class="p-r-5 inline">
						<a href="#" class="header-icon  btn-icon-link"> <i class="pg-icon">grid_alt</i> </a>
					</li>
				</ul>
				<!-- END NOTIFICATIONS LIST --><a href="#" class="search-link d-lg-inline-block d-none" data-toggle="search"><i class="pg-icon">search</i>Type
					anywhere to <span class="bold">search</span></a> </div>
			<div class="d-flex align-items-center">
				<!-- START User Info-->
				<div class="dropdown pull-right d-lg-block d-none">
					<button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="profile dropdown"> <span class="thumbnail-wrapper d32 circular inline">
							<img src="<?php echo get_template_directory_uri().'/assets/img/profiles/avatar.jpg'?>" alt="" data-src="<?php echo get_template_directory_uri().'/assets/img/profiles/avatar.jpg'?>"
								data-src-retina="<?php echo get_template_directory_uri().'/assets/img/profiles/avatar_small2x.jpg'?>" width="32" height="32">
						</span> </button>
					<div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu"> <a href="#" class="dropdown-item"><span>Signed in as <br /><b>David Aunsberg</b></span></a>
						<div class="dropdown-divider"></div> <a href="#" class="dropdown-item">Your Profile</a> <a href="#" class="dropdown-item">Your Activity</a> <a href="#" class="dropdown-item">Your Archive</a>
						<div class="dropdown-divider"></div> <a href="#" class="dropdown-item">Features</a> <a href="#" class="dropdown-item">Help</a> <a href="#" class="dropdown-item">Settings</a> <a href="#" class="dropdown-item">Logout</a>
						<div class="dropdown-divider"></div> <span class="dropdown-item fs-12 hint-text">Last edited by David<br />on Friday at 5:27PM</span> </div>
				</div>
				<!-- END User Info-->
				<a href="#" class="header-icon m-l-5 sm-no-margin d-inline-block" data-toggle="quickview" data-toggle-element="#quickview"> <i class="pg-icon btn-icon-link">menu_add</i> </a>
			</div>
		</div>
		<!-- END HEADER -->
		<!-- END PAGE HEADER WRAPPER -->
		<!-- START PAGE CONTENT WRAPPER -->
		<div class="page-content-wrapper">
			<!-- START PAGE CONTENT -->
			<div class="content">
				
				<!-- START JUMBOTRON -->
				<div style="padding: 2rem 1rem;">
					<?php

						echo "Welcome, ".$current_user->display_name. "!";
					?>
				</div>
				<!-- END JUMBOTRON -->
				<!-- START CONTAINER FLUID -->
				<div class="container-fluid container-fixed-lg">
					<!-- BEGIN PlACE PAGE CONTENT HERE -->
					<!--start first row of widgets-->
					
					<div class="row">
						<!--first column of cards-->
						<div class="col-lg-4 col-xl-3 col-xlg-2 margins">
							<!--Start Card-->
							<div class="row">
								<div class="col-md-12 m-b-10">
									<div class="widget-8 card  bg-warning no-margin widget-loader-bar">
										<div class="container-xs-height full-height" id="companiescontainer">
											<div class="row-xs-height">
												<div class="col-xs-height col-top">
													<div class="card-header  top-left top-right">
														<div class="card-title"> <span class="font-montserrat fs-11 all-caps">New Applicants</span> </div>
														<div class="card-controls">
															<ul>
																<li> <button id="newappsButton" class="companiesButton button-height">View</button>
																 </li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											<div class="row-xs-height ">
												<div class="col-xs-height col-top relative">
													<div class="row full-height">
														<div class="col-sm-6">
															<div class="p-l-20 full-height d-flex flex-column justify-content-between" id="checkboxdiv">
																<h3 class="no-margin p-b-5">

																	<?php 
																		

																		if($newApps = $mysqli->query("SELECT DISTINCT userName FROM wp4s_applied_associates")) {
																			 $count = $newApps->num_rows; 
																			 echo $count;
																		}
																		
																		?>
																	
																</h3>
																<p class="small m-t-5 m-b-20"> <span class="label label-white hint-text font-montserrat m-r-5">60%</span><span class="fs-12">Higher</span> </p>
															</div>
														</div>
														<div class="col-sm-6"></div>
													</div>
													<div class="widget-8-chart line-chart" data-line-color="white" data-points="true" data-point-color="warning" data-stroke-width="2"> </div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--End Card Here-->

							<!--Start Card Here-->
							<div class="row">
								<div class="col-lg-12 m-b-10">
									<div class="widget-9 card  bg-success no-margin widget-loader-bar">
										<div class="full-height d-flex flex-column">
											<div class="card-header ">
												<div class="card-title"> <span class="font-montserrat fs-11 all-caps">Job Orders </span> </div>
												<div class="card-controls">
													<ul>
														<li> <button id="jobOrderButton" class="companiesButton button-height" >View</button></li>
													</ul>
												</div>
											</div>
											<div class="p-l-20">
												<h3 class="no-margin p-b-5">5</h3> <span class="d-flex align-items-center">
							<i class="pg-icon m-r-5">arrow_down</i>
							<span class="small hint-text">65% lower than last month</span> </span>
											</div>
											<div class="mt-auto">
												<div class="progress progress-small m-b-20">
													<div class="progress-bar progress-bar-white" style="width:45%"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--End Card Here -->
							<div class="row">
								<div class="col-lg-12 md-m-b-10 sm-p-b-10">
									<div class="widget-10 card  bg-white no-margin widget-loader-bar">
										<div class="card-header  top-left top-right ">
											<div class="card-title text-black hint-text"> <span class="font-montserrat fs-11 all-caps">Inactive Associates </span> </div>
											<div class="card-controls">
												<ul>
													<li><button id="inactiveButton" class="companiesButton button-height" >View</button></li>
												</ul>
											</div>
										</div>
										<div class="card-body p-t-40">
											<div class="row">
												<div class="col-sm-12">
													<h4 class="no-margin p-b-5 text-danger semi-bold">
													<?php 
														$checkuserSql = 'SELECT * FROM wp4s_inactive_associates';
														$result = $mysqli->query($checkuserSql);    
														echo $result->num_rows;
													?>
													</h4>
													<div class="d-flex align-items-center pull-left small"> <span>WMHC</span> <span class=" text-success"> <i class="pg-icon m-l-10">arrow_up</i> </span> <span class="text-success font-montserrat"> 21% </span> </div>
													<div class="d-flex align-items-center pull-left m-l-20 small"> <span>HCRS</span> <span class="text-danger"><i class="pg-icon m-l-10">arrow_down</i> </span> <span class="text-danger font-montserrat"> 21% </span> </div>
													<div class="clearfix"></div>
												</div>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</div>
							<!--End First Column-->

							<!-- Second Column --> 

						    <!-- End Second Column --> 

						
						<div class="col-lg-4 col-xl-3 col-xlg-2">
							<div class="row">
								<div class="col-md-12 m-b-10">
									<div class="widget-8 card  bg-warning no-margin widget-loader-bar">
										<div class="container-xs-height full-height">
											<div class="row-xs-height">
												<div class="col-xs-height col-top">
													<div class="card-header  top-left top-right">
														<div class="card-title"> <span class="font-montserrat fs-11 all-caps">Active Associates </span> </div>
														<div class="card-controls">
															<ul>
																<li> <button id="activeButton" class="companiesButton button-height" >View</button></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											<div class="row-xs-height ">
												<div class="col-xs-height col-top relative">
													<div class="row full-height">
														<div class="col-sm-6">
															<div class="p-l-20 full-height d-flex flex-column justify-content-between">
																<h3 class="no-margin p-b-5">
																	<?php 
																		$checkuserSql = 'SELECT * FROM wp4s_active_associates';
																		$result = $mysqli->query($checkuserSql);    
																		echo $result->num_rows;
																	?>
																</h3>
																<p class="small m-t-5 m-b-20"> <span class="label label-white hint-text font-montserrat m-r-5">60%</span><span class="fs-12">Higher</span> </p>
															</div>
														</div>
														<div class="col-sm-6"></div>
													</div>
													<div class="widget-8-chart line-chart" data-line-color="white" data-points="true" data-point-color="warning" data-stroke-width="2"> </div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--End Card Here-->

							<!--Start Card Here-->
							<div class="row">
								<div class="col-lg-12 m-b-10">
									<div class="widget-9 card  bg-success no-margin widget-loader-bar">
										<div class="full-height d-flex flex-column">
											<div class="card-header ">
												<div class="card-title"> <span class="font-montserrat fs-11 all-caps">Placed Associates</span> </div>
												<div class="card-controls">
													<ul>
														<li> <button id="placedButton" class="companiesButton button-height">View</button></li>
													</ul>
												</div>
											</div>
											<div class="p-l-20">
												<h3 class="no-margin p-b-5">
													<?php 
														$checkuserSql = 'SELECT * FROM wp4s_placed_associates';
														$result = $mysqli->query($checkuserSql);    
														echo $result->num_rows;
													?>
												</h3> <span class="d-flex align-items-center">
							<i class="pg-icon m-r-5">arrow_down</i>
							<span class="small hint-text">65% lower than last month</span> </span>
											</div>
											<div class="mt-auto">
												<div class="progress progress-small m-b-20">
													<div class="progress-bar progress-bar-white" style="width:45%"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--End Card Here -->
							<div class="row">
								<div class="col-lg-12 md-m-b-10 sm-p-b-10">
									<div class="widget-10 card  bg-white no-margin widget-loader-bar">
										<div class="card-header  top-left top-right ">
											<div class="card-title text-black hint-text"> <span class="font-montserrat fs-11 all-caps">Terminated Associates </span> </div>
											<div class="card-controls">
												<ul>
													<li><button id="terminatedButton" class="companiesButton button-height">View</button> </li>
												</ul>
											</div>
										</div>
										<div class="card-body p-t-40">
											<div class="row">
												<div class="col-sm-12">
													<h4 class="no-margin p-b-5 text-danger semi-bold">
														<?php 
															$checkuserSql = 'SELECT * FROM wp4s_terminated_associates';
															$result = $mysqli->query($checkuserSql);    
															echo $result->num_rows;
														?>
													</h4>
													<div class="d-flex align-items-center pull-left small"> <span>WMHC</span> <span class=" text-success"> <i class="pg-icon m-l-10">arrow_up</i> </span> <span class="text-success font-montserrat"> 21% </span> </div>
													<div class="d-flex align-items-center pull-left m-l-20 small"> <span>HCRS</span> <span class="text-danger"><i class="pg-icon m-l-10">arrow_down</i> </span> <span class="text-danger font-montserrat"> 21% </span> </div>
													<div class="clearfix"></div>
												</div>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						
						</div>

						<!-- Start Widget -->
						<div class="col-lg-6 hidden-lg  col-xlg-4 m-b-10" >

							<div class="widget-15 card no-margin  widget-loader-circle" style="height: 400px; overflow-y: auto;">
								
								<div class="card-header top-right ">
									<div class="card-controls">
										<ul>
											<li>
												<a href="#" class="card-refresh" data-toggle="refresh"><i class="card-icon card-icon-refresh"></i></a>
											</li>
										</ul>
									</div>
								</div>
								<div class="card-body no-padding" style="height:300px;">
									<table width="600">
										<h2>No Clients Listed.</h2>
										<h3>Import Spreadsheet Below</h3>
										

											<tr>
												<td width="20%">Select file</td>
												<td width="80%"><input type="file" name="file" id="file" /></td>
												</tr>

												<tr>
												<td>Submit</td>
												<td><button id="clients-submit">Submit</button></td>
											</tr>

										
									</table>
									
								</div>
							</div>

						</div>
						
					</div>
					<!-- end first row of widgets-->


					<div class="row m-b-10">
						<!-- Start Search Widget -->
						<div class="col-sm-5 col-lg-4 col-xlg-3 col-sm-height col-top no-padding card">
<div class="card-header  ">
<div class="card-title">Search Available Jobs By:
</div>
</div>
<div class="card-body">
<ul class="nav nav-pills m-t-10 m-b-15" role="tablist">
<li class="active">
<a href="#tab1" data-toggle="tab" role="tab" class="b-a b-grey text-color">
Job
</a>
</li>
<li>
<a href="#tab2" data-toggle="tab" role="tab" class="b-a b-grey text-color">
City
</a>
</li>
<li>
<a href="#tab3" data-toggle="tab" role="tab" class="b-a b-grey text-color">
Company
</a>
</li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="tab1">
<i class="fa fa-search"></i>
	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for a job.." title="Type in a name">
<div class ="searchLabels">
	<?php  ?>
<p class="hint-text all-caps font-montserrat small no-margin ">Jobs Posted</p>
<p class="all-caps font-montserrat  no-margin text-success "><?php echo $jobs->num_rows; ?></p>
<br>
<p class="hint-text all-caps font-montserrat small no-margin ">Today</p>
<p class="all-caps font-montserrat  no-margin text-warning ">24</p>
<br>
<p class="hint-text all-caps font-montserrat small no-margin ">Week</p>
<p class="all-caps font-montserrat  no-margin text-success ">56</p>
</div>
</div>
<div class="tab-pane " id="tab2">
<h3 class="m-t-5 m-b-20">Google</h3>
<p class="hint-text all-caps font-montserrat small no-margin ">Views</p>
<p class="all-caps font-montserrat  no-margin text-success ">14,256</p>
<br>
<p class="hint-text all-caps font-montserrat small no-margin ">Today</p>
<p class="all-caps font-montserrat  no-margin text-warning ">24</p>
<br>
<p class="hint-text all-caps font-montserrat small no-margin ">Week</p>
<p class="all-caps font-montserrat  no-margin text-success ">56</p>
</div>
<div class="tab-pane" id="tab3">
<h3 class="m-t-5 m-b-20">Amazon</h3>
<p class="hint-text all-caps font-montserrat small no-margin ">Views</p>
<p class="all-caps font-montserrat  no-margin text-success ">14,256</p>
<br>
<p class="hint-text all-caps font-montserrat small no-margin ">Today</p>
<p class="all-caps font-montserrat  no-margin text-warning ">24</p>
<br>
<p class="hint-text all-caps font-montserrat small no-margin ">Week</p>
<p class="all-caps font-montserrat  no-margin text-success ">56</p>
</div>
</div>
</div>
<div class="p-l-20 p-r-20 p-t-10 p-b-10 pull-bottom full-width hidden-xs">
<p class="no-margin">
<a href="#" class="btn-circle-arrow b-grey"><i class="pg-icon">chevron_down</i></a>
<span class="hint-text">Super secret options</span>
</p>
</div>
</div>
<!-- End Search Widget --> 

					<!-- Start Available Jobs Widget -->

					<div class="col-sm-7 col-lg-8 col-xlg-9 col-sm-height col-top no-padding relative">
						<div class=" widget-13-map card mapplic-element scrollneeded" style=" overflow-y: auto;">
							<div>
								<?php
							

						

						/* Create table doesn't return a resultset */


						/* Select queries return a resultset */
						
						
						if ($jobs = $mysqli->query("SELECT job_title, job_city, company_name  FROM ps_wpjb_job WHERE `employer_id`='$id' ORDER BY job_title ASC")) {
							echo "<h1 class='table-header'> Job Listings </h1>";
							echo "<div class='tbl-header'>";
							echo "<table  cellpadding='0' cellspacing='0' border='0'>";
							echo "<thead><tr> <th class='table-header'>Job Title</th> <th class='table-header'>City</th> <th class='table-header'>Company</th></tr> </thead>";
							echo "</table></div>";
							echo "<div class ='tbl-content'><table id='myTable' cellpadding='0' cellspacing='0' border='0'><tbody>";
							$array = array();
							while($row = $jobs->fetch_assoc() ){
							echo "<tr id=queryrows>";
								if(strpos($row["job_title"], '(') || strpos($row["job_title"], ')') ){
									$newstring = substr($row["job_title"], 0, strpos($row["job_title"], '('));
									echo "<td>". "<a href='#'>" . $newstring . "</a>" ."</td>" ;
								}
								else{
								echo "<td>". "<a href='#'>" . $row["job_title"] . " </a>" . "</td>" ;
								}

								echo "<td>". "<a href='#'>" . $row["job_city"] . " </a>" . "</td>" ; 
								echo "<td>". "<a href='#'>" . $row["company_name"] . " </a>" . "</td>" ;
								echo "</tr>";
								$array[] = $row;
							
							}

							// listings is a mulit-dimensional associative array of sql objects
							echo "</tbody></table></div>";
						    /* free result set */
						    $jobs->close();
						}
							?>
									<div>
										<div class="mapplic-container" style="height: 100%;"></div>
										<div> </div>
									</div>
							</div>
						</div>
					</div>
					<!-- End Available Jobs Widget -->
				</div>
					<!-- END PLACE PAGE CONTENT BELOW -->
				</div>
				<!-- END CONTAINER FLUID -->
			</div>
			<!-- END PAGE CONTENT -->
			<!-- START FOOTER -->
			<div class="container-fluid container-fixed-lg footer">
				<div class="copyright sm-text-center">
					<p class="small no-margin pull-left sm-pull-reset"> <span class="hint-text">Copyright © 2014</span> <span class="font-montserrat">REVOX</span>. <span class="hint-text">All rights reserved.</span> <span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#"
								class="m-l-10">Privacy Policy</a>
						</span> </p>
					<p class="small no-margin pull-right sm-pull-reset"> <a href="#">Hand-crafted</a> <span class="hint-text">&amp; Made with Love ®</span> </p>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- END FOOTER -->
		</div>

		
		
	
		<!-- END PAGE CONTENT WRAPPER -->
	</div>
	<!-- END PAGE CONTAINER -->
	
	
<?php wp_footer(); ?>
	<!-- END PAGE LEVEL JS -->
</body>

</html>