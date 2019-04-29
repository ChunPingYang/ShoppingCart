<?php include_once 'connection.php';?>
<?php
session_start();

$userid			= ( isset( $_SESSION['userid'] ) ) ? $_SESSION['userid'] : "guest";
$username		= ( isset( $_SESSION['username'] ) ) ? $_SESSION['username'] : "guest";
$pid            = ( isset( $_POST['pid'] ) ) ? $_POST['pid'] : -1;
$price            = ( isset( $_POST['price'] ) ) ? $_POST['price'] : 0;

$query = "insert into cart(userid, pid, quantity, last_update_username, last_update_date)
                    values ($userid, $pid, 1,  '$username',CURDATE())";

$result = mysqli_query($con,$query);

if($result){
    header('Location:productList.php');
}
else{
    die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
?>