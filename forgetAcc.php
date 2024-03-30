<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>找回帳戶密碼</title>
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
<center>
	<h1>帳戶密碼找回</h1>
	<h3><font color="#0000FF">請先驗證您的帳戶名稱、生日</font></h3>
	<form action="forgetAccLogin.php" method="post">
	<b>請輸入您的帳戶名稱：</b><input name="fgtName" type="text" placeholder="帳戶名稱" required="required">
	<br>
	<b>請輸入您的生日日期：</b><input name="fgtBirth" type="date" value="2000-01-01" required="required">
	<br><br>
	<input name="fgtSub" type="submit" value="驗證並查詢">
	<input name="fgtRet" type="reset" value="重填資料">
	</form>
	<br>
	<input type="button" value="返回首頁" onclick="Javascript:location.href='mainpg.html'">
</center>
</body>
</html>