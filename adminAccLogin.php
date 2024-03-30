<?php
	sleep(3);
	header("Content-Type:text/html; charset=utf8");
	mysqli_query("SET CHARACTER SET 'utf8'");
	mysqli_query("SET NAMES 'utf8'");

	$db_link = @mysqli_connect("localhost","root","C110151121") or die("MySQL伺服器連線失敗");
	$db_select = mysqli_select_db($db_link,"atm_data") or die("MySQL資料庫選擇失敗");

	$aname = $_POST["adminName"];
	$aide = $_POST["adminIde"];

	$sql_str = "SELECT * FROM `guest` WHERE `guest_name` = '$aname' AND `guest_ide` = '$aide'";
	$db_result = mysqli_query($db_link,$sql_str) or die("找不到資料或是輸入錯誤資料");
	$row_result = mysqli_fetch_row($db_result);

	session_start();

	if($row_result[1] == $aname && $row_result[2] == $aide && $row_result[7] == 0)
	{
		echo "登入成功";
		$_SESSION["userid"] = $row_result[0];
		$_SESSION["username"] = $aname;
		$_SESSION["useride"] = $aide;
		$_SESSION["userbirth"] = $row_result[3];
		$_SESSION["useremail"] = $row_result[4];
		$_SESSION["userphone"] = $row_result[5];
		$_SESSION["usertime"] = time();
		
		echo "<script>";
		echo "Javascript:location.href='adminAccIndex.php'";
		echo "</script>";
	}
	else
	{
		if($row_result[7] == 0)
		{
			echo "登入失敗，請在3秒鐘後重試，並檢查輸入資料正確性";
			$_SESSION["isFail"] = 1;
			echo "<script>";
			echo "Javascript:location.href='adminAcc.php'";
			echo "</script>";
		}
		else
		{
			echo "您遭到鎖卡，不得登入服務";
			$_SESSION["isFail"] = 2;
			echo "<script>";
			echo "Javascript:location.href='adminAcc.php'";
			echo "</script>";
		}
	}
?>