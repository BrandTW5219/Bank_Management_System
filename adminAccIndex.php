<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>帳戶管理頁面</title>
<style>
        html 
	{
            height:100%;
        }
        body 
	{
            background-image:url(photograph/pic_admin.jpg);
            background-repeat:no-repeat;
            background-attachment:fixed;
            background-position:top;
            background-size:cover;
        }
</style>
</head>
<body>
<?php 
	session_start();
	echo '<b>'.$_SESSION["username"].'</b>'."您好，歡迎登入!".'<br>';
	//$_SESSION["usertime"] = time();
?>
<input name="chgLogout" type="button" value="登出系統" onclick="Javascript:location.href='mainpg.html'">
<center>
	<form action="changeAcc.php" method="post">
	<h1>帳戶資料管理</h1>
	<h3><font color="#FF0000">提醒您，重要個資如帳戶名稱、身分證號、用戶生日不提供更改功能</font></h3>
	帳戶名稱：<input name="chgName" type="text" value="<?php echo $_SESSION["username"] ?>" disabled>
	<br>
	身分證號：<input name="chgIde" type="text" value="<?php echo $_SESSION["useride"] ?>" disabled>
	<br>
	用戶生日：<input name="chgBirth" type="text" value="<?php echo $_SESSION["userbirth"] ?>" disabled>
	<br>
	電子郵件：<input name="chgEmail" type="email" value="<?php echo $_SESSION["useremail"] ?>">
	<br>
	行動電話：<input name="chgPhone" type="text" minlength="10" maxlength="10" value="<?php echo $_SESSION["userphone"] ?>">
	<br><br>
	<h3><b><font color="#00FF00">更改後請務必按下送出 (系統設有20秒的閒置保護時間)</font></b></h3>
	<input name="chgIslogout" type="hidden" value="<?php echo $isLogout; ?>">
	<input name="chgSub" type="submit" value="確定更改資料">
	<input name="chgRet" type="reset" value="取消更改">
	</form>
</center>
<?php
	if(time() - $_SESSION["usertime"] > 20)
	{
		$isLogout = 1;
?>
	<script>
	alert("您已經閒置超過20秒，請重新登入!");
	window.location.href = 'adminAcc.php';
	</script>
<?php
	}
	$_SESSION["usertime"] = time();
?>
</body>
</html>