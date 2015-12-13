<?php
// array for JSON response
$response = array();
if (isset($_POST['UserId'])){
$UserId = $_POST['UserId'];

// include db connect class
require_once __DIR__ . '/connect.php';
// connecting to db
$db = new DB_CONNECT();
$result=mysql_query("SELECT * FROM user WHERE UserId='$UserId'") or die(mysql_error());
if (mysql_num_rows($result) > 0) { 
    $row = mysql_fetch_array($result);
	$response["UserId"] = $row["UserId"];
	$response["FullName"]= $row["FullName"];
	$response["Email"] = $row["Email"];
	$response["Password"] = $row["Password"];
	$response["Birthday"] = $row["Birthday"];
	$response["Gender"] = $row["Gender"];
	$response["Address"] = $row["Address"];
	$response["Phone"] = $row["Phone"];
	$response["Career_Objective"] = $row["Career_Objective"];
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