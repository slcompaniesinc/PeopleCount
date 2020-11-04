<?php

//utility functions created for security and abstraction

function connectSQL($mysqli, $sql_statement){
	// can you hash these parameters?
	
	 /* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
 	}
 	

 	return $mysqli->query($sql_statement); 

}


function checkUsername($username, $password){
	if(isset( $_SESSION["username"]) && isset( $_SESSION["password"])){
	$username = $_SESSION["username"];
	$password = $_SESSION["password"];
	return true;
}
else{
	// cannot access this page directly they must login first.
	echo '<script type="text/javascript">
	window.location.href="https://final.peoplecount.work";
    </script>';
    return false;
}

}


 ?>
