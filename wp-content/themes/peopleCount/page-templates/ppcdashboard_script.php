<?
 /* Template Name: DashboardAJAX Template */ 

if( isset( $_POST['t_info'] ) ){
	$table_info = $_POST['t_info'];
  $mysqli = new mysqli( 'localhost', 'finalpeo_wp763', 'Sp)s7o5J1.', 'finalpeo_wp763' );
  $table_name = 'wp4s_' . $table_info[0]. '_associates';
  $checkuserSql = "SELECT * FROM $table_name ";
  $result = $mysqli->query($checkuserSql) or die($mysqli->error);
  while($row = $result->fetch_assoc() ){
    echo "<tr id='queryrows'>";
    echo "<td><button class='applicantcb $table_info[0]'>View</button></td>";
    echo "<td>". $row["userName"]. "</td>";
    echo "<td>". $row["stamp"]. "</td>";
    echo "</tr>";
  }
}
else{
	wp_die();
}


?>