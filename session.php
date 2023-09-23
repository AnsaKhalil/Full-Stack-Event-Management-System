<section class="banner" id="top" style="background-image: url(image/banner-bg.png);
          width: 100%;
          height: 100%;
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;">

        <div class="container">
		<nav class="navbar navbar-expand-lg bg-transparent">
		<div class="container-fluid">
		<?php
//Start session
session_start();



//Check session user
if (isset($_SESSION['UserFullName'])!=null){
	
	
	
	$login_status="yes";
	$uid=$_SESSION['UserID'];
	$utype=$_SESSION['UserType'];
	if($utype=='Admin'){
		echo " <div>";
		echo " <p class='fullname'>Assalam-u-Alaikum, ".$_SESSION['UserFullName']." ! </p>";
		echo " &nbsp;&nbsp; <a class='navbar-brand' href='index.php' >Home </a>";
		echo " <a class='navbar-brand' href='#'>Contact Us</a>";
		echo " <a class='navbar-brand' href='admin_manage.php'>Admin Management</a>";
		echo " <a class='navbar-brand' href='my_profile.php'>My Profile</a>";
		echo " <a class='navbar-brand' href='my_booking.php'>My Booking</a>";
		echo " <a class='navbar-brand' href='change_password.php'>Change Password</a>";
		echo " <a class='navbar-brand' href='logout.php'>Logout</a>";
		echo " </div>";
		echo "</div>";
		echo "</nav>";
		echo " <div class='row'>";
        echo " <div class='col-md-10 col-md-offset-1'>";
        echo " <div class='banner-caption'> ";   
        echo "<hr width='auto' size='10' style='background: #401F83'>";
		echo "<div class='top'>";
		echo "<h1>Administration Side</h1>";
		echo "</div>";
		echo "<hr width='auto' size='10' style='background: #401F83'>";
		echo "<h2>Manage Events And Users</h2>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
	}
	else if ($utype=='Student'){
		echo " <div style='padding-left: 140px;'>";
		echo " <p class='fullname'>Assalam-u-Alaikum, ".$_SESSION['UserFullName']." ! </p>";
		echo " &nbsp;&nbsp; <a class='navbar-brand' href='index.php' >Home </a>";
		echo " <a class='navbar-brand' href='my_profile.php'>My Profile</a>";
		echo " <a class='navbar-brand' href='my_booking.php'>My Booking</a>";
		echo " <a class='navbar-brand' href='change_password.php'>Change Password</a>";
		
		echo " <a class='navbar-brand' href='logout.php'>Logout</a></p>";
		echo " </div>";
		echo " </div>";
		echo "</nav>";
		echo "<div class='row'>
                <div class='col-md-10 col-md-offset-1'>
                    <div class='banner-caption'>
                        
                        <hr width='auto' size='10' style='background: #401F83'>
	<div class='top'>
		<h1>COLLEGE EVENTS</h1>
	</div>
	<hr width='auto' size='10' style='background: #401F83'>
                        <h2>Participate In Your Desired Event</h2>
    </div>
    </div>
    </div>";


	}
	else{
		echo " <a class='navbar-brand' href='logout.php' >Logout</a></p></b>";
	}
}
else{
	echo " <div style='padding-left: 200px;'>";
	echo " <p class='full'>Welcome, Guest ! ";
	echo " &nbsp;&nbsp;&nbsp;&nbsp; <a class='navbar-brand' href='index.php'>Home</a>";
	echo " <a class='navbar-brand' href='login_register.php'>Login/Register</a>";
	
	echo " </div>";
	echo " </div>";
		echo "</nav>";
		echo "<div class='row'>
                <div class='col-md-10 col-md-offset-1'>
                    <div class='banner-caption'>
                        
                        <hr width='auto' size='10' style='background: #401F83'>
	<div class='top'>
		<h1>COLLEGE EVENTS</h1>
	</div>
	<hr width='auto' size='10' style='background: #401F83'>
                        <h2>SignUp To Take Part In Your Desired Event</h2>
    </div>
    </div>
    </div>";
	$login_status="no";
}
?>
</div>
</section>
