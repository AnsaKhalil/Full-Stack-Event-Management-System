<?php
	//Connect database
	include "config.php";

	include "footer.php";
	
	//Read session
	include 'session.php';
	$uid=$_SESSION['UserID'];
	if($uid=='' || $uid==null){
		$message="Please login to continue";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("Refresh: 0, login_register.php");
	}

	//header
	include "header.php";

	//Read button script
	include "top_button.html";

	//edit profile picture
	if(isset($_POST['editpicture'])){
		//mySQL (Object-oriented)
		$conn = new mysqli($servername, $username, $password, $dbname);
		//get uploaded image
		$newpicture=addslashes(file_get_contents($_FILES['picture']['tmp_name']));
		//get uploaded image name
		$newpicture_name=$_FILES['picture']['name'];
		if($newpicture==false){
			echo "<script>alert('Empty field. No update made.')</script>";		
		}
		else{
			$update_picture = "UPDATE user_details SET UserImage='".$newpicture."' WHERE UserID='$uid'";
			$result_update_picture = $conn->query($update_picture); 
			$update_picture_name = "UPDATE user_details SET UserImageName='".$newpicture_name."' WHERE UserID='$uid'";
			$result_update_picture_name = $conn->query($update_picture_name); 
			if($result_update_picture==true)
			{
				$message="Update profile picture success.";
				echo "<script type='text/javascript'>alert('$message');</script>";
				header("Refresh: 0, my_profile.php");				
			}
			else
			{
				$message="Fail to update profile picture. Please try again.";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
		}
	}	
	//edit profile name	
	if(isset($_POST['editname'])){
		$newname=$_POST['username'];
		$update_name = "UPDATE user_details SET UserFullName='$newname' WHERE UserID='$uid'";
		$result_update_name = mysqli_query($conn, $update_name);
		if($result_update_name){
			$_SESSION['UserFullName']=$newname;
			$message="Update name success.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header("Refresh: 0, my_profile.php");
		}
		else{
			$message="Fail to update name. Please try again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}
	//edit profile email
	else if(isset($_POST['editemail'])){
		$newemail=$_POST['email'];
		$update_email = "UPDATE user_details SET UserEmail='$newemail' WHERE UserID='$uid'";
		$result_update_email = mysqli_query($conn, $update_email);
		if($result_update_email){
			$message="Update e-mail success.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header("Refresh: 0, my_profile.php");
		}
		else{
			$message="Fail to update e-mail. Please try again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>TARUC Events - Edit Event</title>
	<style type="text/css">
		form{
			margin-left: 60px;
			margin-top: 15px;
			margin-right: 60px;
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
		}
		td, input[type=text], input[type=email]{
			font-family: 'Righteous';
			font-size: 22px;
			text-align: center;
			padding-top: 2px ;
			padding-bottom: 2px ;
		}
		input[type=text], input[type=email]{
			background: rgba(214, 58, 98, 0.39);
    		box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    		backdrop-filter: blur(7.6px);
			outline-color:red;
			border-radius:20px;
			border:none;
			color:white;
			}
		input[type=file]{
			font-family: 'Righteous';
			font-size: 16px;
			text-align: center;
			padding-top: 2px;
			padding-bottom: 2px;
			cursor:pointer;
		}
		input[type=submit], input[type=reset], input[type=button]{
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
		input[type=submit]:hover, input[type=reset]:hover, input[type=button]:hover{
			background-color: #6f42c1;
		}
	</style>
</head>
<body background="image\back.png" style="background-size:cover; background-attachment: fixed;">

	<button onclick="topFunction()" id="myBtn" title="Go to top"></button>
	<div id="epicture">
		<form action="edit_profile.php" method="POST" enctype="multipart/form-data">
			<table align="center" cellspacing="20px">
				<tr><th style="text-decoration: underline;"> >>> Edit Profile Picture <<< </th></tr>
				<tr><td><img src="image/divide.jpg" height="40%" width="100%" style="opacity: 0.6"></td></tr>
				<tr><td>New Profile Picture: <input type="file" name="picture" required></td></tr>
				<tr><td colspan="2"><input type="submit" name="editpicture" value="Save">&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="reset" name="cancel" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="button" name="back" value="Back" onclick="document.location='my_profile.php'"></td></tr>
			</table>
		</form>
	</div>
	<hr width="auto" size="10" style="background: #401F83">
	<div id="ename">
		<form action="edit_profile.php" method="POST">
			<table align="center" cellspacing="20px">
				<tr><th style="text-decoration: underline;"> >>> Edit Name <<< </th></tr>
				<tr><td><img src="image/divide.jpg" height="40%" width="100%" style="opacity: 0.6"></td></tr>
				<tr><td>New Name: <input type="text" name="username" size="30" required ></tr>
				<tr><td colspan="2"><input type="submit" name="editname" value="Save">&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="reset" name="cancel" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="button" name="back" value="Back" onclick="document.location='my_profile.php'"></td></tr>
			</table>
		</form>
	</div>
	<hr width="auto" size="10" style="background: #401F83">
	<div id="eemail">
		<form action="edit_profile.php" method="POST">
			<table align="center" cellspacing="20px">
				<tr><th style="text-decoration: underline;"> >>> Edit E-mail <<< </th></tr>
				<tr><td><img src="image/divide.jpg" height="40%" width="100%" style="opacity: 0.6"></td></tr>
				<tr><td>New E-mail: <input type="email" name="email" size="30" required ></tr>
				<tr><td colspan="2"><input type="submit" name="editemail" value="Save">&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="reset" name="cancel" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="button" name="back" value="Back" onclick="document.location='my_profile.php'"></td></tr>
						
			</table>
		</form>
	</div>
</body>
</html>