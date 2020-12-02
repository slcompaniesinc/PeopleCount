<?php 
/* Template Name: Workflow Template Script */ 
include_once get_template_directory().'/API/userWorkflow.php';
include_once get_template_directory().'/API/wrkflw_utility.php';

$mysqli = new mysqli( 'localhost', 'finalpeo_wp763' , 'Sp)s7o5J1.' , 'finalpeo_wp763' );
if( isset($_POST['username']) ){
	$applicant = new userWorkflow($_POST['username']);
	/* check connection */

  if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
	$user = $applicant->getUser();
	$user_id = $user->id;
	$userName = $user->user_login;
  // where the applicant is in the workflow
	$status = $applicant->getStatus();
  $curr_date = date('Y-m-d');
  // flag lets us know which status the applicant is going to.
  $flag = $_POST['flag'];
  $destination = getDBTable( $flag );  

		if($stmt = $mysqli->prepare("INSERT INTO `$destination` (user_ID, userName, stamp) VALUES (?, ?, ?)" )){
			$stmt->bind_param( 'iss', $user_id, $userName , $curr_date );
			$stmt->execute();
			$stmt->close();
		}
		$table = getDBTable( $status );
		$mysqli->query("DELETE FROM $table WHERE userName = '$userName'");
		
    $mysqli->query("UPDATE wp4s_status SET workflow_status='$flag', status_date='$curr_date' WHERE userName = '$userName'");
		//update the status in wp4s_status
    $mysqli->close();
}
else{
	die();
}

// need to put these functions in a general workflow_utility file
