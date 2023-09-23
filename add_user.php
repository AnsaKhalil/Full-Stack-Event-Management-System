
<?php 

include "config.php";

include "session.php";

include "header.php";

include "footer.php";

  if (isset($_POST['submit'])) {

    $user_id = $_POST['userid'];

    $full_name = $_POST['fullname'];

    $email = $_POST['email'];

    $password = $_POST['password'];

    $user_type = $_POST['usertype'];

    $sql = "INSERT INTO `user_details`(`UserID`, `UserFullName`, `UserEmail`, `UserPassword`, `UserType`) VALUES ('$user_id','$full_name','$email','$password','$user_type')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "New record created successfully.";

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    $conn->close(); 

  }

?>

<!DOCTYPE html>

<html>
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
input[type=text],input[type=password],input[type=email]{
  background:#401F83;
  opacity:0.5;
  border: none;
  color: white;
  border-radius:20px;
  border-bottom: 2px solid white;
  text-align: center;
  outline-color:red;
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
    width: 30%;
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


</style>

  </head>

<body background="image\back.png" style=" background-attachment: fixed; background-size: cover;">

<div class="container aduse" align="center">



<form action="" method="POST">
<h2>~ Add User ~</h2>

  <fieldset>

    <legend>User information:</legend>
    <br>
<label>
    UserID:
    &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;
    <input type="text" name="userid" required>
</label>
    <br><br><br>

    <label>
    Name:
    &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
    <input type="text" name="fullname" required>
    </label>
    <br><br><br>

    <label>
    Email:
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    <input type="email" name="email" required>
    </label>
    <br><br><br>

    <label>
    Password:
    &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="password" name="password" required>
    </label>
    <br><br><br>

    <label>
    User Type:
    &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
    <select name="usertype" id="users">
  		<option value="Student">Student</option>
  		<option value="Admin">Admin</option>
		</select>
    </label>
    <br><br><br>

   
  </fieldset>
  <br><br>
  <input type="submit" name="submit" value="submit">&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="button" name="Back" value="Back" onclick="document.location='admin_manage.php'">

</form>
</div>
</body>

<footer>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</footer>

</html>