<?php
	//Connect database
	include "config.php";
	
	
	//Read session
	include 'session.php';
	$uid=$_SESSION['UserID'];
	if($uid=='' || $uid==null){
		$message="Please login to continue";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("Refresh: 0, login_register.php");
	}
	include "header.php";
	include "footer.php";
	//To change password
	if (isset($_POST['change'])) {
		$passori = $_POST['original'];
		$passnew = $_POST['new'];
		$passre = $_POST['reenter'];

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		

		//check password reconfirmation
		if (strcmp($passre, $passnew)!==0){
			$message="New password and re-enter password is not same. Please try again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else{
			//read original password
			$read_ori = "SELECT UserPassword FROM user_details WHERE UserID='$uid'";
			$result_read_ori = mysqli_query($conn, $read_ori);
			//compare entered original password and password in database
			if($result_read_ori){
				while($row = mysqli_fetch_array($result_read_ori, MYSQLI_ASSOC)){
					$upass=$row['UserPassword'];
					//If not same, change password fail
					if (strcmp($passori, $upass)!==0){
						$message="Original password is incorrect. Please try again.";
						echo "<script type='text/javascript'>alert('$message');</script>";
					}
					//If same, procees with change password
					else{
						$update_password = "UPDATE user_details SET UserPassword='$passre' WHERE UserID='$uid'";
						$result_update_password = mysqli_query($conn, $update_password);
						if ($result_update_password){
							$message="Change password success.";
							echo "<script type='text/javascript'>alert('$message');</script>";
						}
						else{
							$message="Fail to change password. Please try again.";
							echo "<script type='text/javascript'>alert('$message');</script>";
						}
					}
				}	
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		form{
			margin-left: 60px;
			margin-top: 15px;
			margin-right: 60px;
			margin-bottom: 100px;
		}
		table{
			color:white;
			min-width: 550px;
			max-width: 800px;
			margin-top:50px;
			margin-bottom:50px;
			margin-left:auto;
			margin-right:auto;
			background: rgba(67, 9, 124, 0.3);
			padding: 30px;
			min-height: 400px;
			border:none;
			border-radius:20px;
			box-shadow: 0 30px 40px 10px rgba(0, 0, 0, 0.8);
			transition: 0.3s;
		}
		table:hover{
			box-shadow: 
			0px 1px 2px 0px rgba(0,255,255,0.7),
			1px 2px 4px 0px rgba(0,255,255,0.7),
			2px 4px 8px 0px rgba(255,0,0,0.7),
			2px 4px 16px 0px rgba(255,0,0,0.7);
			
		}
		th{
			font-size: 28px;
			text-align: center;
			padding-top: 20px ;
			width: 50%;
			text-decoration: underline;
		}

		input[type=submit], input[type=reset]{
			padding: 10px;
			color: white;
			border:none;
			border-radius: 20px;
			background-color: #401F83;
			font-family: 'Righteous';
			font-size: 20px;
			text-align: center;
			width: 120px;
		}
		input[type=submit]:hover, input[type=reset]:hover{
			background-color: #6f42c1;
		}
		td, input[type=password]{
			outline:none;
			color: white;
			background-color: transparent;
			padding: 5px;
			text-align: center;
			border-style: none;
			font-size: 22px;
			font-family: 'Righteous';
			width: 60%;
		}
		
		::placeholder {
  color: white;
  opacity: 0.2;
}
		hr{
			
			border-bottom: none;
			border-left: none;
			border-right: none;
			width: 100%;
			padding-top: 10px
		}
	</style>
</head>
<body background="image\back.png" style="background-size:cover; background-attachment: fixed;">
	<form action="change_password.php" method="POST">
		<table>
			<tr>
				<th>Change Password</th>
			</tr>
			<tr>
				<td>
					<hr>
					<input type="password" name="original" placeholder="Original Password" style="border-bottom: 2px solid #66CDAA;" required>
					<br><br>
					<input type="password" name="new" placeholder="New Password" style="border-bottom: 2px solid rgba(0,255,255,0.7);" minlength="8" maxlength="12" required>
					<br><br>
					<input type="password" name="reenter" placeholder="Re-enter New Password" style="border-bottom: 2px solid #401F83;";  required>
					<br><br><br>
					<input type="submit" name="change" value="Save">&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="reset" name="cancel" value="Reset">
				</td>
			</tr>
		</table>
	</form>

</body>
</html>