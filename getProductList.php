<?php include_once 'connection.php';?>
<?php

$sql = "";
if(isset($_POST['price'])){
	if($_POST['price'] == 0){
		$sql = "SELECT * FROM product WHERE price <= 20";
	}else if($_POST['price'] == 1){
		$sql = "SELECT * FROM product WHERE price BETWEEN 21 AND 30";
	}else if($_POST['price'] == 2){
		$sql = "SELECT * FROM product WHERE price BETWEEN 31 AND 40";
	}else if($_POST['price'] == 3){
		$sql = "SELECT * FROM product WHERE price BETWEEN 41 AND 50";
	}else if($_POST['price'] == 4){
		$sql = "SELECT * FROM product WHERE price >= 51";
	}
}else{
	$sql = "SELECT * FROM product";
}

//Put query parameter

if($statement = mysqli_prepare($con,$sql)){

    //mysqli_stmt_bind_param($statement,'s',$user);

    mysqli_stmt_execute($statement);
    mysqli_stmt_bind_result($statement,$Game_name,$price,$releaseDate,$href,$image,$company,$rating,$catagory,$desc,$screenshots1,$screenshots2,$screenshots3,$pid);

    while(mysqli_stmt_fetch($statement)){
		echo "Price".$_GET['price'];
        echo '<article class="card">';
		echo			'<div>';
		echo				'<figure class="">';
		echo					'<img  src="'.$image.'"/>';
		echo				'</figure>';
		echo			'</div>';
        echo			'<div class="productDes">';
        echo                '<h2>'.$Game_name.'</h2>';
        echo                '<p>'.$desc.'</p>';
		echo			'</div>';
		echo			'<div class="col3">';
		echo				'<div class="column">';
                               
		echo				'</div>';
		echo				'<div class="column">';
		echo					'<i name="price" class="fa fa-dollar" style="font-size:48px;color:red">'.$price.'</i>';
		echo				'</div>';
		echo				'<div class="column">';
		echo					'<input type="text">';
		echo					'<button type="button" class="addCart">Add to Cart</button>';
		echo				'</div>';
		echo			'</div>';		
		echo '</article>';
        
    }

}


?>