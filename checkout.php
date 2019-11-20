<?php
if (!isset($_SESSION)) {
    session_start();
}
include "connection.inc.php";
$userID = $_SESSION['userID']; //only visible when logged in, no need to if statement
$success = $fname = $lname = $email = $phone = $street = $appartment ="";
$countrycode = $postalcode = $city = $errorMsg = "";
$cardname = $cardnumber = $expdate = $cvv = "";
$orderID = $productID = $paymentType = $quantity = "";
$success = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //validate firstname: letters, whitespace, dash
  $namepattern = "/[^A-Za-z\s-]/";
  if(empty($_POST['fname'])){
    $errorMsg .= "<p>First name is missing.</p>";
    $success = false;
  }else{
    $fname = test_input($_POST['fname']);
    if(preg_match($namepattern, $_POST['fname'])){
      $errorMsg .= "<p>First name is wrong.</p>";
      $success = false;
    }
  }
  //validate lastname: letters, whitespaces, dash
  if(empty($_POST['lname'])){
    $errorMsg .= "<p>Last name is missing.</p>";
    $success = false;
  }else{
    $fname = test_input($_POST['lname']);
    if(preg_match($namepattern, $_POST['fname'])){
      $errorMsg .= "<p>Last name is wrong.</p>";
      $success = false;
    }
  }
  //validate email: correct format
  if (empty($_POST["email"])) {
        $errorMsg .= "<p>Email is missing.</p>";
        $success = false;
    }else{
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errorMsg = "<p>Invalid email format.</p>";
        }
    }
  //validate phonenumber: only numbers
  $phonepattern = "/^\d{8,13}$/";
  if(empty($_POST['phone'])){
    $errorMsg .= "<p>Phone number is missing.</p>";
    $success = false;
  }else{
    $phone = test_input($_POST['phone']);
    if(!preg_match($phonepattern, $_POST['phone'])){
      $errorMsg .= "<p>Phone number is wrong.</p>";
      $success = false;
    }
  }
  //validate street: letters and numbers and whitespace
  $streetpattern = "/[^A-Za-z\s0-9-]/";
  if(empty($_POST['street'])){
    $errorMsg .= "<p>Street is missing.</p>";
    $success = false;
  }else{
    $street = test_input($_POST['street']);
    if(preg_match($streetpattern, $_POST['street'])){
      $errorMsg .= "<p>Street is wrong.</p>";
      $success = false;
    }
  }
  //validate appartment: #01-(0)01
  $appartmentpattern = "/^\d{2}[-]\d{2,3}$/";
  if(empty($_POST['appartment'])){
    $errorMsg .= "<p>Appartment is missing.</p>";
    $success = false;
  }else{
    $appartment = test_input($_POST['appartment']);
    if(!preg_match($appartmentpattern, $_POST['appartment'])){
      $errorMsg .= "<p>Appartment is wrong.</p>";
      $success = false;
    }
  }
  //validate countrycode: two letters (eg SG)
  $countrycodepattern = "/^[A-Z]{2}$/";
  if(empty($_POST['countrycode'])){
    $errorMsg .= "<p>Country code is missing.</p>";
    $success = false;
  }else{
    $countrycode = test_input($_POST['countrycode']);
    if(!preg_match($countrycodepattern, $_POST['countrycode'])){
      $errorMsg .= "<p>Country code is wrong.</p>";
      $success = false;
    }
  }
  //validate postal code: only numbers
  $postalcodepattern = "/^\d{4,10}$/";
  if(empty($_POST['postalcode'])){
    $errorMsg .= "<p>Postal code is missing.</p>";
    $success = false;
  }else{
    $postalcode = test_input($_POST['postalcode']);
    if(!preg_match($postalcodepattern, $_POST['postalcode'])){
      $errorMsg .= "<p>Postal code is wrong.</p>";
      $success = false;
    }
  }
  //validate city: letters and whitespace and dash
  if(empty($_POST['city'])){
    $errorMsg .= "<p>City is missing.</p>";
    $success = false;
  }else{
    $city = test_input($_POST['city']);
    if(preg_match($namepattern, $_POST['city'])){
      $errorMsg .= "<p>City is wrong.</p>";
      $success = false;
    }
  }
  //one payment type must be selected
    switch($_POST['paymenttype']){
      case 'cash':
        $paymentType = "cash";
        break;
      case 'card':
        $paymentType = "card";
        break;
      default:
        $errorMsg .= "<p>One Payment Type must be selected.</p>";
        $success = false;
    }

