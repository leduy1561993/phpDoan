<?php
// array for JSON response
$response = array();
if (isset($_POST['JobId'])&&isset($_POST['UserId'])){
$JobId = $_POST['JobId'];
$UserId = $_POST['UserId'];

// include db connect class
require_once __DIR__ . '/connect.php';
// connecting to db
$db = new DB_CONNECT();
$check_rate=mysql_query("SELECT Seen FROM rate_save_seen WHERE UserId='$UserId' and JobId ='$JobId' ");
if(mysql_num_rows($check_rate) > 0){
	$row = mysql_fetch_array($check_rate);
	$Seen=$row["Seen"] +1;
	$check_rate = mysql_query("Update rate_save_seen set Seen ='$Seen' WHERE UserId='$UserId' and JobId ='$JobId' ") or die(mysql_error());
}else{
	$check_rate=mysql_query("INSERT INTO rate_save_seen(UserId, JobId, Seen) VALUES('$UserId', '$JobId', 1)");
}

$result = mysql_query("SELECT job.JobId,JobName,Location,Salary,Description,Requirement,Benifit,Expired,Source,Company,Logo,rate.Rate ,rate.IsSave
FROM
(SELECT JobId,JobName,Location,Salary,Description,Requirement,Benifit,Expired,Source,Company,Logo FROM job WHERE JobId='$JobId') job
LEFT JOIN 
(SELECT Rate,JobId,IsSave from rate_save_seen WHERE JobId='$JobId' and UserId ='$UserId') rate
ON job.JobId = rate.JobId ") or die(mysql_error());

if (mysql_num_rows($result) > 0) { 
    $row = mysql_fetch_array($result);
	$response["JobId"] = $row["JobId"];
	/////////////////////
	$check_seen = mysql_query("select seenpoint from job where JobId= '$JobId'");
	$temp_row = mysql_fetch_array($check_seen);
	$seen_point=$temp_row["seenpoint"] +1;
	$update_seen_point = mysql_query("Update job set seenpoint ='$seen_point' WHERE JobId ='$JobId' ") or die(mysql_error());
	/////////////////////
	$response["JobName"] = $row["JobName"];
	$response["Location"] = $row["Location"];
	$response["Salary"] = $row["Salary"];
	$response["Description"] = $row["Description"];
	$response["Requirement"] = $row["Requirement"];
	$response["Benifit"] = $row["Benifit"];
	$response["Expired"] = $row["Expired"];
	$response["Source"] = $row["Source"];
	$response["Company"] = $row["Company"];
	$response["Logo"] = $row["Logo"];
	$response["Rate"] = $row["Rate"];
	$response["IsSave"] = $row["IsSave"];
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