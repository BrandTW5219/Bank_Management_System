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
            background-image:url(photograph/pic_manage.jpg);
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
	$_SESSION["isFail"] = 0;
?>
<center>
	<h1>客戶帳戶開戶與帳戶管理</h1>
	<h3>請選擇以下功能</h3>
	<input name="accNew" type="submit" value="新戶開戶" onclick="Javascript:location.href='newAcc.php'">
	<input name="accAdmin" type="submit" value="帳戶管理" onclick="Javascript:location.href='adminAcc.php'">
	<br><br>
	<input name="mainBack" type="submit" value="返回首頁" onclick="Javascript:location.href='mainpg.html'">
</center>
</body>
</html>