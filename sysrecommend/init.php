<?php
//include 'db.php';
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting(0);
require_once __DIR__ . '/connect.php';
include 'Send_Mail.php';
require 'PHPMailerAutoload.php';
$db = new DB_CONNECT();
// username and password sent from Form
$time_run = time().'000';

$list_user_send=mysql_query("
	SELECT user.UserId, Email,((last_update + TimeRec*86400000)-'$time_run') as timecheck, offset, NumberRec, Location,SkillName
	FROM user 
	LEFT JOIN user_setting
	ON user.UserId= user_setting.UserId
	AND ((last_update + TimeRec*86400000) < '$time_run' OR last_update =0)
	LEFT JOIN skill
	ON user_setting.SkillId = skill.SkillId
	WHERE user_setting.UserId IS NOT NULL
	AND user_setting.State = '1'");
	
if(mysql_num_rows($list_user_send) > 0){
	while ($row = mysql_fetch_array($list_user_send)) {
		$check =false;
		$location_rec =$row["Location"];
		$specicaly_rec=$row["SkillName"];
		$body = "
		<html>
		<head>
			<meta charset='UTF-8'>
		</head>
		<body>
		<div align='left'  style='padding: 40;  background: beige;     width: 600; border: 10px solid #90949E; margin: 1%'>
		<div style='background: #fff; '>
		<div style ='padding: 10px; background: #fff;'>
			<div style='background:#304FFE;  padding: 20px;'>
				<div align='left'>
					<p style='margin: 0 ; font-family: Arial, sans-serif; font-size: 26px; color: #fff; font-weight: bold; padding: 2%px;'>
									Công việc giới thiệu cho bạn</p>
					<p style='margin: 0; font-family: Arial, sans-serif; font-size: 16px; color: #fff; font-weight: bold; padding: 2%px'>
								cung cấp bởi JRIT</p>
				</div>
			</div>
			<div style=' background: #fff; padding: 30'>
				<div  align='left' style='background: #fff;'>
					<p style=' font-size: 16px; font-weight: bold '>Chuyên ngành : 
					<SPACER> ".$specicaly_rec." </p>
					<p style=' font-size: 16px; font-weight: bold '> Địa điểm :
					<SPACER>".$location_rec."</p>
					<p style=' font-size: 16px; font-weight: bold '>Các công việc có thể bạn quan tâm</p>
				</div>
			</div>
		</div>
		<div style ='border-radius: 25px; border: 2px solid #2962FF; padding: 10px; background: #fff ; margin-right: 10px; margin-left: 10px ; margin-bottom: 10px'>
		";
		//$user["timecheck"] = $row["timecheck"];
		$to= $row["Email"];
		$UserId = $row["UserId"];
		$offset = $row["offset"];
		$NumberRec = $row["NumberRec"];
		
		$max_matches = 100;	
		require_once('C:\Sphinx\api\sphinxapi.php');
		$s = new SphinxClient;
		$s->setServer("127.0.0.1", 9312);
		$s->setMatchMode(SPH_MATCH_EXTENDED2);
		$s->SetLimits((int)$offset,
			// limit for this "page", starting at $offset
			(int)$NumberRec,
		// absolute limit for number of results
		((int)$NumberRec > $max_matches)
			? (int)$NumberRec
			: (int)$max_matches);
		if(strlen($location_rec)>2&&strlen($specicaly_rec)>0){
		$result = $s->Query("@ListUserId $UserId @location $location_rec  @(Requirement,Tags) $specicaly_rec");
		}else if(strlen($location_rec)>2){
			$result = $s->Query("@ListUserId $UserId @location $location_rec");
		}else if(strlen($specicaly_rec)>0){
			$result = $s->Query("@ListUserId $UserId @(Requirement,Tags) $specicaly_rec");
		}else{
			$result = $s->Query("@ListUserId $UserId");
		}
		
		$strTemp='';
		if ($result['total'] > $offset) {
			foreach ($result['matches'] as $id => $otherStuff) {
				$strTemp=$strTemp.','.$id;
			}
		}
		$strTemp =substr($strTemp,1);	
		if($strTemp != ''){
			$query = "
				SELECT job.JobName, job.Company, job.Location, job.Salary, job.Source 
				FROM job
				WHERE job.JobId IN (" .$strTemp.")
				ORDER BY job.ratepoint DESC, job.savepoint DESC
				limit $NumberRec offset $offset
			";
			$user_rec = mysql_query($query);
			$subject = ('Có '.mysql_num_rows($user_rec)).(' công việc giới thiệu cho bạn từ JRIT');
			if(mysql_num_rows($user_rec) > 0){
				$check =true;
				mysql_query("Update user_setting set last_update ='$time_run',offset ='$offset'+'$NumberRec' WHERE UserId='$UserId'");
				while ($row = mysql_fetch_array($user_rec)) {	
				$source=$row["Source"];
					$jobname=$row["JobName"];
					$company=$row["Company"];
					$location=$row["Location"];
					$salary=$row["Salary"];
					$body =$body."<div align='left' style='background: #fff; padding: 0px; margin-top: 15 ;margin-left: 20; line-height: 5'>
						<p style ='font-size: 16px; color: #424242; margin-top:5; line-height: 1'><a href='";
					$body =$body.$source; // src o day
					$body =$body."'>";
					$body =$body.$jobname; // ten cong viec
					$body =$body."</a></p> <p style ='font-size: 14px; color: #424242; line-height: 1'>";
					$body =$body.$company; // ten cong ty o day
					$body =$body."</p> <p style ='font-size: 14px; color: #424242; line-height: 1'>";
					$body =$body."Địa chỉ :"; 
					$body =$body.$location; // dia chi cong viec
					$body =$body."</p> <p style ='font-size: 14px; color: #424242; line-height: 1'>Mức lương :";
					$body =$body.$salary; // Luong o day
					$body =$body."</p> <HR/> </div>";
				}
				$body =$body."
						</div>
					</div>
					<div style='background: #304FFE; padding: 10px'>
						<div align='center' style='padding: 10px'>
							<p style='margin: 0 ; font-family: Arial, sans-serif; font-size: 14px; color: #fff; padding-bottom: 10px;'>
											Cảm ơn bạn đã sử dụng sản phẩm của chúng tôi</p>
							<p style='margin: 0; font-family: Arial, sans-serif; font-size: 14px; color: #fff'>
										cung cấp bởi JRIT</p>
						</div>
					</div>
					</div>
					</body>
					</html>";
				if($check){
					echo 'To :'.$to;
					echo '<HR/>';
					Send_Mail($to,$subject,$body);
				}
			}
			else{
					echo "Khong tim thay cong viec gioi thieu";
				}
		}else{
					echo "Khong tim thay cong viec gioi thieu";
		}
	}
}else{
	echo "Khong co ai de gui mail";
}
?>