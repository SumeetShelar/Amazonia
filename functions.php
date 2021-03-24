<?PHP

// require MySQL Connection
require('database/DBController.php');

// require Product class
require('database/Product.php');

// require Cart class
require('database/Cart.php');

// DBController Object
$db = new DBController(); 

// Product Object
$product = new Product($db);
$product_shuffle = $product->getData();

// Cart Object
$Cart = new Cart($db );

?>