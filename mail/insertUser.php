<?php
//include 'db.php';
error_reporting(E_ALL ^ E_DEPRECATED);

require_once __DIR__ . '/connect.php';
$db = new DB_CONNECT();
$response = array();
$msg='';
if(isset($_POST['fullName'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['birthday'])&&isset($_POST['gender'])
	&&isset($_POST['address'])&&isset($_POST['phone'])&&isset($_POST['careerObjective'])&&isset($_POST['imageUrl']))
{
// username and password sent from Form
	$fullName=$_POST['fullName'];
	$email = $_POST['email'];
	$password=md5($_POST['password']);
	$birthday = $_POST['birthday'];
	$gender=$_POST['gender'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$careerObjective=$_POST['careerObjective'];
	$imageUrl = $_POST['imageUrl'];
	
	$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
	if(preg_match($regex, $email))
	{  
		$activation=md5($email.time()); // Encrypted email+timestamp
		$count=mysql_query("SELECT UserId FROM user WHERE Email='$email'");
		if(mysql_num_rows($count) < 1)
		{
			mysql_query("INSERT INTO user(FullName, Email, Password, Birthday, Gender, Address,
										Phone, Career_Objective, activation, status) 
				VALUES('$fullName','$email', '$password', '$birthday','$gender', '$address','$phone' ,'$careerObjective','$activation','0')");
			$result1 = mysql_query("SELECT UserId FROM user WHERE Email ='$email'");
			$row = mysql_fetch_array($result1);
			$userId = $row["UserId"];
			mysql_query("INSERT INTO user_setting(UserId, Location) VALUES('$userId','$address')");
			include 'Send_Mail.php';
			$to=$email;
			$subject="Email verification";
			$body='Hi, <br/> <br/> Chúng tôi cần bạn đảm bảo email này là của bạn. Vui lòng xác nhận email theo link . <br/> <br/> <a href="'.$base_url.'activation.php?code='.$activation.'</a>';
			if(Send_Mail($to,$subject,$body)){
				$response["success"] = 1;
			}else{
				$response["success"] = 1;
			}
		}else{
			$response["success"] = 2;	
		}
	}else{
	   $response["success"] = 3;
	}
	echo json_encode($response);
}else{
	$response["success"] = 3;
	echo json_encode($response);
}
?>
