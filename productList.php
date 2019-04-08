<?php include_once 'inc/header.php';?>
<?php include_once 'inc/nav.php';?>
<link href="./css/productList.sort.css?version=2.0" rel='stylesheet' type='text/css' />

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

		load();

	});

</script>

		<main class="card-container"> 
			<nav class="sortbar">
			
						<ul>
							<li>Sort by:</li>
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
				
		</main>
		
		<?php include_once 'inc/footer.php';?>
		
		<script src="./js/productList.js"></script>