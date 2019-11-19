<?php
if (!isset($_SESSION)) {
    session_start();
}
include "connection.inc.php";
$userID = $productID = "";
$userID = $_SESSION['userID'];
$productID  = $_POST['product'];

$query = "DELETE FROM shoppingcart WHERE user_id = '$userID' AND product_id = '$productID'";
$result = mysqli_query($conn, $query);
if (!$result) {
    echo "<p>Database error 1: " . $conn->error . "</p>";
} else {
  echo "<script>alert('Item was removed!');window.location.href='shoppingcart.php';</script>";
}
 ?>
