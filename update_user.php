<?php 

include "config.php";

include "session.php";

include "header.php";

include "top_button.html";

include "footer.php";

    if (isset($_POST['update'])) {

        $user_id = $_POST['userid'];

        $user_no = $_POST['user_no'];

        $eusername = $_POST['username'];

        $e_email = $_POST['email'];

        $user_type = $_POST['usertype']; 

        $sql = "UPDATE `user_details` SET `UserID`='$user_id',`UserFullName`='$eusername',`UserEmail`='$e_email',`UserType`='$user_type' WHERE `UserNo`='$user_no'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

            echo "Record updated successfully.";

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['id'])) {

    $user_no = $_GET['id']; 

    $sql = "SELECT * FROM `user_details` WHERE `UserNo`='$user_no'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $u_id = $row['UserID'];

            $e_username = $row['UserFullName'];

            $e_email = $row['UserEmail'];

            $user_type = $row['UserType'];

            $u_no = $row['UserNo'];

        } 

    ?>

    <head>
    <style type="text/css">

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
input[type=text],input[type=email]{
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
    width: 43%;
    padding: 0;
    margin-bottom: 0.5rem;
    font-size: calc(1.275rem + .3vw);
    line-height: inherit;
}

select{
  padding:5px;
width:150px;
background-color:#401F83;
color:white;
border-radius:20px;
border:none;
outline-color:red;
}
option{
  background-color: #6f42c1;
}
</style>
    </head>

<body background="image\back.png" style=" background-attachment: fixed; background-size: cover;">
<button onclick="topFunction()" id="myBtn" title="Go to top"></button>

        

        <form align="center" action="" method="post" style="width: 900px">
        <h2>User Update Form</h2>
          <fieldset>

            <legend>:~ Personal information ~:</legend>
            <br><br>

            <img src="image/divide.jpg" height="40%" width="100%" style="opacity: 0.6">
    <br><br>
    <tr><th style="text-decoration: underline;"> >>>----------------------<<< </th></tr><br><br>
    <div class="container" style="text-align: justify">
    <label>
            User ID:&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;

            <input style="width:320px;" type="text" name="userid" value="<?php echo $u_id; ?>">
            </label>
            <input type="hidden" name="user_no" value="<?php echo $u_no; ?>">
            
            <br><br>
            <label>
            User Name:&nbsp;&nbsp; &nbsp;&nbsp;

            <input style="width:320px;" type="text" name="username" value="<?php echo $e_username; ?>">
            </label>
            <br><br>
            <label>
            Email:&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;

            <input style="width:320px;" type="email" name="email" value="<?php echo $e_email; ?>">
            </label>
            <br><br>
<label>
            User Type:&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;

            <select name="usertype" id="users">
            <option value="Student" <?php if($user_type == 'Student'){ echo "selected";} ?> >Student</option>
            <option value="Admin" <?php if($user_type == 'Admin'){ echo "selected";} ?>>Admin</option>
            </select>
</label>
            <br><br>

 
</div>
          </fieldset>
          <br><br>
          <input type="submit" value="Update" name="update">
          &nbsp;&nbsp; &nbsp;&nbsp;
<input type="button" name="Back" value="Back" onclick="document.location='edit_user.php'">
        </form> 

        </body>

        <footer>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</footer>

        </html> 

    <?php

    } else{ 

        header('Location: view.php');

    } 

}

?> 