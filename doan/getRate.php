<?php
// array for JSON response
$response = array();
if (isset($_POST['UserId']) &&isset($_POST['JobId'])) {
    
    $UserId = $_POST['UserId'];
    $JobId = $_POST['JobId'];

// include db connect class
require_once __DIR__ . '/connect.php';
// connecting to db
$db = new DB_CONNECT();
$result = mysql_query("SELECT Rating FROM rate_save_seen WHERE UserId='$UserId' and JobId ='$JobId'") or die(mysql_error());

if (mysql_num_rows($result) > 0) { 
    $row = mysql_fetch_array($result);
	$response["rate"] = $row["rate"];
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no users found
    $response["message"] = "No users found";
	$response["success"] = 0;
    // echo no users JSON
    echo json_encode($response);
}
}
else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>