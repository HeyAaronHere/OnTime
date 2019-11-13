<?php

define("DBHOST", "161.117.122.252");
define("DBNAME", "p2_7");
define("DBUSER", "p2_7");
define("DBPASS", "7tQeryxcIq");

$success = $errorMsg = $userID = $productID = $quantity = "";
//$quantity = $quantityError = $productID = "";
if(isset($_POST["productID"])){
  $productID = $_POST["productID"];
}else{
  $errorMsg .= "<p>no productID found</p>";
}
//$userID = $_SESSION['email'];
$userID="2"; //test purpose
$success = true;

//php validation of input and initialize shopping cart change
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["productinput"])) {
        $quantityError = "<p>Quantity is required.</p>";
        $success = false;
    }else if($_POST["productinput"] < 1){
        $quantityError = "<p>Quantity must be at least 1.</p>";
        $success = false;
    }else if(!preg_match("^[0-9]+$^",$_POST["productinput"])){
        $quantityError = "<p>Quantity must be numeric value.</p>";
        $success = false;
    }else{
        $quantity = test_input($_POST["productinput"]);
    }

    if($success){
        //update shopping cart
        updateShoppingCart();
    }

    if($success){
        echo "item has been added";
    } else {
        echo "Oops, error!";
        echo $errorMsg;
    }
}
//end php validation of input

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//get current user over session?

function updateShoppingCart(){
//  $userID = $_SESSION["email"];

  // Create connection
  $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
  // Check connection
  if ($conn->connect_error){
    $errorMsg .= "<p>Connection failed: " . $conn->connect_error . "</p>";
    $success = false;
  }else{
      global $success, $errorMsg, $userID, $productID, $quantity;
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
        $sql = "INSERT INTO shoppingCart(userID, productID, quantity) VALUES ($userID, $productID, $quantity)";
        //execute query
        if (!$conn->query($sql)){
          $errorMsg .= "<p>Database error: " . $conn->error . "</p>";
          $success = false;
        }
      }
  }
}
?>
