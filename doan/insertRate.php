<?php

/*
 * Following code will create a new user row
 * All user details are read from HTTP Post Request
 */

// array for JSON response
$response = array();

// check for required fields
if (isset($_POST['UserId']) &&isset($_POST['JobId']) && isset($_POST['Rating'])) {
    
    $UserId = $_POST['UserId'];
    $JobId = $_POST['JobId'];
    $Rating = $_POST['Rating'];

    // include db connect class
    require_once __DIR__ . '/connect.php';

    // connecting to db
    $db = new DB_CONNECT();

    // mysql inserting a new row
    $result = mysql_query("INSERT INTO rate_save_seen(UserId, JobId, Rating) 
	VALUES('$UserId', '$JobId', '$Rating')");

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