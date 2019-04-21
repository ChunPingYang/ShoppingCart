<?php include_once 'inc/header.php';?>
<?php include_once 'inc/nav.php';?>
<?php include_once 'connection.php';?>
<?php include_once 'Paginator.class.php';?>
<link href="./css/productList.sort.css?version3.0" rel='stylesheet' type='text/css' />
<link href="./css/productList.css?version=3.0" rel="stylesheet" type="text/css" />

<?php

	$price		= ( isset( $_GET['price'] ) ) ? $_GET['price'] : -1;
	$option     = ( isset( $_GET['option'] ) ) ? $_GET['option'] : 1;
	$limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 10;
	$page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
	$links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
	
$sql = "";
if(isset($_POST['search'])){
	$keyword = trim($_POST['search']);

	$sql = "SELECT * FROM product_test WHERE Game_name like '%$keyword%' ORDER BY price ASC";
	if($option == 2){
		$sql = "SELECT * FROM product_test WHERE Game_name like '%$keyword%' ORDER BY price DESC";
	}

}else{

	if($price == -1){
		$sql = "SELECT * FROM product_test ORDER BY price ASC";
		if($option == 2){
			$sql = "SELECT * FROM product_test ORDER BY price DESC";
		}
	}else if($price == 0){
		$sql = "SELECT * FROM product_test WHERE price <= 20 ORDER BY price ASC";
		if($option == 2){
			$sql = "SELECT * FROM product_test WHERE price <= 20 ORDER BY price DESC";
		}
	}else if($price == 1){
		$sql = "SELECT * FROM product_test WHERE price BETWEEN 21 AND 30 ORDER BY price ASC";
		if($option == 2){
			$sql = "SELECT * FROM product_test WHERE price BETWEEN 21 AND 30 ORDER BY price DESC";
		}
	}else if($price == 2){
		$sql = "SELECT * FROM product_test WHERE price BETWEEN 31 AND 40 ORDER BY price ASC";
		if($option == 2){
			$sql = "SELECT * FROM product_test WHERE price BETWEEN 31 AND 40 ORDER BY price DESC";
		}
	}else if($price == 3){
		$sql = "SELECT * FROM product_test WHERE price BETWEEN 41 AND 50 ORDER BY price ASC";
		if($option == 2){
			$sql = "SELECT * FROM product_test WHERE price BETWEEN 41 AND 50 ORDER BY price DESC";
		}
	}else if($price == 4){
		$sql = "SELECT * FROM product_test WHERE price >= 51 ORDER BY price ASC";
		if($option == 2){
			$sql = "SELECT * FROM product_test WHERE price >= 51 ORDER BY price DESC";
		}
	}

}

 echo "sql: ".$sql;
 $Paginator = new Paginator($con,$sql);
 $rs = $Paginator->getResult();
 $results = false;
 if($rs){
 	$results    = $Paginator->getData( $limit, $page );
 }
?>

<script type="text/javascript">

	$(document).ready(function(){

		//Filter by price
		$('input[type=radio][name=price]').change(function() {
			console.log("price: "+this.value);  //TODO why this.value undefined
			var price = this.value;
			$.ajax({
				type: "GET",
				success: function(data){
					window.location = '?option=<?php echo $option?>&price='+price;
				},
				error: function (xhr, ajaxOptions, thrownError) {
					console.log("status: "+xhr.status);
					console.log("Error: "+thrownError);
				}
			});
		});

		$('input[type=radio][name=price]').each(function(){
			if(this.value == <?php echo $price?>){
				this.checked = true;
			}
		})

		
	});
</script>

		<main class="card-container"> 
				<nav class="sortbar">
						<ul>
							<li >Sort by:</li>
							<li>
								<div name="sort" class="custom-select" style="width:150px;">
									<select>
										<option value="0">Top Rated</option>
										<option value="1">Price:Low to High</option>
										<option value="2">Price:High to Low</option>
									</select>
								</div>
							</li>
							<li>Display:</li>
							<li>
								<div id="viewPage" class="" style="width:150px;">
									<select>
										<option value="0">5 per page</option>
										<option value="1">10 per page</option>
										<option value="2">15 per page</option>
									</select>
								</div>
							</li>
						</ul>
				</nav>
				
				<?php if($results){ ?>
						<?php for( $i = 0; $i < count( $results->data ); $i++ ) : ?>
							<article class="card">
									<div>
										<figure class="">
											<img src=<?php echo $results->data[$i]['image'];?>/>
										</figure>
									</div>
									<div class="productDes">
										<h2><?php echo $results->data[$i]['Game_name']; ?></h2>
										<p><?php echo $results->data[$i]['description']; ?></p>
									</div>
									<div class="col3">
										<div class="column">
											
										</div>
										<div class="column">
											<i name="price" class="fa fa-dollar" style="font-size:48px;color:red">
												<?php echo $results->data[$i]['price']; ?>
											</i>
										</div>
										<div class="column">
											<input type="text">
											<button type="button" class="addCart">Add to Cart</button>
										</div>
									</div>	
							</article>
						<?php endfor;?>
				<?php echo $Paginator->createLinks( $links, 'pagination pagination-sm',$option); ?> 
				<?php } ?>
		</main>
		
		<?php include_once 'inc/footer.php';?>
		
		<script src="./js/productList.js?version=2.0"></script>
		