<?php
if (isset($_POST['CI-submit'])) {
    include "connection.inc.php";
    $CIname = $CIemail = $CInumber = $CIquestion = $sql = $errorMsg = "";
    $success = true;

    /* Helper function to write the data to the DB */

    function saveCIToDB() {
        global $conn, $CIname, $CIemail, $CInumber, $CIquestion, $errorMsg, $success;
        $CIquestion = mysqli_escape_string($conn, $CIquestion);
        $sql = $conn->prepare("INSERT INTO customer_inquiries (CIname, CIemail, CInumber, CIquestion) VALUES (?,?,?,?)");
        $sql->bind_param("ssis", $CIname, $CIemail, $CInumber, $CIquestion);
        $sql->execute();
        if (!$conn->query($sql)) {
            $errorMsg = "Database error: " . $conn->error;
            $success = false;
        }
        $conn->close();
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Customer Service - OnTime</title>
            <meta name="description" content="ONtime - Top Seller & Best Quality Services on watches">
            <meta name="keywords" content="Watches, Watch, Strap, Minute, Second, Buying, Selling, Discount, Offer, Fix, Repair, Maintenance, New Arrivals, Gshock, Fossil, Tag Heuer, Fashion, Hand Accessory, Second Hand, Time, Time Keeper, Pocket Watch, Rolex">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <body>
            <?php
            if (isset($_POST['CI-submit'])) {
                if (empty($_POST["CIemail"]) || empty($_POST["CIname"]) || empty($_POST["CInumber"]) || empty($_POST["CIquestion"])) {
                    $errorMsg .= "Empty blanks detected. Please fill them up.";
                    $success = false;
                } else {
                    $CIemail = sanitize_input($_POST["CIemail"]);
                    $CIname = sanitize_input($_POST["CIname"]);
                    $CInumber = sanitize_input($_POST["CInumber"]);
                    $CIquestion = sanitize_input($_POST["CIquestion"]);

                    $emailpattern = "/[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$/";
                    $namepattern = "/^([a-zA-Z]+[,.]?[ ]?|[a-zA-Z]+['-]?)+$/";
                    $hpnopattern = "/[0-9]{8}/";

                    if (!filter_var($CIemail, FILTER_VALIDATE_EMAIL) || !filter_var($CIname) || !filter_var($CInumber) || !filter_var($CIquestion)) {
                        $errorMsg .= "Invalid entry format.";
                        $success = false;
                    } else if (preg_match($emailpattern, $CIemail) == False || preg_match($namepattern, $CIname) == False || preg_match($hpnopattern, $CInumber) == False) {
                        $errorMsg .= "Invalid entry format!";
                        $success = false;
                    } else if (strlen($CInumber) != 8) {
                        $errorMsg .= "Contact number is must be 8 digits.";
                        $success = false;
                    }
                }
                if ($success) {
                    saveCIToDB();
                    sendMail();
                    echo "<script type='text/javascript'>alert('You have successfully submitted your response! An email is sent to you. Thank you " . $CIname . ", we will contact you shortly.');window.location.href='customerservice.php';</script>";
                    echo "<a href='customerservice'>Go to Customer Service Page</a>";
                } else {
                    echo "<script type='text/javascript'>alert('Failed to submit your response!');</script>";
                    echo "<a href='customerservice'>Go to Customer Service Page</a>";
                }
            }
            ?>
        </body>
    </html>
    <?php
} else {
    header("Location: customerservice");
    exit();
}

// send email
function sendMail() {
    global $CIname, $CIemail, $CInumber, $CIquestion;
    require("phpmailer.inc.php");
    require("smtp.inc.php");
    $mail = new PHPMailer();
    $mail->SMTPDebug = 1;
    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = "oysoys96@gmail.com";
    $mail->Password = "Yeesiang9696!";
    $mail->From = "oysoys96@gmail.com";
    $mail->FromName = "ONtime";
    $mail->AddAddress($CIemail);
    $mail->WordWrap = 50;
    $mail->IsHTML(true);
    $mail->SMTPSecure = 'tls';
    $mail->Subject = "Customer Inquiries";
    $mail->Body = "Dear $CIname, <br><br>
        We have currently received the following feedback:<br>
        \"$CIquestion\"<br><br>
        We will respond back to you shortly at your following contact details:<br><br>
        Email: $CIemail <br>
        Contact No: $CInumber <br><br>
        Thank you.<br>
        ONtime @ SIT";
    $mail->AltBody = "Dear $CIname, <br><br>
        We have currently received the following feedback:<br>
        \"$CIquestion\"<br><br>
        We will respond back to you shortly at your following contact details:<br><br>
        Email: $CIemail <br>
        Contact No: $CInumber <br><br>
        Thank you.<br>
        ONtime @ SIT";
    $mail->Send();
}

//Helper function that checks input for malicious or unwanted content.
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>