<?php
//Constants for accessing our DB:
define("DBHOST", "161.117.122.252");
define("DBNAME", "p2_7");
define("DBUSER", "p2_7");
define("DBPASS", "7tQeryxcIq");
$fname = $lname = $email = $pwd = $HPnumber = "";
$errorMsg = "";
$success = true;

/* Helper function to write the data to the DB */

function saveMemberToDB() {
    global $fname, $lname, $email, $HPnumber, $pwd, $errorMsg, $success;
// Create connection
    $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
// Check connection
    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
    } else {
        //$hashed_password = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (fname, lname, email, HPnumber, password)";
        $sql .= " VALUES ('$fname', '$lname', '$email', '$HPnumber', '$pwd')";
        //$sql .= " VALUES ('$fname', '$lname', '$email', '$hashed_password')";
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
<html>
    <head>
        <title>Signup - OnTime</title>
        <meta name="description" content="ONtime - Top Seller & Best Quality Services on watches">
        <meta name="keywords" content="Watches, Watch, Strap, Minute, Second, Buying, Selling, Discount, Offer, Fix, Repair, Maintenance, New Arrivals, Gshock, Fossil, Tag Heuer, Fashion, Hand Accessory, Second Hand, Time, Time Keeper, Pocket Watch, Rolex">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/p_signup.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/headerFooter.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="js/login.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        include "header.php";

        $email = $errorMsg = "";
        $success = true;

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
            } else if (strlen($HPnumber) !== 8) {
                $errorMsg .= "Contact number is not 8 digits.";
                $success = false;
            }
        }
        if ($success) {
            saveMemberToDB();
            echo "<h4>Registration successful!</h4>";
            echo "<p>Email: " . $email;
            echo "<p>First Name: " . $fname;
            echo "<p>Last Name: " . $lname;
            echo "<p>Contact Number: " . $HPnumber;
            echo "<p>Password: " . $pwd;
            echo "<p>Confirm Password: " . $cfmpwd;
        } else {
            echo "<h1>OI!</h1>";
            echo "<h4>The following input errors were detected:</h4>";
            echo "<p>" . $errorMsg . "</p>";
            echo "<form action=\"signup.php\" method=\"post\"><button type=\"submit\">Return to Sign Up</button></form>";
        }
        include "footer.php";

//Helper function that checks input for malicious or unwanted content.
        function sanitize_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
    </body>
</html>