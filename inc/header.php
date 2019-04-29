<?php 
	session_start();

	$userid			= ( isset( $_SESSION['userid'] ) ) ? $_SESSION['userid'] : "guest";
	//SELECT count(*) FROM `cart` WHERE userid = 2;
	$result = mysqli_query($con,"select * from cart where userid = $userid;");
	$num_cart = mysqli_num_rows($result);

	$result = mysqli_query($con,"select * from users where userid = $userid;");
	$admin = false;
	while($userData = mysqli_fetch_array($result)){
		$admin = $userData['admin'];
	}
?>

<!DOCTYPE html>
<html>
<head>

<title>ShoppingCart</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="ShoppingCart meta" />

<!-- js -->
<script src="./js/jquery-1.11.1.min.js"></script> <!--no change-->
<script src="./js/bootstrap.js"></script> <!--no change-->
<!-- //js -->

<link href="./css/font-awesome.css" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- //for-mobile-apps -->
<link href="./css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="./css/style.css?version=2.0" rel='stylesheet' type='text/css' />

<script type="text/javascript">
	$(document).ready(function(){

		if(<?php echo $admin?> == false){
			$("#admin").hide();
		}

	})
</script>

</head>

<body>

<div class="container1st">

<header class="header">

		<div class="container" style="width:100%;">

				<div class="nav-top">
					<nav class="navbar navbar-default">
						<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
							<ul class="nav navbar-nav ">
								<li class="active"><a href="./productList.php" class="hyper "><span>Home</span></a></li>
								<li><a href="./bestSellers.php" class="hyper"> <span>Best Sellers</span></a></li>
								<li><a href="./newGames.php" class="hyper"><span>New Games</span></a></li>
								<li><a id="admin" href="./admin.php" class="hyper"><span>Edit Product</span></a></li>
							</ul>
						</div>
					</nav>
					<div class="cart">
						<a href="shoppingCart.php">
							<img src="https://img.icons8.com/ios/30/000000/user.png">
						</a>
					</div>
					<div class="cart" >
						<a href="profile.php" id="cart"><i class="fa fa-shopping-cart"></i> Cart <span class="badge"><?php echo $num_cart?></span></a>
					</div>
					<form align = "center" action="./productList.php" method="POST">
						<font size = "5">Search:</font>
						<input type = "text" value = "" name="search"/>
						<input type = "submit" value = "submit"/>
					</form>
				</div>

		</div>
	</header>
