<?php
// array for JSON response
$response = array();
if (isset($_POST['UserId'])&&isset($_POST['Location'])) {
	$UserId = $_POST['UserId'];
	$Location=$_POST['Location'].' ';
	// include db connect class
	require_once __DIR__ . '/connect.php';

	// connecting to db
	$db = new DB_CONNECT();
	$result = mysql_query("SELECT Location FROM user_setting WHERE UserId='$UserId'") or die(mysql_error());
	$row = mysql_fetch_array($result);
	$location_temp = $row["Location"];
	if((is_null($location_temp)||strlen($location_temp)<3)||strlen($location_temp)>strlen(trim($location_temp))){
		$result = mysql_query("Update user_setting set Location ='$Location' WHERE UserId='$UserId'") or die(mysql_error());

		if ($result) {
			// successfully updated
			$response["success"] = 1;
			$response["message"] = "successfully updated.";
				
			// echoing JSON response
			echo json_encode($response);
		} else {
			$response["success"] = 0;
			$response["message"] = "fail updated.";
		}
	}else {
		// required field is missing
		$response["success"] = 0;
		$response["message"] = "is exits";
		// echoing JSON response
		echo json_encode($response);
	}
}else{
	$response["success"] = 0;
	$response["message"] = "Rate field(s) is missing";
	// echoing JSON response
	echo json_encode($response);
}

?>