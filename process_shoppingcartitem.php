<?php
if (!isset($_SESSION)) {
    session_start();
}

define("DBHOST", "161.117.122.252");
define("DBNAME", "p2_7");
define("DBUSER", "p2_7");
define("DBPASS", "7tQeryxcIq");

$success = $errorMsg = $userID = $productID = $quantity = $productPrice = "";
$success = true;
//$quantity = $quantityError = $productID = "";
if(isset($_POST["productID"])){ //user can't influence it -> no need to validate
  $productID = $_POST["productID"];
  $productPrice = $_POST["productPrice"];
}else{
  $errorMsg .= "<p>no productID found</p>";
}
print_r($_SESSION);
if(isset($_SESSION['email'])){
  $userID = $_SESSION['userID'];
}


//check if user is logged in
if(!isset($_SESSION['firstName'])){
  echo "<p>You must log in before adding an item to the shopping cart</p>";
  echo "<button><a href='login.php'>Log In</a></button>";
}else{
//php validation of input and initialize shopping cart change
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["productAmount"])) {
        $quantityError = "<p>Quantity is required.</p>";
        $success = false;
    }else if($_POST["productAmount"] < 1){
        $quantityError = "<p>Quantity must be at least 1.</p>";
        $success = false;
    }else if(!preg_match("^[0-9]+$^",$_POST["productAmount"])){
        $quantityError = "<p>Quantity must be numeric value.</p>";
        $success = false;
    }else{
        $quantity = test_input($_POST["productAmount"]);
    }

    if($success){
        //update shopping cart
        updateShoppingCart();
    }

    if($success){
        echo "item has been added";
        echo "<button><a href='product_database.php'>Go on shopping</a></button>";
    } else {
        echo "Oops, error!";
        echo $errorMsg;
    }

  }
}
//end php validation of input
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


//get current user over session variable

function updateShoppingCart(){
//  $userID = $_SESSION["email"];

  // Create connection
  $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
  // Check connection
  if ($conn->connect_error){
    $errorMsg .= "<p>Connection failed: " . $conn->connect_error . "</p>";
    $success = false;
  }else{
      global $success, $errorMsg, $userID, $productID, $quantity, $productPrice;
      //execute the query
      //$user = mysqli_real_escape_string ($conn, $userID );
      $result = "SELECT * FROM shoppingCart WHERE userID = $userID AND productID = $productID";
      $checkResult = mysqli_query($conn, $result);
      if (!$checkResult){
        $errorMsg .= "<p>Database error: " . $conn->error . "</p>";
        $success = false;
      }else if(mysqli_num_rows($checkResult) > 0){
        //this product is in the shopping cart already
        $sql = "UPDATE shoppingCart SET quantity = $quantity "; //+ is missing for nested query
        //$sql .= "(SELECT quantity FROM shoppingCart WHERE userID = $userID AND productID = $productID) ";
        $sql .= "WHERE userID = $userID AND productID = $productID";
        //execute query
        $query = mysqli_query($conn, $sql);
        if (!$query){
          $errorMsg .= "<p>Database error: " . $conn->error . "</p>";
          $success = false;
        }
      }else{ //this product is not in the shopping cart
        $sql = "INSERT INTO shoppingCart(userID, productID, quantity, productPrice) VALUES ($userID, $productID, $quantity, $productPrice)";
        //execute query
        if (!$conn->query($sql)){
          $errorMsg .= "<p>Database error: " . $conn->error . "</p>";
          $success = false;
        }
      }
  }
  }

?>
