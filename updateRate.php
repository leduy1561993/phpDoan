<?php
// array for JSON response
$response = array();
if (isset($_POST['UserId']) &&isset($_POST['JobId']) && isset($_POST['Rate'])) {
    $UserId = $_POST['UserId'];
    $JobId = $_POST['JobId'];
    $Rate = $_POST['Rate'];
// include db connect class
require_once __DIR__ . '/connect.php';

// connecting to db
$db = new DB_CONNECT();
$result = mysql_query("Update rate_save_seen set Rate ='$Rate' WHERE UserId='$UserId' and JobId ='$JobId' ") or die(mysql_error());

 if ($result) {
        // successfully updated
		/////////////////////
		$check_rate = mysql_query("select ratepoint from job where JobId= '$JobId'");
		$temp_row = mysql_fetch_array($check_rate);
		$rate_point=$temp_row["ratepoint"] +$Rate;
		$update_rate_point = mysql_query("Update job set ratepoint ='$rate_point' WHERE JobId ='$JobId' ") or die(mysql_error());
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