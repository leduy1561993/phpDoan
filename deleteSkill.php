<?php
// array for JSON response
$response = array();
if (isset($_POST['SkillId'])&&isset($_POST['UserId'])){
	$SkillId = $_POST['SkillId'];
	$UserId = $_POST['UserId'];

// include db connect class
	require_once __DIR__ . '/connect.php';
	// connecting to db
	$db = new DB_CONNECT();
	$check_rate = mysql_query("DELETE FROM user_skill WHERE UserId='$UserId' and SkillId ='$SkillId' ") or die(mysql_error());
    // success
	if($check_rate){
		$response["success"] = 1;
	}else {
		// no users found
		$response["message"] = "No found";
		$response["success"] = 0;
	}
    
    // echoing JSON response
    echo json_encode($response);
}else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>