<!DOCTYPE html>
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
$userID = $_SESSION['userID']; //only visible when logged in, no need to if statement
?>


<html>

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
    <section class="container"> <!--necessary?-->
        <?php
          include "header.php";
         ?>

        <header class="page-header">
            <h1>Your shopping cart at ONtime</h1>
        </header>
<?php
        if ($con->connect_error){
          $errorMsg .= "<p>Connection failed: " . $con->connect_error . "</p>";
          $success = false;
        }else{
          //execute the query
          $result = "SELECT quantity, product_name, product_price "
                  . "FROM shoppingCart, product WHERE userID = $userID AND productID = product_id";
          $checkResult = mysqli_query($con, $result);
          if (!$checkResult){
            $errorMsg .= "<p>Database error: " . $con->error . "</p>";
            $success = false;
          }else if(mysqli_num_rows($checkResult) > 0){
            //there are products in the shopping cart, get all products incl details
?>
        <section class="row">
            <div class="col-md-12">
                <h2>Your Shopping Cart contains:</h2>
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>Quantity</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th></th>
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
                        <tr class="tfooter">

                            <td></td>
                            <td id="pricetotal">Price total: </td>
                            <td id="amounttotal">120 SGD</td>

                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>

        <section class="well well-sm row">
            <h2>Delivery Address</h2>
            <form id="deliveryinfo">
                <section class="form-group row">
                    <div class="col-sm-4">
                        <label for="ex1">Full Name</label>
                        <input class="form-control" id="fname" type="text">
                    </div>
                    <div class="col-sm-4">
                        <label for="ex2">Email Address</label>
                        <input class="form-control" id="email" type="text">
                    </div>
                    <div class="col-sm-4">
                        <label for="ex3">Phone number</label>
                        <input class="form-control" id="phone" type="text">
                    </div>
                </section>
                <section class="form-group row">
                    <div class="col-sm-4">
                        <label for="ex1">Street</label>
                        <input class="form-control" id="street" type="text">
                    </div>
                    <div class="col-sm-4">
                        <label for="ex2">Country Code</label>
                        <input class="form-control" id="countrycode" type="text">
                    </div>
                    <div class="col-sm-4">
                        <label for="ex3">Country</label>
                        <input class="form-control" id="country" type="text">
                    </div>
                </section>
            </form>

            <h2>Select Payment Type</h2>
            <form>
                <input type="radio" name="payment-type" value="Cash" checked> Cash (Note: Cash must have the exact
                change!)<br>
                <input id="cashradio" type="radio" name="payment-type" value="Credit/DebitCard"> Credit/Debit Card
                <form id="billinginfo">
                    <section class="form-group row">
                        <div class="col-sm-4">
                            <label for="ex1">Name on Card</label>
                            <input class="form-control" id="cardname" type="text">
                        </div>
                        <div class="col-sm-4">
                            <label for="ex2">Card Number</label>
                            <input class="form-control" id="cardnumber" type="text">
                        </div>
                        <div class="col-sm-2">
                            <label for="ex3">Expiry Data</label>
                            <input class="form-control" id="expdate" type="text">
                        </div>
                        <div class="col-sm-2">
                            <label for="ex4">cvv</label>
                            <input class="form-control" id="cvv" type="text">
                        </div>
                    </section>
                </form>
            </form>
        </section>

        <div id="checkoutbutton" class="row">
          <button type="button" class="btn btn-success btn-lg">
              <a id="checkbutton" href="product_database.php">Go on shopping <span
                      class="glyphicon glyphicon-arrow-left"></span></a>
          </button>
            <button type="button" class="btn btn-success btn-lg">
                <a id="checkbutton" href="checkout.php">Purchase <span
                        class="glyphicon glyphicon-arrow-right"></span></a>
            </button>
        </div>
<?php
    } else{
        echo "<p>Your shopping cart is empty, add an item to your shopping cart!</p>";
      }
    }
?>

    <?php
    include "footer.php";
     ?>

</body>

</html>
