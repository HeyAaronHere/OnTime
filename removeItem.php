<?php
if (!isset($_SESSION)) {
    session_start();
}
include "connection.inc.php";
$userID = $productID = "";
$userID = $_SESSION['userID'];
$productID  = $_POST['product'];

$query = $conn->prepare("DELETE FROM shoppingcart WHERE user_id = ? AND product_id = ? ");
$query->bind_param("ii", $userID, $productID);
$result = $query->execute();
$query->close();
if (!$result) {
    echo "<p>Database error 1: " . $conn->error . "</p>";
} else {
  echo "<script>alert('Item was removed!');window.location.href='shoppingcart.php';</script>";
  header("Location: shoppingcart.php");
}
 ?>
