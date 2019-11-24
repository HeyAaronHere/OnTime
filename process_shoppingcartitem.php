<?php
if (!isset($_SESSION)) {
    session_start();
}
include "connection.inc.php";
$success = $errorMsg = $userID = $productID = $quantity = $productPrice = "";
$success = true;
if (isset($_POST["productID"])) {
    $productID = $_POST["productID"];
    $productPrice = $_POST["productPrice"];
} else {
    $errorMsg .= "<p>no productID found</p>";
}

if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
}


//check if user is logged in
if (!isset($_SESSION['userID'])) {
    header("Location: login_first");
    exit();
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
            echo '<script>alert("item has been added to shoppingcart"); window.location="shoppingcart.php"</script>';
            header("Location: shoppingcart");
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
        $result = $conn->prepare("SELECT * FROM shoppingcart WHERE user_id = ? AND product_id = ? ");
        $result->bind_param("ii", $userID, $productID);
        $checkResult = $result->execute();
        $getResult = $result->get_result();
        $result->close();
        if (!$checkResult) {
            $errorMsg .= "<p>Database error 1: " . $conn->error . "</p>";
            $success = false;
        } else if ($getResult->num_rows > 0) { //this product is in the shopping cart already
            $sql = $conn->prepare("UPDATE shoppingcart SET quantity = ? WHERE user_id = ? AND product_id = ? "); // + '$currentQuantity' for nested query
            $sql->bind_param("iii", $quantity, $userID, $productID);
            //execute query
            $query = $sql->execute();
            $sql->close();
            if (!$query) {
                $errorMsg .= "<p>Database error 2: " . $conn->error . "</p>";
                $success = false;
            }
        } else { //this product is not in the shopping cart
            $sql = $conn->prepare("INSERT INTO shoppingcart(user_id, product_id, quantity) VALUES (?, ?, ?)");
            $sql->bind_param("iii", $userID, $productID, $quantity);
            //execute query
            $query = $sql->execute();
            $sql->close();
            if (!$query) {
                $errorMsg .= "<p>Database error 3: " . $conn->error . "</p>";
                $success = false;
            }
        }
}

?>
