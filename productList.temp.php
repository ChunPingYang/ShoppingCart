<?php include 'inc/header.php';?>
<?php include 'inc/nav.php';?>
<link href="./css/productList.sort.css?version=3.0" rel='stylesheet' type='text/css' />
<link href="./css/productList.css?version=3.0" rel='stylesheet' type='text/css' />




		<main class="card-container"> 
				<nav style="border:1px solid red;width:100%;">
					<ul>
						<li>Sort by:</li>
						<li>
							<div class="custom-select" style="width:150px;">
								<select>
									<option value="0">Top Rated</option>
									<option value="1">Price:Low to High</option>
									<option value="2">Price:High to Low</option>
								</select>
							</div>
						</li>
						<li>Display:</li>
						<li>
							<div class="custom-select" style="width:150px;">
								<select>
									<option value="0">5 per page</option>
									<option value="1">10 per page</option>
									<option value="2">15 per page</option>
								</select>
							</div>
						</li>
					</ul>
				</nav>
				<article class="card">
					<div>
						<figure class="">
							<img  src="imgs/samsung.jpg">
						</figure>
					</div>
					<div class="productDes">
						<h2>AAA</h3>
						<p>AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</p>
					</div>	
					<div class="col3">
						<div class="column">
							
						</div>
						<div class="column">
							<i class="fa fa-dollar" style="font-size:48px;color:red">100</i>
						</div>
						<div class="column">
							<input type="text">
							<button type="button">Add to Cart</button>
						</div>
					</div>		
				</article>
				<article class="card">
					<div>
						<figure class="">
							<a href="product.html"><img  src="imgs/samsung.jpg"></a>
						</figure>
					</div>
					<div>
						
					</div>	
					<div>
						
					</div>
				</article>
				<article class="card">
					<div>
						<figure class="">
							<img  src="imgs/samsung.jpg">
						</figure>
					</div>
					<div>
						
					</div>	
					<div>
						
					</div>
				</article>
				<article class="card">
					<div>
						<figure class="">
							<img  src="imgs/samsung.jpg">
						</figure>
					</div>
					<div>
						
					</div>	
					<div>
						
					</div>
				</article>
				<article class="card">
					<div>
						<figure class="">
							<img  src="imgs/samsung.jpg">
						</figure>
					</div>
					<div>
						
					</div>	
					<div>
						
					</div>
				</article>
		</main>

		<?php include 'inc/footer.php';?>

		<script src="./js/productList.js"></script>
		
