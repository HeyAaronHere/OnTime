<?php
if (!isset($_SESSION)) {
    session_start();
}
include "connection.inc.php";
$userID = $_SESSION['userID']; //only visible when logged in, no need to if statement
?>

<!DOCTYPE html>
<html>

<head>
    <title>Shopping Cart - OnTime</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ONtime - Top Seller & Best Quality Services on watches">
    <meta name="keywords"
        content="Watches, Watch, Strap, Minute, Second, Buying, Selling, Discount, Offer, Fix, Repair, Maintenance, New Arrivals, Gshock, Fossil, Tag Heuer, Fashion, Hand Accessory, Second Hand, Time, Time Keeper, Pocket Watch, Rolex">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css\headerFooter.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/shoppingcart.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <section class="container">
        <?php
          include "header.inc.php";
         ?>

        <header class="page-header">
            <h1>Thank you for your purchase at ONtime.</h1>
        </header>

        <p>You will receive further updates regarding your order via email.</p>
        <p>We'd like to provide the best service to you. Feel free to <a href="customerservice.html">contact us</a>
            if you have any questions.</p>

<?php
        //execute the query
        $result = "SELECT quantity, product_name, product_price, quantity * product_price as 'total' "
                    . "FROM shoppingcart s, product p WHERE s.user_id = '$userID' AND s.product_id = p.product_id";
        $res = "SELECT SUM(P.product_price*S.quantity) AS sum FROM shoppingcart S, product P WHERE S.user_id = '$userID' AND P.product_id = S.product_id";
        $orderPlacement = "INSERT INTO order ()";
        $checkResult = mysqli_query($conn, $result);
        $checkRes = mysqli_query($conn, $res);
        if (!$checkResult || !$checkRes) {
            $errorMsg .= "<p>Database error 1: " . $conn->error . "</p>";
            $success = false;
        } else {
          //get all products incl details and price
          global $priceTotal;
          $record = mysqli_fetch_row($checkRes);
          $priceTotal = $record[0];
?>
          <section class="row">
              <div class="col-md-12">
              <h2>Your order at a glance</h2>
              <table class="table table-striped table-responsive">
                  <thead>
                    <tr>
                      <th>Quantity</th>
                      <th>Name</th>
                      <th>Price/piece</th>
                      <th>Total</th>
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
                    </tr>
                </tfoot>
              </table>
            </div>
        </section>
        <button type="button" class="btn btn-info btn-sm">
            <a href="index.php">
                Back to the main page
            </a>
        </button>
        <br>
    </section>
<?php } ?>

    <?php
      include "footer.inc.php";
    ?>

</body>

</html>
