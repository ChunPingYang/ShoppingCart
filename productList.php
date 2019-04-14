<?php include_once 'inc/header.php';?>
<?php include_once 'inc/nav.php';?>
<?php include_once 'connection.php';?>
<?php include_once 'Paginator.class.php';?>
<link href="./css/productList.sort.css?version3.0" rel='stylesheet' type='text/css' />
<link href="./css/productList.css?version=3.0" rel="stylesheet" type="text/css" />

<?php

	$option     = ( isset( $_GET['option'] ) ) ? $_GET['option'] : 1;
	$limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 3;
	$page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
	$links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;

	$sql = "SELECT * FROM product ORDER BY price ASC";
	if($option == 2){
		$sql = "SELECT * FROM product ORDER BY PRICE DESC";
	}
	$Paginator = new Paginator($con,$sql);
	$results    = $Paginator->getData( $limit, $page );

?>

<script type="text/javascript">

	$(document).ready(function(){

		function load(){

			$.ajax({
				type: "POST",
				url: "getProductList.php",
				dataType: "html",
				beforeSend: function(jqXHR,settings){
					$('head').append($('<link rel="stylesheet" type="text/css" />').attr('href','./css/productList.css?version=3.0'));
					
				},
				success: function(data){
					//alert(data);
					$(".card-container").append(data);
				},
				complete: function(){
					
				}
			});
		}

		//load();
		
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
				
				<?php for( $i = 0; $i < count( $results->data ); $i++ ) : ?>
							<article class="card">
									<div>
										<figure class="">
											<img  src="imgs/samsung.jpg">
										</figure>
									</div>
									<div class="productDes">
										<h2><?php echo $results->data[$i]['pname']; ?></h2>
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
				<?php endfor; ?>
				<?php echo $Paginator->createLinks( $links, 'pagination pagination-sm',$option); ?> 
		</main>
		
		<?php include_once 'inc/footer.php';?>
		
		<script src="./js/productList.js?version=1.0"></script>
		<!--
		<script type="text/javascript">
		/*挑選sort無法display*/
			var optionDiv = document.getElementsByClassName("select-items");
			var option = optionDiv[0].getElementsByTagName("DIV");
			for(var i=0;i<option.length;i++){
				if(option[i].getAttribute("value") == <?php echo $option?>){

						console.log("option: "+option[i].getAttribute('value'));

						/*when an item is clicked, update the original select box,
						and the selected item:*/
						var y, i, k, s, h;
						s = option[i].parentNode.parentNode.getElementsByTagName("select")[0];
						h = option[i].parentNode.previousSibling; //最上層要顯示的
						for (i = 0; i < s.length; i++) {
							if (s.options[i].innerHTML == option[i].innerHTML) {
								s.selectedIndex = i;
								h.innerHTML = option[i].innerHTML;
								y = option[i].parentNode.getElementsByClassName("same-as-selected");
								for (k = 0; k < y.length; k++) {
									y[k].removeAttribute("class");
								}
								option[i].setAttribute("class", "same-as-selected");
								break;
							}
						}
						//h.click();
						break;
				}
			}
		</script>
		-->