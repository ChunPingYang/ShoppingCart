<?php 
session_start();
$con=mysqli_connect("localhost","root","","amz");
$userid = $_SESSION['userid'];

$sql = "SELECT * from product P,cart C where C.userid = '$userid' and P.itemid = C.pid";
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
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/shoppingCart.js"></script>
	<!-- //js -->
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="css/shoppingCart.css" media="screen" title="no title" charset="utf-8">

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
			<h1>Shopping Cart</h1>

			<div class="shopping-cart">

				<div class="column-labels">
					<label class="product-image">Image</label>
					<label class="product-details">Product</label>
					<label class="product-price">Price</label>
					<label class="product-quantity">Quantity</label>
					<label class="product-removal">Remove</label>
					<label class="product-line-price">Total</label>
				</div>
                <?php 
                while ($row = $result-> fetch_assoc()){
                    $img = $row['image'];
                    $name = $row['pname'];
                    $price = $row['price'];
                    $detail = $row['description'];
                    $detail = strtok($detail,".");
                    $quantity = $row['quantity'];
                
                    ?>
				<div class="product">
					<div class="product-image">
						<img src=<?php echo "$img"; ?>>
					</div>
					<div class="product-details">
						<div class="product-title">
                            <?php echo "$name"; ?>
                        </div>
						<p class="product-description">
							<?php echo "$detail"; ?>
						</p>
					</div>
					<div class="product-price"><?php echo "$price";?></div>
					<div class="product-quantity">
						<input type="number" value=<?php echo "$quantity";?> min="1">
					</div>
					<div class="product-removal">
						<button class="remove-product">
							Remove
						</button>
					</div>
					<div class="product-line-price"><?php echo "$price";?></div>
				</div>
                <?php } ?>
            
		

				<div class="totals">
					<div class="totals-item">
						<label>Subtotal</label>
						<div class="totals-value" id="cart-subtotal"></div>
					</div>
					<div class="totals-item">
						<label>Tax (5%)</label>
						<div class="totals-value" id="cart-tax"></div>
					</div>
					<div class="totals-item">
						<label>Shipping</label>
						<div class="totals-value" id="cart-shipping">0</div>
					</div>
					<div class="totals-item totals-item-total">
						<label>Grand Total</label>
						<div class="totals-value" id="cart-total"></div>
					</div>
				</div>

				<button class="checkout">Checkout</button>

			</div>

</body>