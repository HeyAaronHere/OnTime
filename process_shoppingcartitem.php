<?php
define("DBHOST", "161.117.122.252");
//define("DBNAME", "travel_photo");
define("DBUSER", "p2_7");
define("DBPASS", "7tQeryxcIq");
$errorMsg = ""; //message for database connection

$quantity = $quantityError = "";
$success = true;

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
    }

    if($success){
        echo "item has been added";
    } else {
        echo "Oops, error!";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
