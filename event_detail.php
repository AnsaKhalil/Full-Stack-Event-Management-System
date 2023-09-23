<?php
	//Connect database
	include "config.php";

	//Read session
	include 'session.php';

	//Read button script
	include "top_button.html";

	//header
	include "header.php";

	//Join any event
	if(isset($_POST['join'])){
		//Go login page if not login
		if($login_status=="no"){
			$message="Please login to continue.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header("Refresh: 0; login_register.php");
		}

		//Purchase ticket to join event, Only ONE booking per user
		else if ($login_status=="yes"){
			
			$eid=$_POST['eventid'];

			//Read selected event ID
			$read_eventid = "SELECT id FROM events WHERE id='$eid'";
			$result_read_eventid = mysqli_query($conn, $read_eventid);
			if($result_read_eventid){
				while($row = mysqli_fetch_array($result_read_eventid, MYSQLI_ASSOC)){
					$eid=$row['id'];
				}
			}

			//Check if user purchased ticket for the event
			$read_book_record = "SELECT * FROM booking_details WHERE UserID='$uid' AND EventID='$eid'";
			$result_read_book_record = mysqli_query($conn, $read_book_record);
			$number_of_rows = mysqli_num_rows($result_read_book_record);
			//If purchased
			if($number_of_rows>0){
				$message="Sorry, you purchased the ticket for the event. For every event, only one ticket can be purchased by each user.";
				echo "<script type='text/javascript'>alert('$message');</script>";
				header("Refresh: 0; index.php");
			}
			//If not purchase, check ticket availability
			else{
				$read_ticket_info = "SELECT tickettotal, ticketsold from events WHERE id='$eid'";
				$result_read_ticket_info = mysqli_query($conn, $read_ticket_info);
				if($result_read_ticket_info){
					while($row = mysqli_fetch_array($result_read_ticket_info, MYSQLI_ASSOC)){
						$tickettotal=$row['tickettotal'];
						$ticketsold=$row['ticketsold'];
						//If ticket sold is equal to total number of ticket, booking fail
						if($ticketsold==$tickettotal){
							$message="Oops! Ticket sold out! Try to be fast next time!";
							echo "<script type='text/javascript'>alert('$message');</script>";
						}
						//Else, update ticket sold, then insert booking detail
						else{
							$currentsoldticket = $ticketsold+1;
							$update_ticket_sold = "UPDATE events SET ticketsold=$currentsoldticket WHERE id='$eid'";
							$result_update_ticket_sold = mysqli_query($conn, $update_ticket_sold);
							if($result_update_ticket_sold){
								date_default_timezone_set('Asia/Kuala_Lumpur');
								$current_time = date('Y-m-d H:i:s');
								$insert_booking = "INSERT INTO booking_details (BookingTimeStamp, UserID, EventID) VALUES ('$current_time', '$uid', '$eid' ) ";
								$result_insert_booking = mysqli_query($conn, $insert_booking);
								if($result_insert_booking){
					    			$message="Ticket purchase success. You can check your booking details at 'My Booking'.";
									echo "<script type='text/javascript'>alert('$message');</script>";	
								}
								else{
									$message="Ticket purchase fail. Please try again. Back to home page.";
									echo "<script type='text/javascript'>alert('$message');</script>";
								}
							}
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
	<title>E-M-S</title>
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
			margin-top: 15px;
			margin-right: 60px;
			margin-bottom: 100px;
		}

</style>
</head>
<body background="image\back.png" style="background-size:cover; background-attachment: fixed;">
	<button onclick="topFunction()" id="myBtn" title="Go to top"></button>
	<hr width="auto" size="10" style="background: #401F83">
	<div class="top">
		<h1>EVENT DETAIL</h1>
	</div>
	<hr width="auto" size="10" style="background: #401F83">

	<!--Search event form-->
	<div class="search" style="text-align: center">
		<form action="searchbar.php" method="POST" >
			<input class="searchin" type="text" size="40" name="searchevent" placeholder="Enter event name to search event" style="font-size: 16px;padding: 10px" />
			<input class="sear" type="submit" class="search_button" name="search" value="Search"/>
		</form>
	</div>
	<hr width="auto" size="4" style="background: #401F83">

	<!--display search result area-->
	<div class="container" align="center">
		<?php

			if(isset($_POST['more_detail'])){
				$eid=$_POST['eventid'];
			}
		
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			//Read related event
			$read_DB = "SELECT * FROM events WHERE events.id LIKE '$eid%'";
			$result = mysqli_query($conn, $read_DB);
			//Display related result and details
			if(mysqli_num_rows($result)>0){
				
				echo "<form action='event_detail.php' method='POST'>";
				echo "<div class='card mb-3' style='max-width:1000px;'>";
    			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
					echo "<div class='row g-0'>";
    				
					echo "<div class='col-md-4'>";
					echo "<tr><td><input type='text' name='eventid' value='".$row['id']."' size=65 hidden></td></tr>";
					echo "<img class='img-fluid rounded-start' style='width:100%; height:100%;' src='data:image/png;base64,".base64_encode($row['eventimage'])."'>";
					echo "</div>";
					echo "<div class='col-md-8'>";
					echo "<div class='card-body'>";
					echo "<input style=' align-text:center; width:300px; border:none; background:transparent;' class ='input-group mb-3'  type='text' name='joineventname' value='Event Name: ".$row['eventname']."' size=65 readonly>";
        			echo "<span  style='font-size:16px'><hr>
									<p class='card-text'>Description: <br>(". $row['description'].")</p>
        							<p class='card-text'><br>Date: (". $row['date'].")
        							<br> Time: (".$row['time'].": ".$row['period'].")
									<br> Ticket Price: (". $row['ticketprice'].")
									<br> Ticket Total: (". $row['tickettotal'].")</p>";									
        			echo "<input class='btn btn-primary' type='submit' name='join' value='Join Event'/>";
        			echo "<tr><td><br></td></tr>";
					echo "</div>";
					echo "</div>";
					
        			echo "<br>";
					echo "</div>";
    			}
				echo "</div>";
    			echo "</form>";
								
    		}
    	?>
	</div>




</body>
</html>


