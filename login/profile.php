<?php
session_start();
include_once 'connection.php';
if(!isset($_SESSION['patientSession']))
{
header("Location: ../index.html");
}
$usersession = $_SESSION['patientSession'];
//echo $usersession;
$res=mysqli_query($con,"SELECT * FROM client WHERE userId = '$usersession'");
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/stylea.css">
    <title>Profile Page</title>
</head>
<center>
<body class="profile-page">
    <div class="wrapper">

        <h2>Profile</h2>
        <form enctype="multipart/form-data">
        <a<i></i> NAME      :   <?php  echo $userRow['name']; ?> </a>
        <br>
        <a<i></i> USER ID       :  <?php echo $userRow['userId']; ?> </a>
        <br>
       <a<i></i> AGE        :     <?php echo $userRow['age']; ?> </a>
       <br>
       <a<i></i> NUMBER         : <?php echo $userRow['number'];  ?> </a>
  <?php
            ?>
            <div>
                <button type="submit" name="submit" class="btn">Update Profile</button>
            </div>
            <div>
             <a href ="index.php">  <button type="button" class="btn">back</button> </a>
            </div>
        </form>
    </div>
</body>
</center>
</html>