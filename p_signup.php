<?php
if (isset($_POST['signup-submit'])) {
//Constants for accessing our DB:
    define("DBHOST", "161.117.122.252");
    define("DBNAME", "p2_7");
    define("DBUSER", "p2_7");
    define("DBPASS", "7tQeryxcIq");
    $fname = $lname = $email = $pwd = $HPnumber = "";
    $errorMsg = "";
    $success = true;

    function saveMemberToDB() {
        global $fname, $lname, $email, $HPnumber, $pwd, $errorMsg, $success;
        // Create connection
        $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
        // Check connection
        if ($conn->connect_error) {
            $errorMsg = "Connection failed: " . $conn->connect_error;
            $success = false;
        } else {
            $hashed_password = password_hash($pwd, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user (fname, lname, email, HPnumber, password)";
            $sql .= " VALUES ('$fname', '$lname', '$email', '$HPnumber', '$hashed_password')";
            // Execute the query
            if (!$conn->query($sql)) {
                $errorMsg = "Database error: " . $conn->error;
                $success = false;
            }
        }
        $conn->close();
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Signup - OnTime</title>
            <meta name="description" content="ONtime - Top Seller & Best Quality Services on watches">
            <meta name="keywords" content="Watches, Watch, Strap, Minute, Second, Buying, Selling, Discount, Offer, Fix, Repair, Maintenance, New Arrivals, Gshock, Fossil, Tag Heuer, Fashion, Hand Accessory, Second Hand, Time, Time Keeper, Pocket Watch, Rolex">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <body>
            <?php
            if (isset($_SESSION['email'])) {
                header("Location: signup.php");
                exit();
            } else {
                //include "header.php";
                if (empty($_POST["email"]) || empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["HPnumber"]) || empty($_POST["pwd"]) || empty($_POST["cfmpwd"])) {
                    $errorMsg .= "Empty blanks detected. Please fill them up.";
                    $success = false;
                } else {
                    $email = sanitize_input($_POST["email"]);
                    $fname = sanitize_input($_POST["fname"]);
                    $lname = sanitize_input($_POST["lname"]);
                    $HPnumber = sanitize_input($_POST["HPnumber"]);
                    $pwd = sanitize_input($_POST["pwd"]);
                    $cfmpwd = sanitize_input($_POST["cfmpwd"]);
                    $emailpattern = "/[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$/";
                    $namepattern = "/^([a-zA-Z]+[,.]?[ ]?|[a-zA-Z]+['-]?)+$/";
                    $pwdpattern = "/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/";
                    $hpnopattern = "/[0-9]{8}/";
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !filter_var($fname) || !filter_var($lname) || !filter_var($HPnumber) || !filter_var($pwd) || !filter_var($cfmpwd)) {
                        $errorMsg .= "Invalid entry format.";
                        $success = false;
                    } else if (preg_match($emailpattern, $email) == False || preg_match($namepattern, $fname) == False || preg_match($namepattern, $lname) == False || preg_match($hpnopattern, $HPnumber) == False || preg_match($pwdpattern, $pwd) == False || preg_match($pwdpattern, $cfmpwd) == False) {
                        $errorMsg .= "Invalid entry format!";
                        $success = false;
                    } else if ($pwd != $cfmpwd) {
                        $errorMsg .= "Password is not the same.";
                        $success = false;
                    } else if (strlen($pwd) < 8 || strlen($cfmpwd) < 8) {
                        $errorMsg .= "Password is less than 8 characters.";
                        $success = false;
                    } else if (strlen($HPnumber) != 8) {
                        $errorMsg .= "Contact number is must be 8 digits.";
                        $success = false;
                    }

                    $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
                    $result = "SELECT * FROM user where email = '$email'";
                    $checkResult = mysqli_query($conn, $result);
                    if (mysqli_num_rows($checkResult) > 0) {
                        $errorMsg .= "Email exist already.";
                        $success = false;
                    }
                    $conn->close();
                }


                if ($success) {
                    saveMemberToDB();
                    echo "<script type='text/javascript'>alert('Registration successful!');"
                    . "window.location.href='login.php';</script>";
                } else {
                    echo "<h1>OI!</h1>";
                    echo "<h4>The following input errors were detected:</h4>";
                    echo "<p>" . $errorMsg . "</p>";
                    echo "<form action=\"signup.php\" method=\"post\"><button type=\"submit\">Return to Sign Up</button></form>";
                }
            }
            //include "footer.php";
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