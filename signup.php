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

		/*if(!isset($_POST["regi_username"])){
			header('Location:regipage.php');
			exit();
		}*/

		if($password1 != $password2){
			header('Location:regipage.html');
		}
		//else{

		//}


	
		$query = "insert into users(username, password, email) values ('$username','$password1','$email')";
		$result = mysqli_query($con,$query);
		if($result){
		//echo "<p>insert success'<p>";
			header('Location:regipage.html');
		}


		mysqli_close($con);
		
?>