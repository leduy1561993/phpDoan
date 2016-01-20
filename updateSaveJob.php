<?php
// array for JSON response
$response = array();
if (isset($_POST['UserId']) &&isset($_POST['JobId']) && isset($_POST['IsSave'])) {
    $UserId = $_POST['UserId'];
    $JobId = $_POST['JobId'];
	$IsSave = $_POST['IsSave'];
// include db connect class
require_once __DIR__ . '/connect.php';

// connecting to db
$db = new DB_CONNECT();
$result = mysql_query("Update rate_save_seen set IsSave =$IsSave WHERE UserId='$UserId' and JobId ='$JobId' ") or die(mysql_error());

 if ($result) {
        // successfully updated
		/////////////////////
		$check_save = mysql_query("select savepoint from job where JobId= '$JobId'");
		$temp_row = mysql_fetch_array($check_save);
		if($IsSave>0){
			$save_point=$temp_row["savepoint"] +1;
		}else{
			$save_point=$temp_row["savepoint"] -1;
		}
		$update_save_point = mysql_query("Update job set savepoint = '$save_point' WHERE JobId ='$JobId' ") or die(mysql_error());
		/////////////////////
        $response["success"] = 1;
        $response["message"] = "Rate successfully updated.";
        
        // echoing JSON response
        echo json_encode($response);
    } else {
        $response["success"] = 0;
        $response["message"] = "Rate fail updated.";
    }
}
else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Rate field(s) is missing";
    // echoing JSON response
    echo json_encode($response);
}
?>