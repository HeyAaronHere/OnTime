<?php
if (isset($_POST['login-submit'])) {
    include "connection.inc.php";
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Login - OnTime</title>
            <meta name="description" content="ONtime - Top Seller & Best Quality Services on watches">
            <meta name="keywords" content="Watches, Watch, Strap, Minute, Second, Buying, Selling, Discount, Offer, Fix, Repair, Maintenance, New Arrivals, Gshock, Fossil, Tag Heuer, Fashion, Hand Accessory, Second Hand, Time, Time Keeper, Pocket Watch, Rolex">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="css/p_login.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="css/headerFooter.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="js/login.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        </head>
        <body>
            <?php
            if (empty($_POST["email"]) || empty($_POST["pwd"])) {
                $errorMsg .= "Empty blanks detected. Please fill them up.";
                $success = false;
            } else {
                $email = sanitize_input($_POST["email"]);
                $pwd = sanitize_input($_POST["pwd"]);

                $emailpattern = "/[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$/";
                $pwdpattern = "/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/";

                if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !filter_var($pwd)) {
                    $errorMsg .= "Invalid entry format.";
                    $success = false;
                } else if (preg_match($emailpattern, $email) == False || preg_match($pwdpattern, $pwd) == False) {
                    $errorMsg .= "Invalid entry format!";
                    $success = false;
                } else if (strlen($pwd) < 8) {
                    $errorMsg .= "Password is less than 8 characters.";
                    $success = false;
                }

                if ($conn->connect_error) {
                    $errorMsg = "Connection failed: " . $conn->connect_error;
                    $success = false;
                } else {
                    $sql = "SELECT * FROM account WHERE ";
                    $sql .= "email='$email'";
                    // Execute the query
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // Note that email field is unique, so should only have
                        // one row in the result set.
                        $row = $result->fetch_assoc();
                        $result->free_result();
                        if (password_verify($pwd, $row['password'])) {
                            global $fname, $userID;
                            $fname = $row["fname"];
                            $lname = $row["lname"];
                            $userID = $row["user_id"];
                            //unset($row); to be undone, but apparently nothing is stored in fname or userID
                            $success = true;
                        }
                    } else {
                        $errorMsg = "Email not found or password doesn't match...";
                        $success = false;
                    }
                }
                $conn->close();
            }
            if ($success) {
                session_start();
                //sets $fname to
                $_SESSION['firstName'] = $row["fname"]; //fname actually
                $_SESSION['userID'] = $row["user_id"]; // userID actually
                unset($row);
                echo "<script>alert('Login successful!');window.location.href='index.php';</script>";
                echo "<a href='index.php'>Go to Main Page</a>";
            } else {
                echo "<h1>OI!</h1>";
                echo "<h4>The following input errors were detected:</h4>";
                echo "<p>" . $errorMsg . "</p>";
                echo "<form action=\"login.php\" method=\"post\"><button type=\"submit\">Return to Login</button></form>";
            }
            ?>
        </body>
    </html>
    <?php
} else {
    session_start();
    if (isset($_SESSION['firstName'])) {
        header("Location: index.php");
        exit();
    }
    header("Location: index.php");
    exit();
}

//Helper function that checks input for malicious or unwanted content.
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>