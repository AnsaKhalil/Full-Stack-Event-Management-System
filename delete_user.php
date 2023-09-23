<?php 

include "config.php";

include "session.php";

include "header.php";

include "top_button.html";

include "footer.php";

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "DELETE FROM `user_details` WHERE `UserNo`='$user_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>

<?php 

include "config.php";

$sql = "SELECT * FROM user_details";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>Delete User</title>

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
table{
 
    margin-bottom: 80px !important;
    margin-left:auto;
    margin-right:auto;
    text-align:center;
    padding-top: 10px;
    padding-left: 20px;
    padding-right: 20px;
    
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
    padding: 5px 5px;
}
table{
    margin: auto;
    padding-bottom: 5px;
    background: transparent;
    margin-top: 50px;
    border:none;
    border-radius:0px;
    box-shadow: 0 30px 40px 10px rgba(0, 0, 0, 0.8);
    transition: 0.3s;
}

hr{
    border-top:none;
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
background-color: rgba(255,0,0,0.7);
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
.deluse{
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
.deluse:hover{
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

    <div class="container deluse" align="center">

        <br><br>

        <h2>~ Delete User ~</h2>

<table class="table">

    <thead>

        <tr>

        <th>Index</th>

        <th>User ID</th>

        <th>User Name</th>

        <th>User Email</th>

        <th>User Type</th>

        <th>Action</th>

    </tr>

    </thead>

    <tbody> 

        <?php
$count=0;
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    $count=$count+1;
        ?>

                    <tr>

                    <td><?php echo $count ; ?></td>

                    <td><?php echo $row['UserID']; ?></td>

                    <td><?php echo $row['UserFullName']; ?></td>

                    <td><?php echo $row['UserEmail'];?></td>

                    <td><?php echo $row['UserType']; ?></td>

                    <td><a class="btn btn-danger" href="delete_user.php?id=<?php echo $row['UserNo']; ?>">Delete</a></td>

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

