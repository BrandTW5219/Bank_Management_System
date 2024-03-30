<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>帳戶開戶</title>
<style>
        html 
	{
            height: 100%;
        }
        body 
	{
            background-image: url(photograph/pic_new.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
        }
</style>
</head>
<body>
<center>
	<h1>新戶開戶</h1>
	<h3><font color="#FF0000">請填妥所有資料，並需驗證年齡</font><h3>
	<form name="newacc" action="newAccCreated.php" method="post">
	<b>帳戶名稱使用：</b><input name="userName" type="text" placeholder="僅限繁體中文" required="required">
	<br>
	<b>用戶身分證號：</b><input name="userIde" type="text" minlength="10" maxlength="10" placeholder="身分證字號10碼" required="required">
	<br>
	<b>用戶生日日期：</b><input name="userBirth" id="ageVer" type="date" value="2000-01-01" required="required"> <input name="verifyAge" type="button" value="驗證年齡" onclick="return findAge()">
<script>
	function findAge()
	{
		var strBirth = document.getElementById('ageVer').value;
		var nowDate = new Date();
		var birthDate = new Date(strBirth);
		var gAge = nowDate.getFullYear() - birthDate.getFullYear();
		
		if(gAge < 20 || gAge > 99)
		{
			alert("您未滿20歲，依法不得開戶");
			newBtn.disabled = true;
		}
		else
		{
			alert("驗證成功");
			newBtn.disabled = false;
		}
	}
</script>
	<br>
	<b>用戶電子郵件：</b><input name="userEmail" type="email" placeholder="example@email.idv" required="required">
	<br>
	<b>用戶手機號碼：</b><input name="userPhone" type="text"  minlength="10" maxlength="10" placeholder="行動手機號碼09開頭" required="required">
	<br>
	<br>
	<input name="newaccsub" id="newSub" type="submit" value="確定送出資料">
<script>
	var newBtn = document.getElementById("newSub");
	newBtn.disabled = true;
</script>
	<input name="newaccclear" type="reset" value="清除所有欄位">
	</form>
	<br>
	<input name="newaccback" type="submit" value="返回首頁" onclick="Javascript:location.href='mainpg.html'">
</center>
</body>
</html>