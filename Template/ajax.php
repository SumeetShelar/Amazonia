<?PHP

// require MySQL Connection
require('../database/DBController.php');

// require Product class
require('../database/Product.php');

// DBController Object
$db = new DBController(); 

// Product Object
$product = new Product($db);

if(isset($_POST['itemid'])) {
    $result = $product->getProduct($_POST['itemid']);
    echo json_encode($result);
}

?>