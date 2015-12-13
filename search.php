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
if (isset($_POST["keyWord"])||isset($_POST["location"])||isset($_POST["special"])) {
	$offset = 0;
	$limit = 10;
	$max_matches = 100;
	
	require_once('C:\Sphinx\api\sphinxapi.php');
	$s = new SphinxClient;
	$s->setServer("127.0.0.1", 9312);
	$s->setMatchMode(SPH_MATCH_EXTENDED2);
	
	if (isset($_POST['offset'])) {
		$offset = $_POST['offset'];
	}
	//$sortMode='ratepoint';
	if(isset($_POST["sortMode"])){
		$sortMode=$_POST["sortMode"];
		$s->setSortMode(SPH_SORT_ATTR_DESC, $sortMode);
	}
	$s->SetLimits((int)$offset,
		// limit for this "page", starting at $offset
		(int)$limit,
		// absolute limit for number of results
		((int)$limit > $max_matches)
			? (int)$limit
			: (int)$max_matches);
	if(isset($_POST["keyWord"])&&isset($_POST["location"])&&isset($_POST["special"])){
		$keyWord = $_POST['keyWord'];
		$location = $_POST['location'];
		$special = $_POST['special'];
		$result = $s->Query("@JobName $keyWord @location $location @Requirement $special");
		
	}else if(isset($_POST["keyWord"])&&isset($_POST["location"])){
		$keyWord = $_POST['keyWord'];
		$location = $_POST['location'];
		 $result = $s->Query("@JobName $keyWord  @location $location");
		 
    }else if(isset($_POST["keyWord"])&&isset($_POST["special"])){
		$keyWord = $_POST['keyWord'];
		$special = $_POST['special'];
	    $result = $s->Query("@JobName $keyWord  @Requirement $special");
		
	}else if(isset($_POST["location"])&&isset($_POST["special"])){
		$location = $_POST['location'];
		$special = $_POST['special'];
		$result = $s->Query("@location $location  @Requirement $special");
		
	}else if(isset($_POST["keyWord"])){
		$keyWord = $_POST['keyWord'];
		 $result = $s->Query("@JobName $keyWord");
		 
	}else if(isset($_POST["location"])){
		$location = $_POST['location'];
		$result = $s->Query("@location $location");
		
	}else if(isset($_POST["special"])){
		$special = $_POST['special'];
		 $result = $s->Query("@Description $special");
	}
	
	if ($result['total'] > $offset) {
		$response["jobsearch"] = array();
		foreach ($result['matches'] as $id => $otherStuff) {
		mysql_query("set names 'utf8'"); 
			$row = mysql_fetch_array(mysql_query("select JobId,JobName,Location,Company,Logo,ratepoint,savepoint,seenpoint from job where JobId = $id"));
				// check for empty result
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
				array_push($response["jobsearch"], $jobsearch);
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