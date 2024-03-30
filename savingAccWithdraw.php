<?php
	sleep(3);
	header("Content-Type:text/html; charset=utf8");
	mysqli_query("SET CHARACTER SET 'utf8'");
	mysqli_query("SET NAMES 'utf8'");

	$db_link = @mysqli_connect("localhost","root","C110151121") or die("MySQL伺服器連線失敗");
	$db_select = mysqli_select_db($db_link,"atm_data") or die("MySQL資料庫選擇失敗");

	session_start();
	$wcash = $_POST['takingCash'];
	$wide = $_SESSION["useride"];

	if($wcash > 0 && $wcash <= 20000 && $wcash % 1000 == 0)
	{
		$sql_str = "SELECT * FROM `guest` WHERE `guest_ide` = '$wide'";
		$db_result = mysqli_query($db_link,$sql_str) or die("找不到資料或是輸入錯誤資料");
		$row_result = mysqli_fetch_row($db_result);
		$wbal = $row_result[6];
		$wbal -= $wcash;
		if($wbal >= 0)
		{
			$sql_str = "UPDATE `guest` SET `guest_balance` = '$wbal' WHERE `guest_ide` = '$wide'";
			$db_result = mysqli_query($db_link,$sql_str) or die("找不到資料或是輸入錯誤資料");
		}
		else
		{
?>
			<script>
			alert("您的餘額不足，提款手續失敗。請先確認餘額後再操作，謝謝!");
			window.location.href="mainpg.html";
			</script>
<?php
		}
?>
	<script>
	alert("提款手續完成");
	window.location.href="mainpg.html";
	</script>
<?php
	}
	else
	{
?>
	<script>
	alert("金額不合規範，提款手續失敗，請重新操作");
	window.location.href="mainpg.html";
	</script>
<?php
	}
?>