//if creditcard checked:
  if($paymentType === 'card'){
    //validate cardname: letters and whitespace
      if(empty($_POST['cardname'])){
          $errorMsg .= "<p>Card name is missing.</p>";
          $success = false;
      }else{
          $cardname = test_input($_POST['cardname']);
          if(preg_match($namepattern, $_POST['cardname'])){
              $errorMsg .= "<p>Card name is wrong.</p>";
              $success = false;
          }
      }
    //validate cardnumber: 16 digits
      $cardnumberpattern = "/^\d{16}$/";
      if(empty($_POST['cardnumber'])){
          $errorMsg .= "<p>Card number is missing.</p>";
          $success = false;
      }else{
          $cardnumber = test_input($_POST['cardnumber']);
          if(!preg_match($cardnumberpattern, $_POST['cardnumber'])){
              $errorMsg .= "<p>Card number is wrong.</p>";
              $success = false;
          }
      }
    //validate expdate: 00-00 and check with current date
      $expdatepattern = "/^([1][0-2]|[0][1-9])[-]\d{2}/";
      if(empty($_POST['expdate'])){
          $errorMsg .= "<p>Expiry date is missing.</p>";
          $success = false;
      }else{
          $expdate = test_input($_POST['expdate']);
          if(!preg_match($expdatepattern, $_POST['expdate'])){
              $errorMsg .= "<p>Expiry Date is wrong.</p>";
              $success = false;
          // }else if(expdate in the past){
          //     $errorMsg .= "<p>Expiry Date is in the past.</p>";
          //     $success = false;
          }
      }
    //validate cvv: 3 digits
      $cvvpattern = "/^\d{3}$/";
      if(empty($_POST['cvv'])){
          $errorMsg .= "<p>CVV is missing.</p>";
          $success = false;
      }else{
          $cardnumber = test_input($_POST['cvv']);
          if(!preg_match($cvvpattern, $_POST['cvv'])){
              $errorMsg .= "<p>CVV is wrong.</p>";
              $success = false;
          }
      }
    }

    if($success){
        saveTransactionToDB();
    }

    if($success){
         echo "mission completed";
         echo $errorMsg;
    }else{
        echo "OOPS, something went wrong!";
        echo $errorMsg;
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function saveTransactionToDB(){

    //for connection and insertion into order table
    global $conn, $success, $errorMsg, $userID, $paymentType;
    //for intertion into order_item table
    global $productID, $quantity, $orderID;
    //for insertion into deliveryAddress table
    global $fname, $lname, $email, $phone, $street, $appartment, $countrycode, $postalcode, $city;

    //insertIntoOrder generates order_id which is necessary for the next queries
    //$time = date('YYYY-MM-DD HH:MM:SS');
    $insertIntoOrder = "INSERT INTO p2_7.order(user_id, purchase_datetime, payment_type) "
                      . "VALUES('$userID', NOW(), '$paymentType')";
    $insertIntoOrder_query = mysqli_query($conn, $insertIntoOrder);
    if (!$insertIntoOrder_query) {
        $errorMsg .= "<p>Database error: " . $conn->error . "</p>";
        $success = false;
    }

    //retrieve newly generated order_id to go on with the process | last generated order id is the maximum because of auto increment
    $getFromOrder = "SELECT MAX(order_id) FROM order WHERE user_id = '$userID'";
    $getFromOrder_query = mysqli_query($conn, $getFromOrder);
    if (!$getFromOrder_query) {
        $errorMsg .= "<p>Database error 2: " . $conn->error . "</p>";
        $success = false;
    }else{
      $row = mysqli_fetch_array($getFromOrder_query);
      $orderID = $row['order_id'];
    }

    //insert items from shoppingcart into order items WHILE LOOP
    $insertIntoOrderItem = "INSERT INTO order_items(order_id, product_id, quantity) VALUES('$orderID', '$productID', '$quantity')";
    //we need shoppingcart details first before adding anything to order
    $getFromShoppingCart = "SELECT product_id, quantity FROM shoppingcart WHERE user_id = '$userID'";
    //delete items in shoppingcart after they've been added to the order item table
    $deleteFromShoppingCart = "DELETE FROM shoppingcart WHERE user_id = '$userID' AND product_id = '$productID'";
    $getFromShoppingCart_query = mysqli_query($conn, $getFromShoppingCart);
    while ($row = mysqli_fetch_array($getFromShoppingCart_query)){
        $productID = $row['product_id'];
        $quantity = $row['quantity'];
        $insertIntoOrderItem_query = mysqli_query($conn, $insertIntoOrderItem);
        if (!$insertIntoOrderItem_query) {
            $errorMsg .= "<p>Database error 2: " . $conn->error . "</p>";
            $success = false;
        }else{
            $deleteFromShoppingCart_query = mysqli_query($conn, $deleteFromShoppingCart);
            if (!$insertIntoOrderItem_query) {
                $errorMsg .= "<p>Database error 2: " . $conn->error . "</p>";
                $success = false;
            }
        }
    }


    //insert delivery address into database
    $insertIntoDeliveryAddress = "INSERT INTO delivery_address(first_name, last_name, email, "
      . "phone_number, street_house_no, apt, country, post_cd, city, order_id) ";
    $insertIntoDeliveryAddress .= "VALUES('$fname', '$lname', '$email', '$phone', "
      . "'$street', '$appartment', '$countrycode', '$postalcode', '$city', '$orderID')";
    $insertIntoDeliveryAddress_query = mysqli_query($conn, $insertIntoDeliveryAddress);
    if (!$insertIntoDeliveryAddress_query) {
        $errorMsg .= "<p>Database error 2: " . $conn->error . "</p>";
        $success = false;
    }
}

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
    <link href="css/shoppingcart.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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

          if ($success){
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
<?php
      }
    }
?>

    <?php
      include "footer.inc.php";
    ?>

</body>

</html>