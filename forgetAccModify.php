<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>密碼確認與變更</title>
<style>
        html 
	{
            height:100%;
        }
        body 
	{
            background-image:url(photograph/pic_forget.jpg);
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
	<h1>找回密碼</h1>
	<h3><b><?php echo $_SESSION["username"]; ?></b>，下次登入請務必牢記密碼</h3>
	<form action>
	您的名稱：<input name="modName" type="text" value="<?php echo $_SESSION["username"]; ?>" disabled>
	<br>
	您的生日：<input name="modBirth" type="text" value="<?php echo $_SESSION["userbirth"]; ?>" disabled>
	<br>
	<hr>
	您的密碼：<input name="modPass" id="modPass" type="password" value="<?php echo $_SESSION["userpass"]; ?>" disabled>
	<input name="modSearch" id="modSearch" type="button" value="檢視" onclick="return state()">
	<br><br>
	<input type="button" value="返回主頁面" onclick="Javascript:location.href='mainpg.html'">
</center>
	<script>
	var isCheck = 0;
	function state()
	{
		if(isCheck == 0)
		{
			isCheck = 1;
			document.getElementById("modPass").type="text";
			document.getElementById("modSearch").value="隱藏";
		}
		else
		{
			isCheck = 0;
			document.getElementById("modPass").type="password";
			document.getElementById("modSearch").value="檢視";
		}
	}
	</script>
</body>
</html>