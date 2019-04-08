<?php
$servername = 'localhost';
$username = 'root';
$password = '';

// Create connection
$con = new mysqli($servername, $username, $password, "shoppingcart");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

//Put query parameter


$sql = "SELECT * FROM product";

if($statement = mysqli_prepare($con,$sql)){

    //mysqli_stmt_bind_param($statement,'s',$user);

    mysqli_stmt_execute($statement);
    mysqli_stmt_bind_result($statement,$itemid,$cid,$pname,$price,$n_sold,$release_date,$n_instock,$image,$desc,$last_update_username,$last_update_date);

    while(mysqli_stmt_fetch($statement)){

        echo '<article class="card">';
		echo			'<div>';
		echo				'<figure class="">';
		echo					'<img  src="imgs/samsung.jpg">';
		echo				'</figure>';
		echo			'</div>';
        echo			'<div class="productDes">';
        echo                '<h2>'.$pname.'</h2>';
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