<?php
//Connect database
include "config.php";
include "session.php";
include "header.php";
include "top_button.html";

	//Read session
	
	$uid=$_SESSION['UserID'];
	if($uid=='' || $uid==null){
		$message="Please login to continue";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("Refresh: 0, login_register.php");
	}

	//input
		//Manage user
		if (isset($_POST['adduser'])) {
			header('Refresh: 0; add_user.php');
		}
		else if (isset($_POST['edituser'])) {
			header('Refresh: 0; edit_user.php');
		}
		else if (isset($_POST['deleteuser'])) {
			header('Refresh: 0; delete_user.php');
		}
		else if (isset($_POST['viewuser'])) {
			header('Refresh: 0; view_user.php');
		}
		//Manage Event
		else if (isset($_POST['addevent'])) {
			header('Refresh: 0; create.php');
		}
		else if (isset($_POST['editevent'])) {
			header('Refresh: 0; edit.php');
		}
		else if (isset($_POST['deleteevent'])) {
			header('Refresh: 0; delete.php');
		}
		else if (isset($_POST['viewevent'])) {
			header('Refresh: 0; view.php');
		}
?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
	<style type="text/css">

		form{
			margin-left: 60px;
			margin-top: 15px;
			margin-right: 60px;
			background: rgba(67, 9, 124, 0.3);
			padding: 50px;
			box-shadow: 0 30px 40px 10px rgba(0, 0, 0, 0.8);
			transition: 0.3s;
			border-radius:20px;
		}
		form:hover{
			box-shadow: 
			0px 1px 2px 0px rgba(0,255,255,0.7),
			1px 2px 4px 0px rgba(0,255,255,0.7),
			2px 4px 8px 0px rgba(255,0,0,0.7),
			2px 4px 16px 0px rgba(255,0,0,0.7);
		}

		input[type=submit]{
			padding: 10px;
			color: white;
			border: none;
			background-color: #401F83;
			font-weight: 100;
			font-family: 'Righteous';
			font-size: 28px;
			text-align: center;
			width: 150px;
			border-radius:30px;
		}
		input[type=submit]:hover{
			background-color: #6f42c1;
		}

		table{
			color:white;
			font-size: 28px;
			font-family:'Righteous';
			width: 850px;
			text-align: center;
			max-width: 1200px;
			margin-bottom:50px;
			margin-left:auto;
			margin-right:auto;
			background-color: white;
			background: transparent;
			text-align:center;
			padding-top: 10px;
			padding-left: 20px;
			padding-right: 20px;
			
		}
	</style>
	</head>
<body background="image\back.png" style=" background-attachment: fixed; background-size: cover;">
<button onclick="topFunction()" id="myBtn" title="Go to top"></button>
	<hr width="auto" size="10" style="background: #401F83; margin-top:100px;"><br>
	<form action="" method="POST">
		<table align="center" cellspacing="20px">
			<tr>
				<td colspan="5" style="text-decoration: underline;font-size: 30px;">Admin Management</td>
			</tr>
		</table>
		<table align="center" cellspacing="20px" style="border-bottom: 2px solid rgba(0,255,255,0.7)">
			<tr>
				<td width="300px">User:</td>
				<td><input type="submit" name="adduser" value="Add"></td>
				<td><input type="submit" name="edituser" value="Edit"></td>
				<td><input type="submit" name="deleteuser" value="Delete"></td>
				<td><input type="submit" name="viewuser" value="View"></td>
			</tr>
		</table>
		<table align="center" cellspacing="20px" style="border-bottom: 2px solid rgba(0,255,255,0.7)">
			<tr>
				<td width="300px">Event:</td>
				<td><input type="submit" name="addevent" value="Add"></td>
				<td><input type="submit" name="editevent" value="Edit"></td>
				<td><input type="submit" name="deleteevent" value="Delete"></td>
				<td><input type="submit" name="viewevent" value="View"></td>
			</tr>
		</table>
	</form>
		<br><hr width="auto" size="10" style="background: #401F83; margin-bottom:100px;">
</body>
<?php 
include "footer.php";
?>
</html>