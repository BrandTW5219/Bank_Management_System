<?php
	header("Content-Type:text/html; charset=utf8");
	mysqli_query("SET CHARACTER SET 'utf8'");
	mysqli_query("SET NAMES 'utf8'");

	$db_link = @mysqli_connect("localhost","root","C110151121") or die("MySQL伺服器連線失敗");
	$db_select = mysqli_select_db($db_link,"atm_data") or die("MySQL資料庫選擇失敗");

	session_start();
	$blocked = 1;
	$username = $_SESSION["useride"];

	$sql_str = "UPDATE `guest` SET `guest_block` = '$blocked' WHERE `guest_ide` = '$username'";
	$db_result = mysqli_query($db_link,$sql_str) or die("找不到資料或是輸入錯誤資料");
	$row_result = mysqli_fetch_row($db_result);

	echo '<script>';
	echo "window.location.href='mainpg.html'";
	echo '</script>';
?>
