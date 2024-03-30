<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>帳戶存款</title>
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
	echo '<b>'.$_SESSION["username"].'</b>'."您好，歡迎登入!".'<br>';
?>
<input type="button" value="登出系統" onclick="Javascript:location.href='mainpg.html'">
<center>
	<h1>帳戶存款服務</h1>
	<h3>請先輸入密碼進行二次驗證之後，才能存取服務</h3>
	<h3><font color="#FF0000">務必謹慎小心!如果輸入帳戶密碼錯誤達3次，將會導致鎖卡</font></h3>
	<form action="savingAccVer.php" method="post">
	請先輸入您的密碼：<input name="savingIde" id="savingIde" type="password" maxlength="10" minlength="10" placeholder="身分證字號" required="required">
	<input name="savingSub" id="savingSub" type="submit" value="確認密碼">
	<input name="savingRet" id="savingRet" type="reset" value="重新輸入">
<?php 
	if($_SESSION["isWrong"] == 0)
	{ 
		echo '<font color=#00FF00>'."已驗證完成".'</font>';
	}
	if($_SESSION["isWrong"] > 1 && $_SESSION["isWrong"] < 4)
	{
		$restChance = 4 - $_SESSION["isWrong"];
		echo '<font color=#FF0000>'."輸入錯誤，剩下".$restChance."次".'</font>';
	}
?>
	<hr>
	<br>
	</form>
	<form action="savingAccFinish.php" method="post">
	<b><font color="#1E90FF">單次存款金額以百為單位並不得高於兩萬元</font></b><br>
	請輸入存款金額：<input name="savingCash" id="savingCash" type="text" placeholder="僅限數字" required="required" oninput="value=value.replace(/[^\d]/g,'')" disabled>
	<br><br>
	<input name="savingDep" id="savingDep" type="submit" value="確認金額" disabled>
	<input name="savingBack" type="button" value="返回上頁" onclick="Javascript:location.href='savingAccIndex.php'">
	</form>
</center>
<?php
	if($_SESSION["isWrong"] == 0)
	{ 
?>
	<script>
	document.getElementById("savingIde").disabled = true;
	document.getElementById("savingSub").disabled = true;
	document.getElementById("savingRet").disabled = true;
	document.getElementById("savingCash").disabled = false;
	document.getElementById("savingDep").disabled = false;
	</script>
<?php
	}
	if($_SESSION["isWrong"] == 4)
	{
?>
	<script>
	alert("很抱歉，您已被鎖卡，Never gonna give you up");
	window.location.href="savingAccBlock.php";
	</script>	
<?php	
	}
?>

<?php
	if(time() - $_SESSION["usertime"] > 60)
	{
?>
	<script>
	alert("由於您已經發生閒置超過60秒，為確保安全，將重新導向登入頁面");
	window.location.href="savingAcc.php";
	</script>
<?php
	}
	$_SESSION["usertime"] = time();
?>
</body>
</html>