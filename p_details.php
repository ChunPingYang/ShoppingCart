<?php
include_once 'connection.php';
$id = $_GET['q'];
session_start();
if(isset($_SESSION['userid'])){
	

}

if(!empty($id)){
	$sql = "select * from product where itemid = '".$id."' ";
	$result = mysqli_query($con,$sql);

	while ($row = $result->fetch_assoc()){
		$name = $row['pname'];
		$company = $row['company'];
		$rating = $row['rating'];
		$category = $row['category'];
		$description = $row['description'];
		$price = $row['price'];
		$rl_date = $row['release_date'];
		$href = $row['href'];
		$image = $row['image'];
		$s1 = $row['screenshots1'];
		$s2 = $row['screenshots2'];
		$s3 = $row['screenshots3'];

	}
}



?>

<!DOCTYPE html>
<html>

<head>
	<title>Amazing Shopping Group</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta property="og:title" content="Vide" />
	<meta name="keywords" content="amazing shopping" />

	<!-- //for-mobile-apps -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!-- js -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<!-- //js -->
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="css/font-awesome.css" rel="stylesheet">

</head>

<body>

	<!-- Loading the header -->
	<header class="header">
	</header>
	<script>
		$(function () {
			$(".header").load("header.html");
		});
	</script>
	<!-- End of header -->

	<div class="container">

		<!-- left nav bar -->
		<div class="col-sm-3">
		</div>
		<script>
			$(function () {
				$(".col-sm-3").load("nav.html");
			});
		</script>
		<!-- end of nav bar -->


		<div class="col-sm-8" style="border:1 px solid black">
			<h1><?php echo $name;?></h1>
			<cite style="font-size: 15px">by <?php echo $company;?></cite>
			<style>
				* {
					box-sizing: border-box;
				}

				/* Create three unequal columns that floats next to each other */
				.column {
					float: left;
					padding: 10px;
					height: auto;
					/* Should be removed. Only for demonstration */
				}

				.left,
				.right {
					width: 30%;
				}

				.middle {
					width: 30%;
				}

				/* Clear floats after the columns */
				.row:after {
					content: "";
					display: table;
					clear: both;
				}
			</style>
			<div class="row">
				<div class="column left">
					<h2><img src=<?php echo $image;?> alt="picture"></h2>
					<p></p>
				</div>
				<div class="column right" style = "padding-left:40%">
					<h2>Price: $<?php echo $price;?></h2>
					<form method = "post">
					<button type="button" value="addCart" name = "addcart"><img src="imgs/buy-now-flashing.gif" alt="buy now" width="200"></button>
					</form>
				</div>
			</div>
			<div class = "row">
				<div class="column middle">
					<h3>Key Features:</h3>
					<p style="font-size: 15px">
						<ul style="font-size: 15px">
							<li> Release Date:<?php echo $rl_date;?></li>
							<li> <?php echo $category;?> game</li>
							<li> Rating:<?php echo $rating;?></li>
						</ul>
					</p>					
			 </div>
			 <h2>Product details</h2>
			        <p style="font-size: 15px"><?php echo $description;?>.</p>
			<img class = "middle" src=<?php echo $s1;?>>
			<img class = "middle" src=<?php echo $s2;?>>
			<img class = "middle" src=<?php echo $s3;?>>

			</div>
			
		</div>

	</div>

</body>