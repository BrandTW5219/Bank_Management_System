<?php
	
	header("Content-Type:text/html; charset=utf8");
	mysqli_query("SET CHARACTER SET 'utf8'");
	mysqli_query("SET NAMES 'utf8'");

	session_start();
	if($_POST['chgIslogout'] == 1)
	{
?>
	<script>
	alert("您剛剛發生閒置超過20秒，為確保安全性，須請您重新登入!");
	window.location.href = 'mainpg.html';
	</script>
<?php
	}
	else
	{
		$cid = $_SESSION["userid"];
		$cname = $_POST['chgName'];
		$cide = $_POST['chgIde'];
		$cbirth = $_POST['chgBirth'];
		$cemail = $_POST['chgEmail'];	
		$cphone = $_POST['chgPhone'];

		$db_link = @mysqli_connect("localhost","root","C110151121") or die("MySQL伺服器連線失敗");
		$db_select = mysqli_select_db($db_link,"atm_data") or die("MySQL資料庫選擇失敗");
		$sql_str = "UPDATE `guest` SET `guest_email` = '$cemail',`guest_phone` = '$cphone' WHERE `guest_id` = '$cid'";
		$db_result = mysqli_query($db_link,$sql_str) or die("MySQL語法錯誤");
?>
	<script>
	alert("已成功修改您的帳戶資料，重新登入即可生效!");
	window.location.href = 'mainpg.html';
	</script>
<?php
	}
?>