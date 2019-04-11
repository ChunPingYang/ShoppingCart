<?php
session_start();
try{
    $con = mysqli_connect("localhost", "root", "", "amz") or die(mysql_error());
    $email = $username = $password = "";
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
        $userid=$_SESSION['userid'];
		$email = test_input($_POST["email"]);
        $username = test_input($_POST["username"]);
        $phone = test_input($_POST["phone"]);
        
        $address = test_input($_POST["address"]);
     
        $state =  test_input($_POST["state"]);
        $city =  test_input($_POST["city"]);
        $zip = test_input($_POST["zip"]);
      $query = "update users set username='$username',email='$email', mobile='$phone',address='$address',state='$state',city='$city',zip='$zip' where userid='$userid'";
       $result = mysqli_query($con,$query);
       if ($result){
           echo "<p> update success!</p>";
           header('Location:profile.php');
       }
       else {
        echo "<p> update failed!</p>";
       }
       mysqli_close($con);
}
catch (Exception $e) {
	
	echo "connection not established";
}
?>
