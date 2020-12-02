<?
/**
 * Template Name: Applied Applicants
 */

// will contain functions that generate html tables
function loadApplicants(){ 
  if ($applicants = $mysqli->query( "SELECT * FROM wp4s_applied_associates" )) {
	echo "<h1 class='table-header'> New Applicants </h1>";
	echo "<div class='tbl-header'>";
	echo "<table  cellpadding='0' cellspacing='0' border='0'>";

	echo "<thead><tr><th class='table-header'></th><th class='table-header'>Name</th> <th class='table-header'>Applied On</th></tr> </thead>";
	echo "</table></div>";
	echo "<div class ='tbl-content'><table id='applied_table' cellpadding='0' cellspacing='0' border='0'><tbody>";
	//$array = array();
	while($row = $applicants->fetch_assoc() ){
	echo "<tr id=queryrows>";
	
	echo "<td>". "<a href='#'>" . $row["userName"] . " </a>" . "</td>" ;
	}

	echo "<td>". "<a href='#'>" . $row["date_applied"] . " </a>" . "</td>" ; 
	echo "</tr>";
	//$array[] = $row;

	

	// listings is a mulit-dimensional associative array of sql objects
	echo "</tbody></table></div>";
    /* free result set */
    $applicants->close();
	
}
}


function getNewApplicants($mysqli){
  if ($applicants = $mysqli->query( "SELECT * FROM wp4s_applied_associates" )){
    

  }
}


?>