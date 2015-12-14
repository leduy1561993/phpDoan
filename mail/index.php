<?php
//include 'db.php';
error_reporting(E_ALL ^ E_DEPRECATED);

require_once __DIR__ . '/connect.php';
$db = new DB_CONNECT();

$msg='';
if(!empty($_GET['email']) && isset($_GET['email']) &&  !empty($_GET['password']) &&  isset($_GET['password']) )
{
// username and password sent from Form
$email=mysql_real_escape_string($_GET['email']); 
$password=mysql_real_escape_string($_GET['password']); 

$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';

if(preg_match($regex, $email))
{  
$password=md5($password); // Encrypted password
$activation=md5($email.time()); // Encrypted email+timestamp

$count=mysql_query("SELECT UserId FROM user WHERE Email='$email'");
if(mysql_num_rows($count) < 1)
{
mysql_query("INSERT INTO user(email,password,activation) VALUES('$email','$password','$activation');");

include 'Send_Mail.php';
$to=$email;
$subject="Email verification";
$body='Hi, <br/> <br/> Chúng tôi cần bạn đảm bảo email này là của bạn. Vui lòng xác nhận email theo link . <br/> <br/> <a href="'.$base_url.'activation.php?code='.$activation.'</a>';
	If(Send_Mail($to,$subject,$body)){
		$msg= '2';	
	}
}
else
{
$msg= '1';	
}
}
else
{
   $msg = '0';  
}

echo $msg;
}

//doc
//0: invalid
//1: exits
//2:ok
?>
