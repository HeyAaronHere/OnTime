<!--included on all pages to show side shoppingcart-->
<link href="css/shoppingcart.css" rel="stylesheet" type="text/css">
<?php
if (!isset($_SESSION)) {
    session_start();
}
define("DBHOST", "161.117.122.252");
define("DBNAME", "p2_7");
define("DBUSER", "p2_7");
define("DBPASS", "7tQeryxcIq");
$con = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
$userID = "";
$userID = $_SESSION['userID'];
?>

<section id="cart" class="cart">
<span id="close" class="glyphicon glyphicon-remove close" aria-label="close shopping cart"></span>

  <?php
  if ($con->connect_error){
    $errorMsg .= "<p>Connection failed: " . $con->connect_error . "</p>";
    $success = false;
  }else{
    //execute the query
    $result = "SELECT quantity, product_name, product_price FROM shoppingCart, product WHERE userID = $userID AND productID = product_id";
    $checkResult = mysqli_query($con, $result);
    if (!$checkResult){
      $errorMsg .= "<p>Database error: " . $con->error . "</p>";
      $success = false;
    }else if(mysqli_num_rows($checkResult) > 0){
      //there are products in the shopping cart, get all products incl details
  ?>

      <h2>Your Shopping Cart</h2>
      <table class="table table-striped table-responsive">
          <thead>
              <tr>
                  <th>Quantity</th>
                  <th>Name</th>
                  <th>Price</th>
              </tr>
          </thead>

  <?php
      while($row = mysqli_fetch_array($result)){

//<!-- id='qty'--> for first td line
  echo ("<tr>
            <td><?php echo" . $row['quantity'] . "?></td>
            <td><?php echo" . $row['product_name'] . "?></td>
            <td><?php echo" . $row['product_price'] . "?></td>
        </tr>");
      }
  ?>
      <tfoot>
          <td></td>
          <td id="pricetotal">Total</td>
          <td id="amounttotal">40 SGD</td> <!--flexible price-->
      </tfoot>
  </table>
  <button type="button" class="btn btn-danger btn-sm">Clear Shopping Cart</button>
  <button type="button" class="btn btn-success btn-sm"><a href="shoppingcart.php">Proceed to Checkout</a></button>
</section>
<?php
}
}
?>
<!--

 check if there's at least one item in the shopping cart
 no: your shopping cart is empty
 yes: print out:
 sql statement, store quantity and prodID in arrays rowitem, rowquantity while loop  (fetch assoc)
count for amount of items in Cart, while loop begins
abfrage query fetchassoc
store price quantity totalPrice? name from db in variables -->
