<?php
// array for JSON response
$response = array();
if (isset($_POST['UserId'])&&isset($_POST['FullName'])&&isset($_POST['Birthday'])&&isset($_POST['Gender'])&isset($_POST['Phone'])&isset($_POST['Address'])){
	$userId=$_POST['UserId'];
	$fullName = $_POST['FullName'];
	$birthday = $_POST['Birthday'];
	$gender=$_POST['Gender'];
	$phone = $_POST['Phone'];
	$address = $_POST['Address'];
// include db connect class
	require_once __DIR__ . '/connect.php';
	// connecting to db
	$db = new DB_CONNECT();
	$check = mysql_query("
	UPDATE user SET FullName='$fullName',Birthday='$birthday',
	Gender='$gender',Address='$address',Phone='$phone'
	WHERE UserId='$userId'
	") or die(mysql_error());
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