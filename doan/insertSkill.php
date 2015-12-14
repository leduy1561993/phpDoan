<?php

/*
 * Following code will create a new user row
 * All user details are read from HTTP Post Request
 */

// array for JSON response
$response = array();

// check for required fields
if (isset($_POST['SkillId'])&&isset($_POST['UserId'])&&isset($_POST['Experience_Year'])){
    
    $experience_year=$_POST['Experience_Year'];
	$SkillId = $_POST['SkillId'];
	$UserId = $_POST['UserId'];

    // include db connect class
    require_once __DIR__ . '/connect.php';

    // connecting to db
    $db = new DB_CONNECT();

    // mysql inserting a new row
    $result = mysql_query("INSERT INTO user_skill(UserId, SkillId, Experience_Year) 
	VALUES('$UserId', '$SkillId', '$experience_year')");

    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;

        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
        
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>