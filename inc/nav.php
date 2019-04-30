<?php 
$minimum_rating = ( isset( $_GET['minimum_rating'] ) ) ? $_GET['minimum_rating'] : 0;
$maximum_rating = ( isset( $_GET['maximum_rating'] ) ) ? $_GET['maximum_rating'] : 99;
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<nav class="nav_container">
        <form id="navForm" action="./productList.php" method="GET">
            <div>
                <h3>Filter by Price</h3>
                <input type="radio" name="price" value="-1">All<br>
                <input type="radio" name="price" value="0">&lt= 20<br>
                <input type="radio" name="price" value="1">21~30<br>
                <input type="radio" name="price" value="2">31~40<br> 
                <input type="radio" name="price" value="3">41~50<br>
                <input type="radio" name="price" value="4">&gt= 51<br>  
            </div>
            <div>
                <h3>Filter by Rate</h3>
                <input type="hidden" id="hidden_minimum_rating" name="minimum_rating" value="<?php echo $minimum_rating?>" />
                <input type="hidden" id="hidden_maximum_rating" name="maximum_rating" value="<?php echo $maximum_rating?>" />
                <p id="rating_show">0 - 100</p>
                <div id="rating_range"></div>
            </div>
        </form>
</nav>

