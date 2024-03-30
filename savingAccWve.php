<?php
	sleep(2);
	session_start();
	$tide = $_POST["takingIde"];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>帳戶密碼驗證系統</title>
</head>
<body>	
<?php 
	if($tide == $_SESSION["useride"])
	{
		$_SESSION["isWrong"] = 0;
		echo '<script>'."window.location.href='savingAccWit.php'".'</script>';
	}
	else
	{
		$_SESSION["isWrong"] += 1;
		echo '<script>'."window.location.href='savingAccWit.php'".'</script>';
	}
?>
</body>
</html>