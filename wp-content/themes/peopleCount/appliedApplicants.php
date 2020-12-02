<?
/**
 * Template Name: Applied Applicants
 */

// will contain functions that generate html tables
function loadnewApplicants(){
	// after getting it working, go back and prepare this statement and delete unneccessary comments
	$new_applicants = array();
	$applicants = $mysqli->query( "SELECT * FROM wp4s_applied_associates" );
	while( $row = $applicants->fetch_assoc() ){
      $new_applicants[] = array( 
        "ID" => $row["ID"],
        "user_ID" => $row["user_ID"],
        "userName" => $row["userName"],
        "date_applied" => $row["date_applied"]
      );
	}
}


?>