<?PHP
  ob_start();
  //include header.php file
  include('header.php');
?>

<?PHP
  /*    include Cart items if it is not Empty   */
  count($product->getData('cart')) ? include('Template/_cart-template.php') : include('Template/notfound/_cart-notfound.php');
  /*    !include Cart items if it is not Empty   */

  /*    include Wishlist if it is not Empty   */
  count($product->getData('wishlist')) ? include('Template/_wishlist-template.php') : include('Template/notfound/_wishlist-notfound.php');
  /*    !include Wishlist if it is not Empty   */

  /*    include new phones   */
  include('Template/_new-phones.php');
  /*    !include new phones   */

?>

<?PHP
  //include footer.php file
  include('footer.php');
?>