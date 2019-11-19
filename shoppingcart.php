<?php
if (!isset($_SESSION)) {
    session_start();
}
include "connection.inc.php";
$userID = $priceTotal = $errorMsg = "";
$userID = $_SESSION['userID']; //only visible when logged in, no need to if statement
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Shopping Cart - OnTime</title>
        <meta name="description" content="ONtime - Top Seller & Best Quality Services on watches">
        <meta name="keywords"
              content="Watches, Watch, Strap, Minute, Second, Buying, Selling, Discount, Offer, Fix, Repair, Maintenance, New Arrivals, Gshock, Fossil, Tag Heuer, Fashion, Hand Accessory, Second Hand, Time, Time Keeper, Pocket Watch, Rolex">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/shoppingcart.css">
        <link rel="stylesheet" href="css/headerFooter.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        crossorigin="anonymous"></script>
        <script defer src="js\shoppingcartcheck.js"></script>
    </head>
    <body>
      <?php
          include "header.inc.php";
      ?>
        <section class="container">
            <header class="page-header">
                <h1>Your shopping cart at ONtime</h1>
            </header>
<?php
            //execute the query
            $result = "SELECT s.product_id, quantity, product_name, product_price, quantity * product_price as 'total' "
                    . "FROM shoppingcart s, product p WHERE s.user_id = '$userID' AND s.product_id = p.product_id";
            $res = "SELECT SUM(P.product_price*S.quantity) AS sum FROM shoppingcart S, product P WHERE S.user_id = '$userID' AND P.product_id = S.product_id";
            $checkResult = mysqli_query($conn, $result);
            $checkRes = mysqli_query($conn, $res);
            if (!$checkResult || !$checkRes) {
                $errorMsg .= "<p>Database error 1: " . $conn->error . "</p>";
                $success = false;
            } else if (mysqli_num_rows($checkResult) > 0) {
                //there are products in the shopping cart, get all products incl details
                global $priceTotal;
                $record = mysqli_fetch_row($checkRes);
                $priceTotal = $record[0];

?>
            <section class="row">
                <div class="col-md-12">
                    <h2>Your Shopping Cart contains:</h2>
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Quantity</th>
                                    <th>Name</th>
                                    <th>Price/piece</th>
                                    <th>Total</th>
                                    <form method = "POST" action="clearShoppingCart.php">
                                        <th><input type="submit" value="clear shoppingcart"></th> <!-- <button type="button" class="btn btn-danger btn-sm">Clear Shoppingcart</button> -->
                                    </form>
                                </tr>
                            </thead>
<?php
            while($row = mysqli_fetch_array($checkResult)){
?>
                    <tr>
                      <td><?php echo $row['quantity']?></td>
                      <td><?php echo $row['product_name']?></td>
                      <td><?php echo $row['product_price']?></td>
                      <td><?php echo $row['total']?></td>
                      <form method = "POST" action="removeItem.php">
                        <td>
                          <input type="hidden" name="product" value="<?php echo $row['product_id']?>">
                          <input type="submit" value="remove item">
                        </td> <!-- <td><button type="button" class="btn btn-danger btn-sm">Remove</button></td> -->
                      </form>

                    </tr>
<?php
                  }
?>
                      <tfoot>
                        <tr class="tfooter">
                          <td></td>
                          <td></td>
                          <td id="pricetotal">Price total: </td>
                          <td id="amounttotal"><?php echo $priceTotal ?></td>
                          <td></td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </section>


<?php
                } else {
                    echo "<p>Your shopping cart is empty, add an item to your shopping cart!</p>";
                }

?>
<button type="button" class="btn btn-success btn-lg">
  <a id="checkbutton" href="product.php"><span
              class="glyphicon glyphicon-arrow-left"> Go on shopping</span></a>
</button>
<?php
      if (mysqli_num_rows($checkResult) > 0){
?>
          <section class="well well-sm row">
            <form id="orderform"> <!--method="post" action="checkout.php"-->
            <h2>Delivery Address</h2>

                <section class="form-group row">
                    <div class="col-sm-4">
                        <label for="fname">Full Name</label>
                        <input class="form-control" name="fname" type="text" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="email">Email Address</label>
                        <input class="form-control" name="email" type="text" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="phone">Phone number</label>
                        <input class="form-control" name="phone" type="text" required>
                    </div>
                </section>
                <section class="form-group row">
                    <div class="col-sm-4">
                        <label for="street">Street</label>
                        <input class="form-control" name="street" type="text" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="countrycode">Country Code</label>
                        <input class="form-control" name="countrycode" type="text" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="country">Country</label>
                        <input class="form-control" name="country" type="text" required>
                    </div>
                </section>

            <h2>Select Payment Type</h2>
                <input type="radio" name="payment-type" value="Cash" checked> Cash (Note: Cash must have the exact
                change!)<br>
                <input id="cashradio" type="radio" name="payment-type" value="Credit/DebitCard"> Credit/Debit Card

                    <section class="form-group row">
                        <div class="col-sm-4">
                            <label for="cardname">Name on Card</label>
                            <input class="form-control" name="cardname" type="text" required>
                        </div>
                        <div class="col-sm-4">
                            <label for="cardnumber">Card Number</label>
                            <input class="form-control" name="cardnumber" type="text" required>
                        </div>
                        <div class="col-sm-2">
                            <label for="expdate">Expiry Data</label>
                            <input class="form-control" name="expdate" type="text" required>
                        </div>
                        <div class="col-sm-2">
                            <label for="cvv">cvv</label>
                            <input class="form-control" name="cvv" type="text" required>
                        </div>
                    </section>

        <div id="checkoutbutton" class="row">
          <input type="submit" id="checkbutton" class="btn btn-success btn-lg"
                  value="Purchase">
        </div>

      </form>
    </section>

<?php
    }
 ?>

    </section>
        <?php
        include "footer.inc.php";
        ?>
  </body>
</html>
