<?php
if (!isset($_SESSION)) {
    session_start();
}
include "connection.inc.php";
$success = $errorMsg = $userID = $productID = $quantity = $productPrice = "";
$success = true;
if (isset($_POST["productID"])) { //user can't influence it -> no need to validate
    $productID = $_POST["productID"];
    $productPrice = $_POST["productPrice"];
} else {
    $errorMsg .= "<p>no productID found</p>";
}
print_r($_SESSION);
if (isset($_SESSION['userID'])) { //could write this in else line 25ff
    $userID = $_SESSION['userID'];
}


//check if user is logged in
if (!isset($_SESSION['firstName'])) {
    echo "<p>You must log in before adding an item to the shopping cart</p>";
    echo "<button><a href='login.php'>Log In</a></button>";
} else {
//php validation of input and initialize shopping cart change
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["productAmount"])) {
            $quantityError = "<p>Quantity is required.</p>";
            $success = false;
        } else if ($_POST["productAmount"] < 1) {
            $quantityError = "<p>Quantity must be at least 1.</p>";
            $success = false;
        } else if (!preg_match("^[0-9]+$^", $_POST["productAmount"])) {
            $quantityError = "<p>Quantity must be numeric value.</p>";
            $success = false;
        } else {
            $quantity = test_input($_POST["productAmount"]);
        }

        if ($success) {
            //update shopping cart
            updateShoppingCart();
        }

        if ($success) {
            //echo "item has been added";
            //echo "<button><a href='product.php'>Go on shopping</a></button>";
            echo '<script>alert("item has been added to shoppingcart"); window.location="product.php"</script>';
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

function updateShoppingCart() {
        global $success, $errorMsg, $userID, $productID, $quantity, $productPrice, $conn;
        //execute the query
        $result = "SELECT * FROM shoppingcart WHERE user_id = '$userID' AND product_id = '$productID'";
        $checkResult = mysqli_query($conn, $result);
        if (!$checkResult) {
            $errorMsg .= "<p>Database error 1: " . $conn->error . "</p>";
            $success = false;
        } else if (mysqli_num_rows($checkResult) > 0) {
            //this product is in the shopping cart already
            $sql = "UPDATE shoppingcart SET quantity = '$quantity' "; //+ is missing for nested query
            //$sql .= "(SELECT quantity FROM shoppingCart WHERE userID = $userID AND productID = $productID) ";
            $sql .= "WHERE user_id = '$userID' AND product_id = '$productID'";
            //execute query
            $query = mysqli_query($conn, $sql);
            if (!$query) {
                $errorMsg .= "<p>Database error 2: " . $conn->error . "</p>";
                $success = false;
            }
        } else { //this product is not in the shopping cart
            $sql = "INSERT INTO shoppingcart(user_id, product_id, quantity) ";
            $sql .= "VALUES ('$userID', '$productID', '$quantity')";
            //execute query
            if (!$conn->query($sql)) {
                $errorMsg .= "<p>Database error 3: " . $conn->error . "</p>";
                $success = false;
            }
        }
        //free result, $checkRes, $checkResult, sql, query
}

?>
<!DOCTYPE html>
