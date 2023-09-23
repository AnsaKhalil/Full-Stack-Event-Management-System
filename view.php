<?php 

include "config.php";
include "session.php";
include "header.php";
include "top_button.html";
include "footer.php";

$sql = "SELECT * FROM events";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>

<style>
img{
    height:100px;
    width:180px;
}

form{
    margin-left: 60px;
    margin-top: 15px;
    margin-right: 60px;

}

th{
    color:white;
    background-color: #401F83 !important;
    border:1px solid #6f42c1;
    font-size: 20px;
    text-align: center;
    padding: 5px 10px;
    font-family: "Righteous";
    font-weight: 50;
    border-bottom: 2px solid #6f42c1 !important;
}
td{
    
    color:white;
    border:1px solid #6f42c1;
    font-size: 17px;
    font-family: "Righteous";
    padding: 5px 0px !important;
    
}
table{
    margin: auto;
   
    background: transparent;
    margin-top: 50px;
    border:none;
    border-radius:0px;
    box-shadow: 0 30px 40px 10px rgba(0, 0, 0, 0.8);
    transition: 0.3s;
    text-align:center;
}
table{
 
 margin-bottom: 80px !important;
 margin-left:auto;
 margin-right:auto;
 text-align:center;
 padding-top: 10px;
 padding-left: 20px;
 padding-right: 20px;
}

hr{
    
    border-bottom: none;
    border-left: none;
    border-right: none;
    width: 95%;
    padding-top: 10px
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
h2{
 color:white;
 font-family:'Righteous';
}
.view{
    margin: auto;
    padding-left: 55px;
    padding-right: 55px;
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
.view:hover{
    box-shadow: 
    0px 1px 2px 0px rgba(0,255,255,0.7),
    1px 2px 4px 0px rgba(0,255,255,0.7),
    2px 4px 8px 0px rgba(255,0,0,0.7),
    2px 4px 16px 0px rgba(255,0,0,0.7); 
}
input[type=button]{
    margin-bottom:30px;
  padding: 10px;
  color: white;
  border: none;
  background-color: #401F83;
  font-weight: 100;
  font-family: 'Righteous';
  font-size: 20px;
  text-align: center;
  width: 100px;
  border-radius:30px;
}
input[type=button]:hover{
  background-color: #6f42c1;
}
</style>

</head>

<body background="image\back.png" style=" background-attachment: fixed; background-size: cover;">
<button onclick="topFunction()" id="myBtn" title="Go to top"></button>

    <div class="container view" align="center">
<br><br>
        <h2>~ Event List ~</h2>

<table class="table">

    <thead>

        <tr>

        <th>Event Image</th>

        <th>Event Name</th>

        <th>Category</th>

        <th>Description</th>
        
        <th>Date</th>

        <th>Time</th>

        <th>Ticket Price</th>

        <th>Tickets Available</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo "<img src='data:image/png;base64,".base64_encode($row['eventimage'])."'>";?></td>

                    <td><?php echo $row['eventname']; ?></td>

                    <td><?php echo $row['category']; ?></td>
                    
                    <td><?php echo $row['description'];?></td>
                    
                    <td><?php echo $row['date']; ?></td>

                    <td><?php echo $row['time']; ?></td>

                    <td><?php echo $row['ticketprice']; ?></td>

                    <td><?php echo $row['tickettotal']; ?></td>

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>
<input type="button" name="Back" value="Back" onclick="document.location='admin_manage.php'">
    </div> 

   

</body>

</html>