<?


function connectdb($mysqli){
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }
}

function Insertprepare($mysqli, $insert_statement){
  if (!($stmt = $mysqli->prepare($insert_statement))) {
     echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}
	else{
		return $stmt;
	}
}

function bindStatement($value){
 if (!$stmt->bind_param("i", $value)) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
   }
}

function executeStatement($stmt){
  if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
  }
}

function closeStatement($stmt){
	$stmt->close();
}




?>