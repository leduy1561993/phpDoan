<?php

/*
 * Following code will get single user details
 * A user is identified by user id (u_pk)
 */
// array for JSON response
//error_reporting(E_ALL & ~E_NOTICE);
$response = array();


// include db connect class
require_once __DIR__ . '/connect.php';

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
	$result_setting =mysql_query(
	"SELECT Location, SkillName 
	FROM user_setting 
	LEFT JOIN 
	skill ON skill.SkillId = user_setting.SkillId 
	where UserId='$UserId'");
	$location='';
	$special='';
	if (mysql_num_rows($result_setting) > 0) {
		$row = mysql_fetch_array($result_setting);
		$location= $row["Location"];
		$special= $row["SkillName"];
	}
	//echo '-----@'.$location.'------@'.$special;
	$max_matches = 100;	
	require_once('C:\Sphinx\api\sphinxapi.php');
	$s = new SphinxClient;
	$s->setServer("127.0.0.1", 9312);
	$s->setMatchMode(SPH_MATCH_EXTENDED2);
	$s->SetLimits((int)$offset,
		// limit for this "page", starting at $offset
		(int)$limit,
		// absolute limit for number of results
		((int)$limit > $max_matches)
			? (int)$limit
			: (int)$max_matches);
	
	if(strlen($location)>2&&strlen($special)>0){
		$result = $s->Query("@ListUserId $UserId @location $location  @(Requirement,Tags) $special");
	}else if(strlen($location)>2){
		$result = $s->Query("@ListUserId $UserId @location $location");
	}else if(strlen($special)>0){
		$result = $s->Query("@ListUserId $UserId @(Requirement,Tags) $special");
	}else{
		$result = $s->Query("@ListUserId $UserId");
	}
	if ($result['total'] > $offset) {
		$response["jobrec"] = array();
		foreach ($result['matches'] as $id => $otherStuff) {
			mysql_query("set names 'utf8'"); 
			$row = mysql_fetch_array(mysql_query("select JobId,JobName,Location,Company,Logo,ratepoint,savepoint,seenpoint from job where JobId = $id"));
				// check for empty result
				$jobrec = array();
				$jobrec["JobId"] = $row["JobId"];
				$jobrec["JobName"] = $row["JobName"];
				$jobrec["Location"] = $row["Location"];
				$jobrec["Company"] = $row["Company"];
				$jobrec["Logo"] = $row["Logo"];
				$ratepoint = $row["ratepoint"];
				$savepoint = $row["savepoint"];
				$seenpoint = $row["seenpoint"];
				$information = 'Rate: '.$ratepoint.' | '.'Save: '.$savepoint.' | '.'See: '.$seenpoint;
				$jobrec["Information"] = $information;
				array_push($response["jobrec"], $jobrec);
		}
		$response["success"] = "1";
		echo json_encode($response);
	}else {
		$response["success"]="0";
		echo json_encode($response);
	}
}else{
	$response["success"] = 0;
    $response["message"] = "khong truyen tham so";
	echo json_encode($response);
}
?>