
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
<link href="./css/style.css?version=1.0" rel='stylesheet' type='text/css' />



</head>

<body>

<div class="container1st">

<header class="header">

		<div class="container" style="width:100%;">

				<div class="nav-top">
					<nav class="navbar navbar-default">

					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav ">
							<li class="active"><a href="index.html" class="hyper "><span>Home</span></a></li>
							<li><a href="#" class="hyper"> <span>Best Sellers</span></a></li>
							<li><a href="#" class="hyper"><span>New Games</span></a></li>
						</ul>
					</div>
					</nav>
					<div class="cart" >
						<a href="profile.php" id="cart"><i class="fa fa-shopping-cart"></i> Cart <span class="badge">3</span></a>
					</div>
					<form align = "center" action="productList.php" method="POST">
						<font size = "5">Search:</font>
						<input type = "text" value = "" name="search"/>
						<input type = "submit" value = "submit"/>
					</form>
				</div>

		</div>
	</header>
