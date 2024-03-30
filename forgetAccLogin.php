<?php
	sleep(2);
	header("Content-Type:text/html; charset=utf8");
	mysqli_query("SET CHARACTER SET 'utf8'");
	mysqli_query("SET NAMES 'utf8'");

	$db_link = @mysqli_connect("localhost","root","C110151121") or die("MySQL伺服器連線失敗");
	$db_select = mysqli_select_db($db_link,"atm_data") or die("MySQL資料庫選擇失敗");

	$fname = $_POST['fgtName'];
	$fbirth = $_POST['fgtBirth'];

	$sql_str = "SELECT * FROM `guest` WHERE `guest_name` = '$fname' AND `guest_birth` = '$fbirth'";
	$db_result = mysqli_query($db_link,$sql_str) or die("找不到資料或是輸入錯誤資料");
	$row_result = mysqli_fetch_row($db_result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>帳戶驗證與搜尋中</title>
</head>
<body>
<?php 
	if($row_result[1] == $fname && $row_result[3] == $fbirth)
	{
		session_start();
		$_SESSION["username"] = $row_result[1];
		$_SESSION["userpass"] = $row_result[2];
		$_SESSION["userbirth"] = $row_result[3];
?>
	<script>
	alert("驗證成功，即將進入密碼確認頁面");
	window.location.href="forgetAccModify.php";
	</script>
<?php
	}
	else
	{
?>
	<script>
	alert("驗證失敗，即將重回選單");
	window.location.href="forgetAcc.php";
	</script>
<?php
	}
?>
</body>
</html>