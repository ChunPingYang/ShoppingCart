<?php
	session_start();

	$con = mysqli_connect("localhost","root","","amz") or die(mysql_error());
	
	$email = $username = $password = "";


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

		//if(!$username){
			//$nameErr = "username cannot be empty!";
			//$_SESSION["nameErr"] = $nameErr;
			//header('Location:regipage.php');
		//}

		//if($password1 == $password2){
		//	$password = $password1;
		//	$query = "insert into user(username, password, email) values ('$username','$password','$email')";
		//	$result = mysqli_query($con,$query);
		//}
		//else{

		//}
	
		$query = "insert into users(username, password, email) values ('$username','$password1','$email')";
		$result = mysqli_query($con,$query);
		if($result){
		echo "<p>insert success'<p>";
		}

		mysqli_close($con);
		
?>