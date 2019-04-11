<?php

	$con = mysqli_connect("localhost","root","","amz") or die(mysql_error());
	
	$email = $username = $password = "";

	if(!$username||!$password){
		header('Location:login.html');
	}
	
	else{
		
		$_SESSION["username"]=$username;
	
		$username = mysqli_real_escape_string($con, $_POST["username"]);
		$query = "select username, password FROM users WHERE username = '$username';";
		$result = mysqli_query($con,$query);
	
		if(mysqli_num_rows($result)<1){// User not found. So, redirect to login_form again.
			  header('Location: login.html');
			  exit();
		}
		
		while($userData = mysqli_fetch_array($result)){
			if(password_verify($_POST["password"], $userData['password'])){
			//mysqli_close($con);
			session_write_close();
			header('Location:welcome.php');
		}
			else{
			//mysqli_close($con);
			session_write_close();
			header('Location: login.html');
		}
	
		}
		
	
	}

	

?>