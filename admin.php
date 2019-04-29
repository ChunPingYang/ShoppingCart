<?php include_once 'connection.php';?>
<?php include_once 'admin_Paginator.class.php';?>

<?php
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
//echo "Connected successfully";
if(isset($_POST['update'])){


$pname = mysqli_real_escape_string($con, $_POST['pname']);
$catagory = mysqli_real_escape_string($con, $_POST['catagory']);
$rating = mysqli_real_escape_string($con, $_POST['rating']);
$price = mysqli_real_escape_string($con, $_POST['price']);
$company = mysqli_real_escape_string($con, $_POST['company']);
$release_date = date('Y-m-d', strtotime($_POST['release_date']));
$image = mysqli_real_escape_string($con, $_POST['image']);
$description = mysqli_real_escape_string($con, $_POST['description']);

  if(!$pname||!$price||!$description){
    header('Location:admin.php');
    exit();
  }


$sql="INSERT INTO product (pname, price, rating, company, image, description, release_date) VALUES ('$pname', '$price','$rating', '$company', '$image', '$description', '$release_date')";
if (!mysqli_query($con,$sql))
        {
        die('Error: ' . mysqli_error($con));
        }
mysqli_query($con,"insert into catagory (cname) values $catagory");

}
?>

<?php
	session_start();

	$userid			= ( isset( $_SESSION['userid'] ) ) ? $_SESSION['userid'] : "guest";
	$username		= ( isset( $_SESSION['username'] ) ) ? $_SESSION['username'] : "guest";
	$option     	= ( isset( $_GET['option'] ) ) ? $_GET['option'] : 1;
	$limit      	= ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 10;
	$page       	= ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
	$links      	= ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
	
$sql = "SELECT * FROM product WHERE display = 1";
if(isset($_POST['search'])){

	$keyword = trim($_POST['search']);
	$sql .= " AND pname like '%$keyword%'";

}else{

}

 $Paginator = new Paginator($con,$sql);
 $num_rows = $Paginator->getResult();
 $results = false;
 if($num_rows > 0){
 	$results = $Paginator->getData( $limit, $page );
 }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type = "text/css" href = "css/regi_style.css?version=2.0">
<link href="./css/productList.css?version=2.0" rel="stylesheet" type="text/css"/>

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
        <input type="text" id= "catagory" name="catagory" placeholder="Category">
        <input type="text" id= "price" name="price" placeholder="Price">
        <input type="text" id= "rating" name="rating" placeholder="Rating">
        <input type="text" id="company" name="company" placeholder="Company">
        <input type="date" id = "release_date" name="release_date" value="<?php echo date('Y-m-d'); ?>">
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
 
    <form align = "center" action="" method="POST">
						<input id= "search" type = "text" value = "" name="search" placeholder="Search item"/>
						<input id = "sersub" type = "submit" value = "submit"/>
          </form>

</div>

<main>
				<?php if($num_rows > 0){ ?>
						<?php for( $i = 0; $i < count( $results->data ); $i++ ) : ?>
							<article>
									<div>
										<figure>
											<a href = "p_details.php?q=<?php echo $results->data[$i]['itemid'];?>"> <img style="border-radius: 5px;"src=<?php echo $results->data[$i]['image'];?>/></a>
										</figure>
									</div>
									<div class="productDes">
										<h3><?php echo $results->data[$i]['pname']; ?></h3>
										<i style="font-size:36px;color:red">
											<?php echo $results->data[$i]['rating']; ?>
										</i>
									</div>
									<div>
										<div class="column">
											
										</div>
										<div class="column">
											<i name="price" class="fa fa-dollar" style="font-size:48px;color:red">
												<?php echo $results->data[$i]['price']; ?>
											</i>
										</div>
										<div class="column">
											<input type="hidden" value="<?php echo $results->data[$i]['itemid'];?>" />
											<button type="button" class="addCart">Delete item</button>
										</div>
									</div>	
							</article>
						<?php endfor;?>
                        <?php echo $Paginator->createLinks( $links, 'pagination pagination-sm',$option); ?> 
                <?php } ?>
            </main>
</body>
</html>

