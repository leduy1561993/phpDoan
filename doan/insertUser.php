<?php

/*
 * Following code will create a new user row
 * All user details are read from HTTP Post Request
 */

// array for JSON response
$response = array();

// check for required fields
if (isset($_POST['fullName'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['birthday'])&&isset($_POST['gender'])
	&&isset($_POST['address'])&&isset($_POST['phone'])&&isset($_POST['careerObjective'])&&isset($_POST['imageUrl'])){
    $fullName=$_POST['fullName'];
	$email = $_POST['email'];
	$password=md5($_POST['password']);
	$birthday = $_POST['birthday'];
	$gender=$_POST['gender'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$careerObjective=$_POST['careerObjective'];
	$imageUrl = $_POST['imageUrl'];

    // include db connect class
    require_once __DIR__ . '/connect.php';

    // connecting to db
    $db = new DB_CONNECT();
	$check= true;
	$userId;
	$result1 = mysql_query("SELECT UserId FROM user WHERE Email ='$email'");
	if(mysql_num_rows($result1) < 1)
	{
		// mysql inserting a new row
		mysql_query("INSERT INTO user(FullName, Email, Password, Birthday, Gender, Address,
		Phone, Career_Objective, activation, status, image_user) 
		VALUES('$fullName','$email', '$password', '$birthday','$gender', '$address','$phone' ,'$careerObjective','1','1','$imageUrl')");
		$result = mysql_query("SELECT UserId FROM user WHERE Email ='$email'");
		$row = mysql_fetch_array($result);
		$userId = $row["UserId"];
		$response["UserId"] =$userId;
		$check = mysql_query("INSERT INTO user_setting(UserId, Location) VALUES('$userId','$address')");
		if($check){
			$response["success"] = 1;
		}
	}else{
		$response["success"] = 2;
	}
	echo json_encode($response);
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>