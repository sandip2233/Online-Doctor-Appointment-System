<?php
session_start();
include_once 'connection.php';
$session=$_SESSION[ 'patientSession'];
$res=mysqli_query($con, "SELECT a.*, b.*,c.* FROM client a
	JOIN appointment b
		On a.userId = b.auserid
	JOIN shedule c
		On b.id=c.id
	WHERE b.auserid ='$session'");
	if (!$res) {
		die( "Error running $sql: " . mysqli_connect_error()); 
	}
	$userRow=mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Appoinment</title>
		<!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
		<link href="assets/css/material.css" rel="stylesheet">
		
		<link href="assets/css/default/style.css" rel="stylesheet">
		<link href="assets/css/default/blocks.css" rcel="stylesheet">
		<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="css/style1.css">
        
	</head>
	<body>

    <header class="header">

<a href="#" class="logo"> <i class="fas fa-heartbeat"></i> stethoscope </a>


<nav class="navbar" role="navigation">
<nav class="dropdown"  style="float:right;">
        <a href="javascript:void(0)"  class="dropbtn"> <i class="fas fa-user"></i><?PHP ECHO $userRow['name'];?></a>
        <div class="dropdown-content">
          <a href="profile.php">profile</a>
          <a href="applist.php">appointment</a>
          <a href="logout.php">logout</a>
        </div>
    </nav>
        

</nav>


<div id="menu-btn" class="fas fa-bars"></div>

</header>
    <?php


echo "<div class='container'>";
echo "<div class='row'>";
echo "<div class='page-header'>";
echo "<h1>Your appointment list. </h1>";
echo "</div>";
echo "<div class='panel panel-primary'>";
echo "<div class='panel-heading'>List of Appointment</div>";
echo "<div class='panel-body'>";
echo "<table class='table table-hover'>";
echo "<thead>";
echo "<tr>";
echo "<th>App Id</th>";
echo "<th>userId </th>";
echo "<th>Name </th>";
echo "<th>Day </th>";
echo "<th>Date </th>";
echo "<th>startTime </th>";
echo "<th>endTime </th>";
echo "</tr>";
echo "</thead>";
$res = mysqli_query($con, "SELECT a.*, b.*,c.*
		FROM client a
		JOIN appointment b
		On a.userId = b.auserId
		JOIN shedule c
		On b.id=c.id
		WHERE b.auserId ='$session'");

if (!$res) {
die("Error running $sql: ". mysqli_connect_error());  
}


while ($userRow = mysqli_fetch_array($res)) {
echo "<tbody>";
echo "<tr>";
echo "<td>" . $userRow['appid'] . "</td>";
echo "<td>" . $userRow['userId'] . "</td>";
echo "<td>" . $userRow['name'] . "</td>";
echo "<td>" . $userRow['s_day'] . "</td>";
echo "<td>" . $userRow['date'] . "</td>";
echo "<td>" . $userRow['starttime'] . "</td>";
echo "<td>" . $userRow['endtime'] . "</td>";
}

echo "</tr>";
echo "</tbody>";
echo "</table>";

?>
	
    
<!-- display appoinment end -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<br>

 <center> 
<div>
        <a href="index.php"><button type="submit"><span></span>back to HOME</button></a>

    </div>

    <div>
        <a href="logout.php"><button type="submit"><span></span>logout</button></a>
        
    </div>
    

 </center>

</body>
</html>