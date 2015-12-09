<?php
// array for JSON response
$response = array();
if (isset($_POST['SkillId'])&&isset($_POST['UserId'])&&isset($_POST['Experience_Year'])){
	$experience_year=$_POST['Experience_Year'];
	$SkillId = $_POST['SkillId'];
	$UserId = $_POST['UserId'];

// include db connect class
	require_once __DIR__ . '/connect.php';
	// connecting to db
	$db = new DB_CONNECT();
	$check = mysql_query("Update user_skill set Experience_Year ='$experience_year' WHERE UserId='$UserId' and SkillId ='$SkillId' ") or die(mysql_error());
    // success
	if($check){
		$response["success"] = 1;
	}else{
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