<?php
// array for JSON response
// include db connect class
error_reporting(E_ALL & ~E_NOTICE);
require_once __DIR__ . '/connect.php';
// connecting to db
$db = new DB_CONNECT();
$response = array();
if (isset($_POST['Email'])&&isset($_POST['Password'])){
$Email = $_POST['Email'];
$Password = md5($_POST['Password']);
$result=mysql_query(" SELECT UserId,Email,Password,image_user FROM user WHERE Email='$Email' AND Password = '$Password' AND status=1");
if (mysql_num_rows($result) > 0) { 
    $row = mysql_fetch_array($result);
	$response["UserId"] = $row["UserId"];
	$response["Email"] = $row["Email"];
	$response["Password"] = $row["Password"];
	$response["imageUrl"] = $row["image_user"];
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