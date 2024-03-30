<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>帳戶存款與提款</title>
<style>
        html 
	{
            height:100%;
        }
        body 
	{
            background-image:url(photograph/pic_cash.jpg);
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
	$_SESSION["isWrong"] = 1;
?>
<b><?php echo $_SESSION["username"]; ?></b>您好，歡迎登入!
<br>
<input name="savingLogout" type="button" value="登出系統" onclick="Javascript:location.href='mainpg.html'">
<center>
	<h1>帳戶存款/提款</h1>
	<h3>請選擇執行功能</h3>
	<b><font color="#FF0000">您的餘額目前為：NTD $<?php echo $_SESSION["userbalance"];?> 元</font></b>
	<hr>
	<input type="button" value="存款" onclick="Javascript:location.href='savingAccDep.php'">
	<input type="button" value="提款" onclick="Javascript:location.href='savingAccWit.php'">
	<br>
	<h3><font color="#0000FF">注意!本系統設有20秒閒置保護</font></h3>
</center>
<?php
	if(time() - $_SESSION["usertime"] > 20)
	{
?>
	<script>
	alert("由於您已經閒置超過20秒，為確保安全，將重新導向登入頁面");
	window.location.href="savingAcc.php";
	</script>
<?php
	}
	$_SESSION["usertime"] = time();
?>
</body>
</html>