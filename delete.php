<?php include_once 'connection.php';?>
<?php
$itemid = $_POST['pid'];
if(isset($itemid)){
    $query = "update product set display = False where itemid = $itemid ";
    $result = mysqli_query($con,$query);
    echo $itemid;
}else{
    echo "error";
}
?>