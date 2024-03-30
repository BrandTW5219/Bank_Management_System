<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>帳戶餘額查詢</title>
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
?>
<b><?php echo $_SESSION["username"]; ?></b>您好，歡迎登入!
<br>
<input name="savingLogout" type="button" value="登出系統" onclick="Javascript:location.href='mainpg.html'">
<center>
	<h1>帳戶餘額查詢</h1>
	<h3>如有相關疑慮可上官網 https://reurl.cc/GxL5Yd 反映給相關人員</h3>
	<hr>
	<b>您的帳戶狀態：</b>
<?php
	if($_SESSION["userblock"] == 0)
	{
		echo '<b><font color=#00FF00>'."使用正常".'</b></font>';
	}
	if($_SESSION["userblock"] == 1)
	{
		echo '<b><font color=#FF0000>'."遭到凍結".'</b></font>';
	}
?>
	<br>
	<b><font color="#000000">您的餘額目前為：NTD $<?php echo $_SESSION["userbalance"];?> 元</font></b>
	<br><br>
	<input name="checkLogout2" type="button" value="登出並返回首頁" onclick="Javascript:location.href='mainpg.html'">
</center>
</body>
</html>