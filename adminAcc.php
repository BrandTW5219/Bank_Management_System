<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>帳戶管理</title>
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
?>
<center>
	<h1>用戶帳戶管理</h1>
	<h3>請先登入您的帳戶<h3>
<?php
	if($_SESSION["isFail"] == 1)
		echo '<h3><font color=#FF0000>'."登入失敗，請重新輸入".'</font></h3>';
	if($_SESSION["isFail"] == 2)
		echo '<h3><font color=#FF0000>'."您遭到鎖卡，不得登入服務".'</font></h3>';
?>
	<form action="adminAccLogin.php" method="post">
	輸入帳戶姓名：<input name="adminName" type="text" placeholder="帳戶名稱" required="required">
	<br>
	輸入身分證號：<input name="adminIde" type="password" maxlength="10" minlength="10" placeholder="帳戶身分證字號" required="required">
	<br>
	<br>
	<input name="adminSub" type="submit" value="登入">
	<input name="adminRet" type="reset" value="重新輸入">
	<input name="adminFgt" type="button" value="忘記密碼了嗎?" onclick="Javascript:location.href='forgetAcc.php'">
	</form><br>
	<input type="button" value="返回首頁" onclick="Javascript:location.href='mainpg.html'">
</center>
<body>
</html>