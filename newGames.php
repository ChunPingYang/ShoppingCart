<?php 
session_start();
$con=mysqli_connect("localhost","root","","amz");
$userid = $_SESSION['userid'];

$sql = "SELECT * FROM `product` ORDER BY `product`.`release date` DESC";
$result = mysqli_query($con,$sql);
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
	<script src="js/newGames.js"></script>
	<!-- //js -->
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/newGames.css">
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

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


		<!-- put your content here -->
		<div class="col-sm-8" style="border:1 px solid black">
           
			<div class="row">
            <?php
            $i =0;
            $match = [
                1=>"product--blue",
                2=>"product--orange",
                3=>"product--yellow",
                4=>"product--green",
                5=>"product--pink",
                6=>"product--red",
                7=>"product--blue",
                8=>"product--pink",
            ];
            while ($row = $result-> fetch_assoc() and $i<8){
                $img = $row['image'];
                $name = $row['pname'];
                $price = $row['price'];
                $detail = $row['description'];
                $detail = strtok($detail,",.");
                $date = $row['release date'];
                $i=$i+1;
                
                ?>
				<div class="<?php echo "$match[$i]"; ?>">
					<div class="product_inner">
                        <img src=<?php echo "$img"; ?> />
                        <p><?php echo "$name"; ?></p>
                        
						<p>Released <?php echo "$date"?> </p>
						<p>Price <?php echo "$price";?></p>
						<button>Add to cart</button>
					</div>
					<div class="product_overlay">
						<h2>Added to cart</h2>
					</div>
				</div>
				<?php } ?>  
            </div>
            
		</div>

</body>