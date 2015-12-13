<?php
// array for JSON response
$response = array();
if (isset($_POST['UserId'])){
	$UserId = $_POST['UserId'];

// include db connect class
require_once __DIR__ . '/connect.php';
// connecting to db
$db = new DB_CONNECT();
$result=mysql_query("
SELECT US.SkillId,skill.skillName,US.experience_year
FROM
(SELECT SkillId,experience_year FROM user_skill 
WHERE UserId='$UserId')US
LEFT JOIN
skill
ON
skill.SkillId = US.SkillId
") or die(mysql_error());
	if (mysql_num_rows($result) > 0) {
		// looping through all results
		// users node
		$response["listskill"] = array();
		while ($row = mysql_fetch_array($result)) {
			$skill = array();
			$skill["SkillId"] = $row["SkillId"];
			$skill["SkillName"] = $row["skillName"];
			$skill["Experience_Year"] = $row["experience_year"];
			array_push($response["listskill"], $skill);
		}
		// success
		$response["success"] = 1;
		// echoing JSON response
		echo json_encode($response);
		}else {
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