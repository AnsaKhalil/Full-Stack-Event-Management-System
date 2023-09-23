<?php 

include "config.php";
include "session.php";
include "header.php";
include "top_button.html";
include "footer.php";

    if (isset($_POST['update'])) {

        
    $newpicture=addslashes(file_get_contents($_FILES['picture']['tmp_name']));
    $newpicture_name=$_FILES['picture']['name'];

        $ename = $_POST['eventname'];

        $user_id = $_POST['user_id'];

        $ecategory = $_POST['category'];

        $edescription = $_POST['edescription'];
        
        $eyear = $_POST['a_eventyear'];
        $emonth = $_POST['a_eventmonth'];
        $eday = $_POST['a_eventday'];
        $ehour = $_POST['a_eventhour'];
        $eminute = $_POST['a_eventminute'];
        $eperiod = $_POST['a_eperiod'];

        $eticketprice = $_POST['ticketprice'];

        $etickettotal = $_POST['tickettotal'];


        if(($emonth>0) && ($emonth<10)){
            $emonth='0'.$emonth;
        }
        //Add '0' to day
        if(($eday>0) && ($eday<10)){
            $eday='0'.$eday;
        }
        //Add '0' to hour
        if(($ehour>-1) && ($ehour<10)){
        $ehour='0'.$ehour;
        }
        //Add '0' to minute
        if(($eminute>-1) && ($eminute<10)){
        $eminute='0'.$eminute;
        }
    
        $edate=$eyear.'-'.$emonth.'-'.$eday;
        $etime=$ehour.':'.$eminute;


        $sql = " UPDATE `events` SET `eventname`='$ename',  `date`='$edate', `time`='$etime', `category`='$ecategory', `description`='$edescription',`ticketprice`='$eticketprice',`tickettotal`='$etickettotal', `eventimage`='$newpicture', `eventimagename`='$newpicture_name', `period`='$eperiod' WHERE `id`='$user_id'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

            echo "Record updated successfully.";

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['id'])) {

    $user_id = $_GET['id']; 

    $sql = "SELECT * FROM `events` WHERE `id`='$user_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $img = base64_encode($row['eventimage']);

            $event_name = $row['eventname'];

            $e_category = $row['category'];

            $edescription = $row['description'];

            $edate = $row['date'];

            $etime = $row['time'];

            $eperiod = $row['period'];

            $eticketprice = $row['ticketprice'];

            $etickettotal  = $row['tickettotal'];

            $id = $row['id'];

        } 

    ?>
    <head>  <style type="text/css">

form{
  margin-left: 60px;
  margin-top: 15px;
  margin-bottom: 100px;
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

input[type=submit],input[type=button]{
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
input[type=submit]:hover,input[type=button]:hover{
  background-color: #6f42c1;
}
input[type=text],input[type=number]{
  background:#401F83;
  opacity:0.5;
  border: none;
  color: white;
  border-radius:20px;
  border-bottom: 2px solid white;
  text-align: center;
  outline-color:red;
}
input[type=number]{
  padding:5px;
width:100px;
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
h2{
 margin-bottom: 30px;
}
hr{
  border-top:none;
}

    body{
      font-family:'Righteous';
      color:white;
    }

    fieldset {
     min-width: 1;
     padding: 1;
     margin: 1;
     border: 1px solid;
}

legend {
    float: none;
    width: 44%;
    padding: 0;
    margin-bottom: 0.5rem;
    font-size: calc(1.275rem + .3vw);
    line-height: inherit;
}
textarea{
  background:#401F83; 
  outline-color:red;
  opacity:0.5;  
  border: none;  
  color: white;  
  border-radius:20px;  
  border-bottom: 2px solid white; 
  text-align: justify;
}
select{
  background:#401F83; 
  width:100px;
  padding:5px;
  outline-color:red;
  opacity:0.5;  
  border: none;  
  color: white;  
  border-radius:20px;  
  border-bottom: 2px solid white; 
  text-align: justify;
}
option{
  background-color: #6f42c1;
}

</style></head>
<body background="image\back.png" style=" background-attachment: fixed; background-size: cover;">
<button onclick="topFunction()" id="myBtn" title="Go to top"></button>     

        <form align="center" action="" method="post" enctype="multipart/form-data" style="width: 900px">
        <h2>Event Update Form</h2>

          <fieldset>

            <legend>:~ Update Event Information ~:</legend>

            <br><br>
    <img src="image/divide.jpg" height="40%" width="100%" style="opacity: 0.6">
    <br><br>
    <tr><th style="text-decoration: underline;"> >>>----------------------<<< </th></tr><br><br>
    <div class="container" style="text-align: justify">

            <tr><th style="text-decoration: underline;">Currently Selected Picture:</th></tr>
                <tr><td><img height="100px" width="120px" src='data:image/png;base64,<?php echo $img; ?>'></tr></td><br><br>
				<tr><td>New Event Picture:&nbsp;&nbsp; <input type="file" name="picture" required></td></tr><br><br>
            
Event Name:&nbsp;&nbsp;
<input style="width:320px;" type="text" name="eventname" value="<?php echo $event_name; ?>">
<input type="hidden" name="user_id" value="<?php echo $id; ?>">
<br><br>
<tr><td>
Event Category:&nbsp;&nbsp;
<input style="width:320px;" type="text" name="category" rows="2" cols="10" required style="text-align: justify" value="<?php echo $e_category; ?>">
</input>
</tr></td>
<br><br>
<tr><td>Event Description: <br>
<textarea name="edescription" rows="5" cols="50" required style="text-align: justify" value="<?php echo $edescription; ?>"><?php echo $edescription; ?></textarea></td></tr>
<br><br>
Currently Selected Date:&nbsp;&nbsp;
<input type="text" name="edate" value="<?php echo $edate; ?>" readonly>
<br><br>
<tr>
<td>Update Date: 
<input type="number" name="a_eventyear" min="2023" max="2050" placeholder="YYYY" required value="<?php echo $eyear; ?>"> -
<input type="number" name="a_eventmonth" min="01" max="12" placeholder="MM" required value="<?php echo $emonth; ?>"> -
<input type="number" name="a_eventday" min="01" max="31" placeholder="DD" required value="<?php echo $eday; ?>">
</td>
</tr>
<br><br>
Currently Selected Time:&nbsp;&nbsp;
<input type="text" name="etime" value="<?php echo $etime; ?>: <?php echo $eperiod;?>" readonly>
<br><br>
<tr>
	<td>Update Time (12-hour format): 
	<input type="number" name="a_eventhour" min="01" max="12" placeholder="HH" required value="<?php echo $ehour; ?>"> : 
	<input type="number" name="a_eventminute" min="00" max="60" placeholder="MM" required value="<?php echo $eminute; ?>"> :
  <select name="a_eperiod" default="<?php echo $eperiod; ?>">
  <option>AM</option>
  <option>PM</option>
  </select>
	</td>
	</tr>
  <br><br>
  <tr><td>Ticket Price: RM <input type="number" name="ticketprice" min="00" placeholder="0" required value="<?php echo $eticketprice; ?>">.00 </td></tr>
  <br><br>
  <tr><td>Number of Ticket: <input type="number" name="tickettotal" min="10" placeholder="10" required value="<?php echo $etickettotal; ?>"></td></tr>
            <br><br>
    </div>
          </fieldset>

          <br><br>

<input type="submit" value="Update" name="update">
&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" name="Back" value="Back" onclick="document.location='edit.php'">

        </form> 

        </body>

        </html> 

    <?php

    } else{ 

        header('Location: view.php');

    } 

}

?> 