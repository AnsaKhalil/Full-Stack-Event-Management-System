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

?>

<!DOCTYPE html>
<html>
<head>	
	<title>TARUC Events - My Booking</title>
	<style type="text/css">

		form{
			margin-left: 60px;
			margin-top: 15px;
			margin-right: 60px;
			
			
		}
		table{
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
		th{
			color:white;
			background-color: #401F83;
			border:1px solid #6f42c1;
			font-size: 20px;
			text-align: center;
			padding: 5px 10px;
			font-family: "Righteous";
			font-weight: 50;
		}
		td{
			
			color:white;
			border:1px solid #6f42c1;
			font-size: 17px;
			font-family: "Righteous";
			padding: 5px 5px;
		}
		.bookin{
			margin: auto;
			padding-bottom: 5px;
			min-width: 50%;
			max-width: 80%;
			background: rgba(67, 9, 124, 0.3);
			margin-top: 100px;
			margin-bottom: 100px;
			border:none;
			border-radius:20px;
			box-shadow: 0 30px 40px 10px rgba(0, 0, 0, 0.8);
			transition: 0.3s;
		}
		.bookin:hover{
			box-shadow: 
			0px 1px 2px 0px rgba(0,255,255,0.7),
			1px 2px 4px 0px rgba(0,255,255,0.7),
			2px 4px 8px 0px rgba(255,0,0,0.7),
			2px 4px 16px 0px rgba(255,0,0,0.7);
			
		}
		hr{
			
			border-bottom: none;
			border-left: none;
			border-right: none;
			width: 95%;
			padding-top: 10px
		}
	</style>
</head>
<body background="image\back.png" style="background-size:cover; background-attachment: fixed;">
	<div class="bookin" id="view" align="center">
		<p style=" font-family:'Righteous'; color:white; padding-top: 30px; text-decoration: underline; font-size: 30px;font-weight: 700">My Booking</p>
		<hr>
		<table align="center" cellpadding="6px" cellspacing="6px">
			<tr>
				<th>No.</th>
				<th>Booking<br>Date & Time</th>
				<th>Event Name</th>
				<th>Event Date</th>
				<th>Event Time</th>
			</tr>
			<!--Get all booking record of hte user-->
			<?php
				
				$count=0;
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				//Read user booking detail
				$read_user_booking = "SELECT * FROM booking_details WHERE UserID='$uid'";
				$result_read_user_booking = mysqli_query($conn, $read_user_booking);
				if ($result_read_user_booking){
					while($row = mysqli_fetch_array($result_read_user_booking, MYSQLI_ASSOC)){
						$eid=$row['EventID'];
						$count=$count+1;
						echo "<tr>";
						echo "<td>".$count."</td>";
						echo "<td>".$row['BookingTimeStamp']."</td>";
						//Read event detail
						$read_event_detail = "SELECT * FROM events WHERE id='$eid'";
						$result_read_event_detail = mysqli_query($conn, $read_event_detail);
						if ($result_read_event_detail){
							while($row1 = mysqli_fetch_array($result_read_event_detail, MYSQLI_ASSOC)){
								echo "<td>".$row1['eventname']."</td>";
								echo "<td>".$row1['date']."</td>";
								echo "<td>".$row1['time']."</td>";
							}
						
						}
						echo "</tr>";
					}
				}
				
			?>

		</table>
	</div>
</body>
</html>