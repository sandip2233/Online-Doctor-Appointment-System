<?php
session_start();
include_once 'connection.php';
$session= $_SESSION['patientSession'];

if (isset($_GET['date']) && isset($_GET['appid'])) {
	$appdate =$_GET['date'];
	$appid = $_GET['appid'];
}
// on b.icPatient = a.icPatient
$res = mysqli_query($con,"SELECT a.*, b.* FROM shedule a INNER JOIN client b WHERE a.date ='$appdate' AND a.id='$appid' AND b.userId='$session'");
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);

//INSERT
if (isset($_POST['appointment'])) {
    $auserid = mysqli_real_escape_string($con,$userRow['userId']);
    $id = mysqli_real_escape_string($con,$appid);
    $symtopms = mysqli_real_escape_string($con,$_POST['symtopms']);
    $comment = mysqli_real_escape_string($con,$_POST['comment']);
    $avail = "not available";
    
    
    $query = "INSERT INTO appointment (  auserid , id , symtopms , comment  )
    VALUES ( '$auserid', '$id', '$symtopms', '$comment') ";

    //update table appointment schedule
$sql = "UPDATE shedule SET avail = '$avail' WHERE id = $id" ;
$scheduleres=mysqli_query($con,$sql);
if ($scheduleres) {
	$btn= "disable";
} 
$result = mysqli_query($con,$query);

if( $result )
{
?>
<script type="text/javascript">
alert('Appointment made successfully.');
</script>
<?php
header("Location: applist.php");
}
else
{
	echo mysqli_error($con);
?>
<script type="text/javascript">
alert('Appointment booking fail. Please try again.');
</script>
<?php
header("Location: index.php");
}
//dapat dari generator end
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		
		<title>Make Appoinment</title>
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/default/style.css" rel="stylesheet">
		<link href="assets/css/default/blocks.css" rcel="stylesheet">


		<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
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

    <div class="container">
			<section style="padding-bottom: 50px; padding-top: 50px;">
				<div class="row">
					<!-- start -->
					<!-- USER PROFILE ROW STARTS-->
					<div class="row">

                    <div class="col-md-9 col-sm-9  user-wrapper">
							<div class="description">
								
								
								<div class="panel panel-default">
									<div class="panel-body">
										
										
										<form class="form" role="form" method="POST" accept-charset="UTF-8">
											<div class="panel panel-default">
												<div class="panel-heading">Patient Information</div>
												<div class="panel-body">
													
													Patient Name: <?php echo $userRow['name'] ?><br>
													Patient IC: <?php echo $userRow['userId'] ?><br>
													Contact Number: <?php echo $userRow['number'] ?><br>
													Age: <?php echo $userRow['age'] ?>
												</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading">Appointment Information</div>
												<div class="panel-body">
													Day: <?php echo $userRow['s_day'] ?><br>
													Date: <?php echo $userRow['date'] ?><br>
													Time: <?php echo $userRow['starttime'] ?> - <?php echo $userRow['endtime'] ?><br>
												</div>
											</div>
											
											<div class="form-group">
												<label for="recipient-name" class="control-label">Symptom:</label>
												<input type="text" class="form-control" name="symtopms" required>
											</div>
											<div class="form-group">
												<label for="message-text" class="control-label">Comment:</label>
												<textarea class="form-control" name="comment" required></textarea>
											</div>
											<div class="form-group">
												<input type="submit" name="appointment" id="submit" class="btn btn-primary" value="Make Appointment">
											</div>
										</form>
									</div>
								</div>
								
							</div>
							
						</div>
					</div>
					<!-- USER PROFILE ROW END-->
					<!-- end -->
					<script src="assets/js/jquery.js"></script>
			<script src="assets/js/bootstrap.min.js"></script>
				</body>
			</html>