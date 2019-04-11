<?php

	session_start();

	$con = mysqli_connect("localhost","root","","amz") or die(mysql_error());
	
	$email = $username = $password = "";
/*
	if(!isset($_POST["signup"])){
		header('Location:regipage.php');
	}
	*/

		$email = test_input($_POST["email"]);
 		$username = test_input($_POST["regi_username"]);
 		$password1 = test_input($_POST["regi_password1"]);
 		$password2 = test_input($_POST["regi_password2"]);

		function test_input($data) {
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
		}

		if($password1 != $password2){
			//header('Location:regipage.php');
		}

		$check_email = mysqli_query($con,"select * from users where email = '$email';");
		if(mysqli_num_rows($check_email)>1){
			header('Location: regipage.php');
			exit();
	  }

		$userpass = password_hash($_POST['regi_password1'], PASSWORD_BCRYPT);
		$query = "insert into users(username, password, email) values ('$username','$userpass','$email')";
		$result = mysqli_query($con,$query);

		if($result){
			echo "<html>alert('Success')</html>";
			header('Location:regipage.php');
		}
		else{
			die('Error: ' . mysqli_error($con));
		}
		
		mysqli_close($con);
		
?>