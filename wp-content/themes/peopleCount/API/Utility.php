<?
class Utility{
	private $mysqli;
  function __construct(){
  	$this->mysqli = new mysqli("localhost", "finalpeo_wp763", "Sp)s7o5J1.", "finalpeo_wp763");
  }

  function getApplicants($status_name){
  	$prefix = "wp4s_";
  	$suffix = "_associates";
  	$table_name = $prefix . $status_name. $suffix;
  	$checkuserSql = "SELECT * FROM '$table_name'";
  	$result = $mysqli->query($checkuserSql);
  	$usernames = array();
    $dates = array();
    while($row = $result->fetch_assoc() ){
	  $usernames[] = $row["userName"];
	  $dates[] = $row["dates"];
    }
    $array = array();
    array_push($array, $usernames, $dates);
    return $array;
  }
  

}



?>