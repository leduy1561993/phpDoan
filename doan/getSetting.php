<?php
// array for JSON response
// include db connect class
error_reporting(E_ALL & ~E_NOTICE);
require_once __DIR__ . '/connect.php';
// connecting to db
$db = new DB_CONNECT();
$response = array();
if (isset($_POST['UserId'])){
$UserId = $_POST['UserId'];
$result=mysql_query(" SELECT Location,NumberRec,user_setting.SkillId,skill.SkillName,TimeRec,State 
FROM user_setting  
LEFT JOIN skill 
ON skill.SkillId=user_setting.SkillId
WHERE UserId='$UserId'");
if (mysql_num_rows($result) > 0) { 
    $row = mysql_fetch_array($result);
	$response["Location"] = $row["Location"];
	$response["NumberRec"] = $row["NumberRec"];
	$response["SkillId"] = $row["SkillId"];
	$response["Skill"] = $row["SkillName"];
	$response["TimeRec"] = $row["TimeRec"];
	$response["State"] = $row["State"];
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no users found
    $response["message"] = "No found";
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