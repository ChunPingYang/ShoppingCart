<?php include_once 'connection.php';?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/nav.php';?>
<?php include_once 'Paginator.class.php';?>
<link href="./css/productList.sort.css?version=3.0" rel='stylesheet' type='text/css' />
<link href="./css/productList.css?version=1.0" rel="stylesheet" type="text/css" />

<?php

	$userid			= ( isset( $_SESSION['userid'] ) ) ? $_SESSION['userid'] : "guest";
	$username		= ( isset( $_SESSION['username'] ) ) ? $_SESSION['username'] : "guest";
	$price			= ( isset( $_GET['price'] ) ) ? $_GET['price'] : -1;
	$category     	= ( isset( $_GET['category'] ) ) ? $_GET['category'] : "all";
	$option     	= ( isset( $_GET['option'] ) ) ? $_GET['option'] : 1;
	$limit      	= ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 10;
	$page       	= ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
	$links      	= ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
	$minimum_rating = ( isset( $_GET['minimum_rating'] ) ) ? $_GET['minimum_rating'] : 0;
	$maximum_rating = ( isset( $_GET['maximum_rating'] ) ) ? $_GET['maximum_rating'] : 99; //TODO SQL Type to Integer
	
$sql = "SELECT * FROM product WHERE display = 1";
if(isset($_POST['search'])){ 

	$keyword = trim($_POST['search']);
	$sql .= " AND pname like '%$keyword%'";

}else{
//10x+11 10x+20
	if($price == 0){
		$sql .= " AND price <= 20";
		
	}

	for($i=1;$i<=3;$i++){
		if($price == $i){
			$sql .= " AND price BETWEEN $i*10+11 AND $i*10+20";
			break;
		}
	}
	
	if($price == 4){
		$sql .= " AND price >= 51";
	}
}

$sql .= " 
		AND rating BETWEEN '".$minimum_rating."%' AND '".$maximum_rating."%'
		";


if($category != "all"){
	$sql .= " AND category =  '".$category."' ";	
}
		
if($option == 1){
	$sql .= " ORDER BY price ASC";
}else if($option == 2){
	$sql .= " ORDER BY price DESC";
}

 $Paginator = new Paginator($con,$sql);
 $num_rows = $Paginator->getResult();
 $results = false;
 if($num_rows > 0){
 	$results = $Paginator->getData( $limit, $page );
 }
?>

<script type="text/javascript">

	$(document).ready(function(){
		
		$('input[type=radio][name=price]').click(function(){
			$('#navForm').submit();
		});

		$('input[type=radio][name=price]').each(function(){
			if(this.value == '<?php echo $price?>'){
				this.checked = true;
			}
		});

		$('select[name=sort]').each(function(){
			$(this).find('option[value="<?php echo $option?>"]').prop('selected', true);
		});

		$('select[name=category]').each(function(){
			$(this).find('option[value="<?php echo $category?>"]').prop('selected', true);
		});

		$('#rating_show').html(<?php echo $minimum_rating?> + ' - ' + <?php echo $maximum_rating?>);
		$('#rating_range').slider({
			range:true,
			min:0,
			max:99, //TODO SQL Type to Integer
			values:[<?php echo $minimum_rating?>, <?php echo $maximum_rating?>],
			step:11,
			stop:function(event, ui)
			{
				$('#rating_show').html(ui.values[0] + ' - ' + ui.values[1]);
				$('#hidden_minimum_rating').val(ui.values[0]);
				$('#hidden_maximum_rating').val(ui.values[1]);
				
				document.getElementById("navForm").submit();

			}
    	});
		

		$('button').click(function(){
		
			if("<?php echo $userid ?>" == "guest" && "<?php echo $username ?>" == "guest"){
				window.location = "regipage.php";
			}

			var element = $(this);

			if($(this).val() == 'addCart'){
				$.ajax({
					type: "POST",
					url: "addCart.php",
					data:{pid:$(this).prev().val(),price:$(this).prev().prev().val()},
					dataType:"html",
					success: function(data){
						alert("Success Add Item");
					},
					complete: function(){
						element.hide();
						element.next().css("visibility", "visible");
					},
					error: function (xhr, ajaxOptions, thrownError) {
						alert(xhr.status);
						alert(thrownError);
					}
				});
			}else if($(this).val() == 'viewCart'){
				window.location = "shoppingCart.php";
			}
		});

	});

</script>

		<main> 
			<form id="priceSort" method="GET">
				<input type="hidden" name="price" value="<?php echo $price?>"/>
				<input type="hidden" name="minimum_rating" value="<?php echo $minimum_rating?>" />
                <input type="hidden" name="maximum_rating" value="<?php echo $maximum_rating?>" />	
				<nav class="sortbar">
						<ul>
							<li ><h2>Sort by:</h2></li>
							<li>
								<div name="sort" class="custom-select" style="width:150px;">
									<select name="option">
										<option value="1">Price:Low to High</option>
										<option value="2">Price:High to Low</option>
									</select>
								</div>
							</li>
							<li>
								<div name="cate" class="custom-select" style="width:150px;">
									<select name="category">
										<option value = "all">Category</option>
										<?php 
										$sql = mysqli_query($con, "SELECT cname FROM catagory");
										while ($row = $sql->fetch_assoc()){
										$name = $row['cname'];
										echo "<option value='$name'>$name</option>";
										}
										?>
									</select>
								</div>
							</li>

						</ul>
				</nav>
			</form>

				<?php if($num_rows > 0){ ?>
						<?php for( $i = 0; $i < count( $results->data ); $i++ ) : ?>
							<article>
									<div>
										<figure>
											<a href = "p_details.php?q=<?php echo $results->data[$i]['itemid'];?>"> <img style="border-radius: 5px;"src=<?php echo $results->data[$i]['image'];?>/></a>
										</figure>
									</div>
									<div class="productDes" style = "padding-left:30%">
										<h4><?php echo $results->data[$i]['category']; ?></h4>
										<br>
										<h3><?php echo $results->data[$i]['pname']; ?></h3>
										<i class="fa" style="font-size:20px;color:rgb(255, 165, 30)">
											<?php echo $results->data[$i]['rating']; ?>
										</i>
									</div>
									<div>
										<div class="column">
											
										</div>
										<div class="column">
											<i name="price" class="fa fa-dollar" style="font-size:40px;color:#405622">
												<?php echo $results->data[$i]['price']; ?>
											</i>
										</div>
										<div class="column">
											<input type="hidden" value="<?php echo $results->data[$i]['price'];?>" />
											<input type="hidden" value="<?php echo $results->data[$i]['itemid'];?>" />
											<button type="button" value="addCart">Add to Cart</button>
											<button style="visibility:hidden" type="button" value="viewCart">View Cart</button>
										</div>
									</div>	
							</article>
						<?php endfor;?>
				<?php echo $Paginator->createLinks( $links, 'pagination pagination-sm',$option, $price, $minimum_rating, $maximum_rating); ?> 
				<?php } ?>
		</main>
		
		<?php include_once 'inc/footer.php';?>
		
		<script src="./js/productList.js?version=3.0"></script>
		