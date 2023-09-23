<?php 	
include "config.php";
include "session.php";
include "top_button.html";
include "footer.php";
?>
<!DOCTYPE HTML>
<head>
<!-- title -->
<title>E-M-S</title>
<!-- fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Righteous&display=swap" rel="stylesheet">
<!-- bootstrap 5 css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<link rel="icon" type="image/x-ico" href="image/favicon.ico">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
height:100%;
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
height:101%;
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
height:250px; 
width:270px;
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

</style>
<!-- styled css file link -->
<!-- <link rel="stylesheet" href="css/style.css"> -->
</head>
<html lang="en">
    <body background ="image/back.png" style="  background-attachment: fixed; background-size: cover;">
    <button onclick="topFunction()" id="myBtn" title="Go to top"></button>
    <hr width="auto" size="10" style="background: #401F83">
	<div class="top">
		<h1>Search For Event</h1>
	</div>
	<hr width="auto" size="10" style="background: #401F83"> 
    <span class="top"></span>
                        <br><br>
                        	<!--Search event form-->
	<div class="search" style="text-align: center">
		<form action="searchbar.php" method="POST" >
			<input class="searchin" type="text" size="40" name="searchevent" placeholder="Enter event name to search event"  />
			<input class="sear" type="submit" name="search" value="Search"/>
		</form>
	</div>  
 
	<hr width="auto" size="4" style="background: #401F83">
    <br><br>

	<!--Display all event area-->
	<div class="row row-cols-1 row-cols-md-4 g-4" align="center" >
        
		<?php
		
			//Read all event
            // $sql = "SELECT * FROM users";
			$read_DB = "SELECT * FROM events ORDER BY date DESC";
            // $result = $conn->query($sql);
			$result = mysqli_query($conn, $read_DB);
			
			//Display all result
			if($result){
    			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    
                    echo"<div class='col'>";
                    echo"<div class='card h-100'>";
                    echo"<form action='event_detail.php?id=?' method='POST'><table>";
                    echo"<img class='card-img-top' src='data:image/png;base64,".base64_encode($row['eventimage'])."' alt='Avatar' style='width:100%'>";
                    echo"<div class='card-body'>";
                    echo"<input type='text' name='eventid' value='".$row['id']."' hidden>";
                    echo"<span  style='font-size:16px'><hr><h4 class='card-title'><b><input class ='input-group mb-3'  type='text' name='eventname' value='".$row['eventname']."' size=65 readonly></b></h4>";
                    echo"<p class='card-text'><span  style='font-size:16px'><hr>Category<br>(". $row['category'].")</p>";
                    echo"<input class='btn btn-primary' type='submit' name='more_detail' value='More Details'/>";
                    echo"</div>";
                    echo"</table></form>";
                    echo"</div>";
                    echo"</div>";
    			}
			}
		?>
	</div>
    <br><br><br>
</body>
</html>