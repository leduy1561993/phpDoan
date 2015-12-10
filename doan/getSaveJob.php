<?php

/*
 * Following code will get single user details
 * A user is identified by user id (u_pk)
 */

// array for JSON response
error_reporting(E_ALL & ~E_NOTICE);
$response = array();


// include db connect class
require_once __DIR__ . '\connect.php';

// connecting to db
$db = new DB_CONNECT();
ini_set('default_charset', 'UTF-8');
// check for post data
if (isset($_POST["UserId"])) {
	$UserId = $_POST["UserId"];
	$offset = 0;
	$limit = 10;
	if (isset($_POST['offset'])) {
		$offset = $_POST['offset'];
	}
	$result = mysql_query(
	"
	SELECT job.JobId,JobName,Location,Company,Logo,ratepoint,savepoint,seenpoint 
	from 
	(SELECT JobId,Seen,Rate from rate_save_seen where UserId='$UserId' and isSave = 1) rateId
	INNER JOIN
	job
	ON rateId.JobId = job.JobId
	ORDER BY rateId.Seen DESC, rateId.Rate DESC
	limit $limit offset $offset
	"
	)or die(mysql_error());
	if (mysql_num_rows($result) > 0) {
		// looping through all results
		// users node
		$response["jobsave"] = array();
		while ($row = mysql_fetch_array($result)) {
			$jobsearch = array();
			$jobsearch["JobId"] = $row["JobId"];
			$jobsearch["JobName"] = $row["JobName"];
			$jobsearch["Location"] = $row["Location"];
			$jobsearch["Company"] = $row["Company"];
			$jobsearch["Logo"] = $row["Logo"];
			$ratepoint = $row["ratepoint"];
			$savepoint = $row["savepoint"];
			$seenpoint = $row["seenpoint"];
			$information = 'Rate: '.$ratepoint.' | '.'Save: '.$savepoint.' | '.'See: '.$seenpoint;
			$jobsearch["Information"] = $information;
			array_push($response["jobsave"], $jobsearch);
		}
		// success
		$response["success"] = 1;
		// echoing JSON response
		echo json_encode($response);
	} else {
		// no users found
		$response["success"] = 0;
		$response["message"] = "No users save found";
		// echo no users JSON
		echo json_encode($response);
	}
}else{
	$response["success"] = 0;
    $response["message"] = "khong truyen tham so";
	echo json_encode($response);
}
?>