<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<center>
		<?php

		$conn = mysqli_connect("localhost", "root", "", "project");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
		$name = $_REQUEST['name'];
		$age = $_REQUEST['age'];
		$userId = $_REQUEST['userId'];
		$password = $_REQUEST['password'];
		$number = $_REQUEST['number'];
		
	

		$sql = "INSERT INTO client VALUES ('$name',
			'$age','$userId','$password','$number')";
		
		if(mysqli_query($conn, $sql)){
			echo "<script type='text/javascript'>alert('register successfully!') </script>";
			
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		
		mysqli_close($conn);
		?>
	</center>
	<?php
            echo "<script> window.location.assign('../after_reg/after_reg.html'); </script>";
			?>

</body>

</html>
