<?php
$servername = 'localhost';
$username = 'root';
$password = '';

// Create connection
$con = new mysqli($servername, $username, $password, "pw5");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
//echo "Connected successfully";
if(isset($_POST['update'])){
$pname = $catagory = $n_instock = $release_date = $image = '';

$pname = mysqli_real_escape_string($con, $_POST['pname']);
$catagory = mysqli_real_escape_string($con, $_POST['catagory']);
$price = mysqli_real_escape_string($con, $_POST['price']);
$n_instock = mysqli_real_escape_string($con, $_POST['n_instock']);
$release_date = mysqli_real_escape_string($con, $_POST['release_date']);
$image = mysqli_real_escape_string($con, $_POST['image']);
$description = mysqli_real_escape_string($con, $_POST['description']);

  if(!$pname||!$price||!$n_instock||!$release_date||!$description){
    header('Location:admin.php');
    exit();
  }

$sql="INSERT INTO product (pname, price, n_instock, release_date, image, description) VALUES "
        . "('$pname', '$price', '$n_instock', '$release_date', '$image', 'description')";
if (!mysqli_query($con,$sql))
        {
        die('Error: ' . mysqli_error($con));
        }
//echo "1 record added";
//$sql="INSERT INTO favoritebooks (username, booktitle) VALUES "
        //. "('$username', '$book')";
//if (!mysqli_query($con,$sql))
        //{
       // die('Error: ' . mysqli_error($con));
       // }
//echo "1 record added";

}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type = "text/css" href = "css/regi_style.css">


</head>
<body>

<div class="container">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <div class="row">
      <h2 style="text-align:center">Edit product informaiton:</h2>
      <div class="vl">
      </div>

      <div class="col">
      	<div class="hide-md-lg">
          <p>Edit product informaiton:</p>
        </div>
        <input type="text" id="pname" name="pname" placeholder="Name">
        <input type="text" id= "catagory" name="catagory" placeholder="Catagory">
        <input type="text" id= "price" name="price" placeholder="Price">
        <input type="text" id="n_instock" name="n_instock" placeholder="Quantities">
        <input type="text" name="release_date" placeholder="Release Date">
        <input type="text" id="image" name="image" placeholder="image">
      </div>

      <div class = "col">
        <input style = "height: 180px" type="text" id = "description" name="description" placeholder="Description">
        <input type="submit" value="Update" name="update">
      </div>
     
    </div>
  </form>
</div>

<div class="bottom-container">
  <div class="row">
    <div class="col">
    </div>
  </div>
</div>

</body>
</html>

