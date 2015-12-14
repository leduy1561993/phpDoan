<?php
error_reporting(E_ALL ^ E_DEPRECATED);
require_once __DIR__ . '/connect.php';
$db = new DB_CONNECT();

$msg='';
if(!empty($_GET['code']) && isset($_GET['code']))
{
	$code=mysql_real_escape_string($_GET['code']);

	$c=mysql_query("SELECT UserId FROM user WHERE activation='$code'");

	if(mysql_num_rows($c) > 0)
	{

	$count=mysql_query("SELECT UserId FROM user WHERE activation='$code' and status='0'");

	if(mysql_num_rows($count) == 1)
	{
		
	$row = mysql_fetch_array($count);
    mysql_query("UPDATE user SET status='1' WHERE activation='$code'");
	$UserId = $row['UserId'];
	mysql_query("INSERT INTO user_setting(UserId) VALUES('$UserId')");
	
    $msg="Your account is activated";	
    }
    else
    {
	$msg ="Your account is already active, no need to activate again";
    }

    }
    else
    {
	$msg ="Wrong activation code.";
    }

}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>PHP Email Verification Script</title>
<link rel="stylesheet" href="<?php echo $base_url; ?>style.css"/>
</head>
<body>
	<div id="main">
	<h2><?php echo $msg; ?></h2>
	</div>
</body>
</html>
