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
	//Read button script
	include "top_button.html";
	include "footer.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
    /* body styling */

.input-group{
    color:white;
width: 250px;
font-family: 'Righteous';
border-style: none;
font-size: 20px;
margin-top: 10px;
border: none;
background-color: transparent;
outline: none;
text-align: center;
}
.row-cols-1{
margin-top: 70px;
margin-left: 40px;
margin-right: 40px;
}
.card{
color:white;
font-family:'Righteous';
border:none;
box-shadow: 0 30px 40px 10px rgba(0, 0, 0, 0.8);
transition: 0.3s;
backdrop-filter: blur(3.3px);
background: rgba(67, 9, 124, 0.3);
border-radius:20px;
width:100%;

}
.card:hover {
box-shadow: 
0px 1px 2px 0px rgba(0,255,255,0.7),
1px 2px 4px 0px rgba(0,255,255,0.7),
2px 4px 8px 0px rgba(255,0,0,0.7),
2px 4px 16px 0px rgba(255,0,0,0.7);
border-radius:20px;
cursor: pointer;
width:101%;

}
.card-body{
color:white;
background-color:transparent;
border-bottom-left-radius: 20px;
border-bottom-right-radius: 20px;
}
.col{
margin-bottom: 50px;
}
.card-img-top{
border-top-left-radius: 20px;
border-top-right-radius: 20px;
}
.sear{
padding: 12px;
color: white;
border: none;
border-radius: 50px;
background-color: #401F83;

font-family: 'Righteous';
font-size: 17px;
text-align: center;
width: 100px;
}
.sear:hover{
background-color: #6f42c1;
width: 101px;
}
.searchin {
    background: rgba(214, 58, 98, 0.39);
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(7.6px);
outline-color:red;
border:none;
border-radius:30px;
font-size: 16px;
padding: 10px;
width:50%;
}
.btn{
padding: 12px;
color: white;
border: none;
border-radius: 50px;
background-color: #401F83;
font-family: 'Righteous';
font-size: 16px;
text-align: center;
width: auto;
}
.btn:hover{
background-color: #6f42c1;
font-size: 16px;
padding: 12px;
width: auto;
color: white;
border: none;
border-radius: 50px;
font-family: 'Righteous';
text-align: center;
}
/* navbar styling */
.navbar-brand{
color: white;
padding: 10px 30px;
border-radius: 10px;
font-size:17px;
transition: all .3s ease-in-out;
font-family: 'Righteous';
}
.navbar-brand:hover{
color:white;
padding: 10px 30px;
border-radius: 10px;
font-size:17px;
background-color:#6f42c1;
}
.container-fluid{
margin-top:40px;
text-align: center;
}
.fullname{
margin-bottom:40px;
text-align: center;
font-size:25px; 
color:white;
padding: 10px 30px;
background-color:transparent;
border-radius: 10px;
transition: all .3s ease-in-out;
font-family: 'Righteous';
}
.fullname:hover{
background-color:black;
}
.full{
font-family: 'Righteous';
margin-bottom:40px;
text-align: center;
font-size:18px; 
color:white;
padding: 10px 30px;
background-color:transparent;
border-radius: 10px;
width:120%;
transition: all .3s ease-in-out;
}
.full:hover{
background-color:black;
}

.container {
padding-right: 15px;
padding-left: 15px;
margin-right: auto;
margin-left: auto;
}

.col-md-10, .col-md-offset-1{
position: relative;
min-height: 1px;
padding-right: 15px;
padding-left: 225px;
}

.banner .banner-caption {
padding: 50px;
text-align:center;
}

.banner .banner-caption h2 {
margin-top: 20px;
margin-bottom: 20px;
font-size: 42px;
letter-spacing: 0.5px;
color: #fff;
font-family: 'Righteous';
}

/* body styling */

.top{
  width: 100%;
  font-size: 80px;
  color: #ffffff;
  font-weight: bold;
  text-align: center;
  text-transform: uppercase;
  font-family: 'Righteous';
  }

  form{
			margin-left: 60px;
			margin-top: 100px;
			margin-right: 60px;
			margin-bottom: 100px;
			background:transparent;
		}

</style>

<style>

