<?php
include_once '../login/connection.php';

$userid = $_GET['userId'];
$chkYesNo = $_GET['chkYesNo'];

$update = mysqli_query($con,"UPDATE appointment SET status='done' WHERE appId=$userId");

?>