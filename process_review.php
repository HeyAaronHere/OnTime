<?php
//start session
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_POST['submitbutton'])) {
    header("Location: productsreview");
    exit();
}
if (!isset($_SESSION['userID'])) {
    header("Location: login_first");
    exit();
}
/* define("DBHOST", "161.117.122.252");
  define("DBNAME", "p2_7");
  define("DBUSER", "p2_7");
  define("DBPASS", "7tQeryxcIq"); */
$email = $name = $review = "";
$errorMsg = "";
$success = true;

include "connection.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
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
            <?php
            include "header.inc.php";
            $namepat = "/^[a-zA-Z\s]+$/";
            $emailpat = "/\S+@\S+\.\S+/";
            if (empty($_POST["email"])) {
                $errorMsg .= "Email required, please fill up.<br>";
                $success = false;
            } else {
                $email = sanitize_input($_POST["email"]); // Additional check to make sure e-mail address is well-formed.     
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errorMsg .= "Invalid email format, please try again!<br>";
                    $success = false;
                } else if (preg_match($emailpat, $email) == False) {
                    $errorMsg .= "Invalid email format, please try again!<br>";
                    $success = false;
                }
            }
            if (empty($_POST["name"])) {
                $errorMsg .= "Name Required, please fill up.<br>";
                $success = false;
            } else {
                $name = sanitize_input($_POST["name"]);
                if (!filter_var($name)) {
                    $errorMsg .= "Please input name.<br>";
                    $success = false;
                } else if (preg_match($namepat, $name) == False) {
                    $errorMsg .= "Please input name.<br>";
                    $success = false;
                }
            }
            if (empty($_POST["review"])) {
                $errorMsg .= "Please fill form.<br>";
                $success = false;
            } else {
                $review = sanitize_input($_POST["review"]);
                if (!filter_var($review)) {
                    $errorMsg .= "Please fill form.<br>";
                    $success = false;
                }
            }
            if ($success) {
                /* echo "<h2 id= 'h2'>Form Submitted successfully!</h2>";
                  echo "<a id='btnLogin' href='productsreview.php' class='btn btn-default'>Reviews</a>";
                  echo "<section id='divider'></section>";
                  echo "<a id='btnHome' href='index.php' class='btn btn-default'>Return to Home</a>"; */
                $_SESSION['msg'] = "Form Submitted Successfully";
                header("Location: productsreview");
                saveMemberToDB();
                
            } else {
                echo "<h1>Oops!</h1>";
                echo "<h4>The following input errors were detected:</h4>";
                echo "<p>" . $errorMsg . "</p>";
                echo "<a id='btnLogin' href='productsreview.php' class='btn btn-default'>Reviews</a>";
                exit();
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

                    $email = mysqli_real_escape_string($conn, $_POST["email"]);
                    $name = mysqli_real_escape_string($conn, $_POST["name"]);
                    $review = mysqli_real_escape_string($conn, $_POST["review"]);


                    $sql = "INSERT INTO review (email, name, review_desc)";
                    $sql .= " VALUES (?,?,?);";
                    // Execute the query
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "SQL error";
                    } else {
                        mysqli_stmt_bind_param($stmt, "sss", $email, $name, $review);
                        mysqli_stmt_execute($stmt);
                    }


                   /* if (!$conn->query($sql)) {
                        $errorMsg = "Database error: " . $conn->error;
                        $success = false;
                    }*/
                }
                $conn->close();
            }
            ?> 
    </body>
</html>
