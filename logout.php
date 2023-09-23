<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body background="image\back.png" style=" background-attachment: fixed; background-size: cover; margin-top: 30px;text-align: center;">
<?php
	session_start();
	if (isset($_SESSION['UserFullName'])){
		session_destroy();
		echo "<h1 style='color:white;'>Logout successfull. Redirect to home page in 3 seconds. <br>Click <a href='index.php'>here</a> if no response.</h1>";
		header('Refresh: 2; index.php');
	}
?>
</body>
</html>
