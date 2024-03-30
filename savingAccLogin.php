<?php
	sleep(2);
	header("Content-Type:text/html; charset=utf8");
	mysqli_query("SET CHARACTER SET 'utf8'");
	mysqli_query("SET NAMES 'utf8'");

	$db_link = @mysqli_connect("localhost","root","C110151121") or die("MySQL伺服器連線失敗");
	$db_select = mysqli_select_db($db_link,"atm_data") or die("MySQL資料庫選擇失敗");

	$sname = $_POST["saveName"];
	$side = $_POST["saveIde"];

	$sql_str = "SELECT * FROM `guest` WHERE `guest_name` = '$sname' AND `guest_ide` = '$side'";
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
	if($row_result[1] == $sname && $row_result[2] == $side && $row_result[7] == 0)
	{
		session_start();
		$_SESSION["usertime"] = time();
		$_SESSION["username"] = $row_result[1];
		$_SESSION["useride"] = $row_result[2];
		$_SESSION["userbalance"] = $row_result[6];
?>
	<script>
	alert("驗證成功，即將登入系統");
	window.location.href="savingAccIndex.php";
	</script>
<?php
	}
	else
	{
		if($row_result[7] == 0)
		{
?>
		<script>
		alert("驗證失敗，即將返回選單");
		window.location.href="savingAcc.php";
		</script>
<?php
		}
		else
		{
?>
		<script>
		alert("驗證失敗，您目前為鎖卡狀態");
		window.location.href="mainpg.html";
		</script>
<?php
		}
	}
?>
</body>
</html>