<?php
if (!isset($_SESSION)) {
    session_start();
}
include "include/connection.inc.php";
$userID = "";
$userID = $_SESSION['userID'];

$userID = mysqli_real_escape_string($conn, $userID);

$query = $conn->prepare("DELETE FROM shoppingcart WHERE user_id = ? ");
$query->bind_param("i", $userID);
$result = $query->execute();
$query->close();
if (!$result) {
    echo "<p>Database error 1: " . $conn->error . "</p>";
} else {
  //doesnt execute JS
  echo "<script>alert('Shoppingcart was cleared!');window.location.href='shoppingcart.php';</script>";
  header("Location: shoppingcart");
}
mysqli_close($conn);
?>
