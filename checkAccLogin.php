<?php
	sleep(2);
	header("Content-Type:text/html; charset=utf8");
	mysqli_query("SET CHARACTER SET 'utf8'");
	mysqli_query("SET NAMES 'utf8'");

	$db_link = @mysqli_connect("localhost","root","C110151121") or die("MySQL伺服器連線失敗");
	$db_select = mysqli_select_db($db_link,"atm_data") or die("MySQL資料庫選擇失敗");

	$cname = $_POST["checkName"];
	$cide = $_POST["checkIde"];

	$sql_str = "SELECT * FROM `guest` WHERE `guest_name` = '$cname' AND `guest_ide` = '$cide'";
	$db_result = mysqli_query($db_link,$sql_str) or die("找不到資料或是輸入錯誤資料");
	$row_result = mysqli_fetch_row($db_result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>帳戶驗證中</title>
</head>
<body>
<?php 
	if($row_result[1] == $cname && $row_result[2] == $cide)
	{
		session_start();
		$_SESSION["usertime"] = time();
		$_SESSION["username"] = $row_result[1];
		$_SESSION["useride"] = $row_result[2];
		$_SESSION["userbalance"] = $row_result[6];
		$_SESSION["userblock"] = $row_result[7];
?>
	<script>
	alert("驗證成功，即將登入系統");
	window.location.href="checkAccIndex.php";
	</script>
<?php
	}
	else
	{
?>
	<script>
	alert("驗證失敗，即將返回選單");
	window.location.href="checkAcc.php";
	</script>
<?php
	}
?>
</body>
</html>