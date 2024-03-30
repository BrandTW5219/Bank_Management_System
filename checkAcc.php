<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>帳戶提款與存款</title>
<style>
        html 
	{
            height:100%;
        }
        body 
	{
            background-image:url(photograph/pic_check.jpg);
            background-repeat:no-repeat;
            background-attachment:fixed;
            background-position:center;
            background-size:cover;
        }
</style>
</head>
<body>
<?php
	session_start();
	unset($_SESSION["useride"]);
?>
<center>
	<h1>帳戶餘額查詢</h1>
	<h3>請先登入系統</h3>
	<form action="checkAccLogin.php" method="post">
	帳戶名稱：<input name="checkName" type="text" placeholder="您的帳戶名稱" required="required">
	<br>
	帳戶密碼：<input name="checkIde" type="password" minlength="10" maxlength="10" placeholder="您的身分證字號" required="required">
	<br><br>
	<input name="checkSub" type="submit" value="登入系統">
	<input name="checkRet" type="reset" value="重新輸入">
	<input name="checkFgt" type="button" value="忘記密碼了嗎?" onclick="Javascript:location.href='forgetAcc.php'">
	</form>
	<br>
	<input type="button" value="返回首頁" onclick="Javascript:location.href='mainpg.html'">
</center>
</body>
</html>