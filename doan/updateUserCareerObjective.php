<?php
// array for JSON response
$response = array();
if (isset($_POST['UserId']) &&isset($_POST['careerObjective'])) {
    $UserId = $_POST['UserId'];
    $careerObjective = $_POST['careerObjective'];
// include db connect class
require_once __DIR__ . '/connect.php';

// connecting to db
$db = new DB_CONNECT();
$result = mysql_query("Update user set Career_Objective =N'$careerObjective' WHERE UserId='$UserId'") or die(mysql_error());

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