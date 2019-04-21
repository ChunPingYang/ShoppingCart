<?php 

    require_once 'Paginator.class.php';

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

    $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 3;
    $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;

    $Paginator = new Paginator($con,$sql);

    $results    = $Paginator->getData( $limit, $page );
?>

<?php for( $i = 0; $i < count( $results->data ); $i++ ) : ?>
        <tr>
            <td><?php echo $results->data[$i]['pname']; ?>-----</td>
        </tr>
<?php endfor; ?>

<?php echo $Paginator->createLinks( $links, 'pagination pagination-sm' ); ?> 