table{
	color:white;
			min-width: 550px;
			max-width: 800px;
			margin-top:50px;
			margin-bottom:50px;
			margin-left:auto;
			margin-right:auto;
			background-color: transparent;
			padding: 30px;
			min-height: 400px;
		}
		th{
			color:white;
			font-size: 30px;
			text-align: center;
			text-decoration: underline;
			padding-bottom: 5px;
		}
		.dropdown{
			display: inline-block;
			position: relative;
			
		}
		.dropdown-content{
			display: none;
			position: absolute;
			border-radius: 10px;
			z-index: 1;
			box-shadow: 
0px 1px 2px 0px rgba(0,255,255,0.7),
1px 2px 4px 0px rgba(0,255,255,0.7),
2px 4px 8px 0px rgba(255,0,0,0.7),
2px 4px 16px 0px rgba(255,0,0,0.7);
			padding: 5px;
		}
		.dropdown-button{
			color:white;
			display: inline-block;
			border-radius: 5px;
			width: 100%;
			padding: 5px;
			font-family: 'Righteous';
			font-size: 18px;
			background: #401F83;
			border-top: none;
			border-left: none;
			border-right: none;
			border-bottom: 2px rgba(0,255,255,0.7) solid;
		}
		.dropdown-button:hover{
			background-color: #6f42c1;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
	        $(".dropdown").mouseleave(function(){
	        	$(".dropdown-content").hide();
	        });
	    });
		$(document).ready(function(){
	        $(".dropdown").mouseenter(function(){
	        	$(".dropdown-content").show();
	        });
	    });
	    $(document).ready(function(){
	        $("#epicture").click(function(){
	        	window.location="edit_profile.php#epicture";
	        });
	    });
	    $(document).ready(function(){
	        $("#ename").click(function(){
	        	window.location="edit_profile.php#ename";
	        });
	    });
	    $(document).ready(function(){
	        $("#eemail").click(function(){
	        	window.location="edit_profile.php#eemail";
	        });
	    });
	</script>
</head>
<body background="image\back.png" style="background-size:cover; background-attachment: fixed;">
<button onclick="topFunction()" id="myBtn" title="Go to top"></button>
<div class="container" align="center">
	<form action="edit_profile.php" method="POST">
	<div class='card mb-3' style='max-width:1000px;'>
	<div class='row g-0'>
		<table cellspacing="1">
			<tr><th colspan="3">My Profile</th></tr>
			<tr><td colspan="3"><hr style="color:#401F83;"></td></tr>
			<tr>
				<td rowspan="5" width="35%">
					<?php
						$user_image = "SELECT UserImage FROM user_details WHERE UserID='$uid'";
						$result_user_image = mysqli_query($conn, $user_image);
						if($result_user_image){
							while($row = mysqli_fetch_array($result_user_image, MYSQLI_ASSOC)){
								echo "<div class='col-md-4'>";
								echo "<img style='width:300px; margin-left:10px; border-radius:20px;' src='data:image/png;base64,".base64_encode($row['UserImage'])."'>";
								echo "</div>";
							}
						}
					?>
				</td>
			</tr>
			<tr>
				<div class='col-md-8'>
				<div class='card-body'>
				<?php
					$read_user = "SELECT UserID FROM user_details WHERE UserID='$uid'";
					$result_read_user = mysqli_query($conn, $read_user);
					if($result_read_user){
						while($row = mysqli_fetch_array($result_read_user, MYSQLI_ASSOC)){
							echo "<td class='card-text' width='16%'>User ID: </td>";
							echo "<td  class='card-text' width='50%'>".$row['UserID']."</td>";
						}
					}
				?>
			</tr>
			<tr>
				<?php
					$read_user = "SELECT UserFullName FROM user_details WHERE UserID='$uid'";
					$result_read_user = mysqli_query($conn, $read_user);
					if($result_read_user){
						while($row = mysqli_fetch_array($result_read_user, MYSQLI_ASSOC)){
							echo "<td class='card-text'  width='16%'>Name: </td>";
							echo "<td class='card-text' width='50%'>".$row['UserFullName']."</td>";
						}
					}
				?>
			</tr>
			<tr>
				<?php
					$read_user = "SELECT UserEmail FROM user_details WHERE UserID='$uid'";
					$result_read_user = mysqli_query($conn, $read_user);
					if($result_read_user){
						while($row = mysqli_fetch_array($result_read_user, MYSQLI_ASSOC)){
							echo "<td class='card-text'  width='16%'>E-mail: </td>";
							echo "<td class='card-text' width='50%'>".$row['UserEmail']."</td>";
						}
					}
				?>
			</tr>
			<tr>
				<?php
					$read_user = "SELECT UserType FROM user_details WHERE UserID='$uid'";
					$result_read_user = mysqli_query($conn, $read_user);
					if($result_read_user){
						while($row = mysqli_fetch_array($result_read_user, MYSQLI_ASSOC)){
							echo "<td class='card-text'  width='16%'>User Type: </td>";
							echo "<td class='card-text' width='50%'>".$row['UserType']."</td>";
						}
					}
				?>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center;">
					<div class="dropdown">
						<input class='btn btn-primary' type="submit" name="editprofile" value="Edit Profile">
						<div class="dropdown-content" align="center">
							<input type="button" class="dropdown-button" id="epicture" value="Profile Picture">
							<input type="button" class="dropdown-button" id="ename" value="Name">
							<input type="button" class="dropdown-button" id="eemail" value="E-mail">
						</div>
					</div>
				</td>
			</tr>
				</div>
				</div>
		</table>
				</div>
				</div>
	</form>
				</div>
</body>
</html>