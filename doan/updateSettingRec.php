<?php
// array for JSON response
$response = array();
if (isset($_POST['UserId'])&&isset($_POST['Location'])&&isset($_POST['NumberRec'])&&isset($_POST['SkillID'])&&isset($_POST['TimeRec'])&&isset($_POST['State'])) {
	$UserId = $_POST['UserId'];
	$Location=$_POST['Location'];
	$NumberRec=$_POST['NumberRec'];
	$SkillID=$_POST['SkillID'];
	$TimeRec=$_POST['TimeRec'];
	$State=$_POST['State'];
// include db connect class
require_once __DIR__ . '/connect.php';

// connecting to db
$db = new DB_CONNECT();
$result = mysql_query("Update user_setting set Location ='$Location' ,NumberRec ='$NumberRec', SkillID ='$SkillID',TimeRec ='$TimeRec',State ='$State' WHERE UserId='$UserId'") or die(mysql_error());

 if ($result) {
        // successfully updated
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