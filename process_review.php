<?php
define("DBHOST", "161.117.122.252");
define("DBNAME", "p2_7");
define("DBUSER", "p2_7");
define("DBPASS", "7tQeryxcIq");
$email = $name = $review = "";
$errorMsg = "";
$success = true;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Reviews - ONTime</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/reviews.css" type="text/css" />
        <link rel="stylesheet" href="css/headerFooter.css" type="text/css" />
        <script src="js/productreview.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
        </script>
        <script src="js/bootstrap.min.js">
        </script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <main>
            <?php
            include "header.php";

            if (empty($_POST["email"])) {
                $errorMsg .= "Email required.<br>";
                $success = false;
            } else {
                $email = sanitize_input($_POST["email"]); // Additional check to make sure e-mail address is well-formed.     
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errorMsg .= "Invalid email format.";
                    $success = false;
                }
            }
            if (empty($_POST["name"])) {
                $errorMsg .= "Please input name.<br>";
                $success = false;
            } else {
                $name = sanitize_input($_POST["name"]);
            }

            if (empty($_POST["review"])) {
                $errorMsg .= "Please fill form.<br>";
                $success = false;
            } else {
                $review = sanitize_input($_POST["review"]);
            }
            if ($success) {
                echo "<h2>Form Submitted successful!</h2>";
                echo "<a id='btnLogin' href='productsreview.php' class='btn btn-default'>Reviews</a>";
                echo "<section id='divider'></section>";
                echo "<a id='btnHome' href='index.php' class='btn btn-default'>Return to Home</a>";
                saveMemberToDB();
            } else {
                echo "<h1>Oops!</h1>";
                echo "<h4>The following input errors were detected:</h4>";
                echo "<p>" . $errorMsg . "</p>";
                echo "<a id='btnLogin' href='productsreview.php' class='btn btn-default'>Return to Sign Up</a>";
            }

            //Helper function that checks input for malicious or unwanted content. 
            function sanitize_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            function saveMemberToDB() {
                global $email, $name, $review, $errorMsg;
                // Create connection
                $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
                // Check connection
                if ($conn->connect_error) {
                    $errorMsg = "Connection failed: " . $conn->connect_error;
                    $success = false;
                } else {
                    $sql = "INSERT INTO review (email, name, review_desc)";
                    $sql .= " VALUES ('$email', '$name', '$review')";
                    // Execute the query
                    if (!$conn->query($sql)) {
                        $errorMsg = "Database error: " . $conn->error;
                        $success = false;
                    }
                }
                $conn->close();
            }
            ?>

            <?php
            include "footer.php";
            ?> 
    </body>
</html>
