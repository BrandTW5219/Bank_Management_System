<?php
	header("Refresh: 3; url=mainpg.html");
	header("Content-Type:text/html; charset=utf8");
	mysqli_query("SET CHARACTER SET 'utf8'");
	mysqli_query("SET NAMES 'utf8'");

	$db_link = @mysqli_connect("localhost","root","C110151121") or die("MySQL伺服器連線失敗");
	$db_select = mysqli_select_db($db_link,"atm_data") or die("MySQL資料庫選擇失敗");

	$gname = $_POST['userName'];
	$gide = $_POST['userIde'];
	$gbirth = $_POST['userBirth'];
	$gemail = $_POST['userEmail'];
	$gphone = $_POST['userPhone'];
	$gbal = 0;

	$sql_str = "INSERT INTO `guest` (`guest_name`,`guest_ide`,`guest_birth`,`guest_email`,`guest_phone`,`guest_balance`) VALUES ('$gname','$gide','$gbirth','$gemail','$gphone','$gbalance')";
	$db_result = mysqli_query($db_link,$sql_str) or die("MySQL語法錯誤");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>帳戶創建成功</title>
</head>
<body>
<center>
	<h1>您的帳戶已建立成功</h1>
	<h3>等待3秒鐘後將跳轉至首頁即可登入</h3>
	<h3><font color="#FF0000">提醒您，請務必牢記您的帳戶密碼</font></h3>
</center>
</body>
</html>