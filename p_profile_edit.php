<?php
//start session
if (!isset($_SESSION)) {
    session_start();
    ?>

    <!DOCTYPE html>

    <html lang="en">

        <head>
            <title>Profile page result - OnTime</title>
            <meta charset="utf-8">
            <meta name="description" content="ONtime - Top Seller & Best Quality Services on watches">
            <meta name="keywords"
                content="Watches, Watch, Strap, Minute, Second, Buying, Selling, Discount, Offer, Fix, Repair, Maintenance, New Arrivals, Gshock, Fossil, Tag Heuer, Fashion, Hand Accessory, Second Hand, Time, Time Keeper, Pocket Watch, Rolex">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" href="css/main.css" />
            <link rel="stylesheet" type="text/css" href="css/headerFooter.css" />
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="js/bootstrap.min.js"></script>
        </head>
        <body>
            <section class="jumbotron" id="login_first_msg">
                <h1>Update result</h1>
                <div class="container-fluid">
        <?php
    //check to see if button to return to home was set or if not logged in yet
    if(!isset($_SESSION['firstName'])){
        
        header("Location: login_first");
        exit;
    }elseif(isset($_POST['submitPPE']) && $_POST['submitPPE'] == "goto"){
        $_SESSION['ppeLoadedBefore'] = false;
    }elseif((isset($_SESSION['ppeLoadedBefore']) && ($_SESSION['ppeLoadedBefore'] == true)) || (isset($_POST['submitPPE']) && $_POST['submitPPE'] == "return")) {
        header("Location: profile_edit");
        exit;
    }

    include "connection.inc.php";
    
    $success = true;
    
    $email = $nPwd1 = $nPwd2 = $oPwd = $fName = $hpNo = $lName = $errorMsg = "";
    $emailpattern = "/[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$/";
    $namepattern = "/^([a-zA-Z]+[,.]?[ ]?|[a-zA-Z]+['-]?)+$/";
    $pwdpattern = "/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/";
    $hpnopattern = "/[0-9]{8}/";
    $sqlUpdate = "UPDATE account SET ";
    $userID = $_SESSION['userID'];

    //Helper function that checks input for malicious or unwanted content.
    function sanitize_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Yee Siang's function to save to DB
    function saveMemberToDB() {
        global $fName , $errorMsg, $sqlUpdate, $userID, $conn;

        // remove comma from last statement
        $sqlUpdate = substr($sqlUpdate, 0, -2);
        $sqlUpdate .= " WHERE user_id='$userID'";
        if (!$conn->query($sqlUpdate)){
            echo'<h2>could not update!</h2>';
            $errorMsg = "Database error: " . $conn->error;
            $success = false;
        }else{
            echo'<h2>profile updated successfully!</h2>';
            //if name was updated, update the session first name for header
            if(isset($_POST['chkname']) && $_POST['chkname'] == 'Yes'){
                $_SESSION['firstName'] = $fName;
            }
        }
        
    }
    //vallidate name
    if (isset($_POST['chkname']) && $_POST['chkname'] == 'Yes') 
        {
            if(empty($_POST["fname"]) || empty($_POST["lname"])){
                echo'<p>name is empty</p>';
            }else
            {
                $fName = sanitize_input($_POST["fname"]);
                $lName = sanitize_input($_POST["lname"]);
                if(!filter_var($fName))
                {
                    echo'<p>first name is not a valid format</p>';
                    $success = false;
                }elseif(preg_match($namepattern, $fName) == False){
                    echo'<p>first name is not in a valid format</p>';
                    $success = false;
                }else if(!filter_var($lName)){
                    echo'<p>last name is not a valid format</p>';
                    $success = false;
                }elseif(preg_match($namepattern, $lName) == False){
                    echo'<p>last name is not a valid format</p>';
                    $success = false;
                }else{      
                    $sqlUpdate .= "fname='$fName', lname='$lName', ";
                }
            }
        }

    //validate phone number
    if (isset($_POST['chkpno']) && $_POST['chkpno'] == 'Yes') 
        {
            if(empty($_POST["pnumber"])){
                echo'<p>phone number is empty</p>';
            }else
            {
                $hpNo = sanitize_input($_POST["pnumber"]);
                if(!filter_var($hpNo))
                {
                    echo'<p>phone number is not a valid format</p>';
                    $success = false;
                }elseif(preg_match($hpnopattern, $hpNo) == False){
                    echo'<p>phone number is not in a valid format</p>';
                    $success = false;
                }else{      
                    $sqlUpdate .= "HPnumber='$hpNo', ";
                }
            }
        }

    //validate email
    if (isset($_POST['chke']) && $_POST['chke'] == 'Yes') 
        {
            if(empty($_POST["email"])){
                echo'<p>email is empty</p>';
            }else
            {
                $email = sanitize_input($_POST["email"]);
                if(!filter_var($email))
                {
                    echo'<p>email is not a valid format</p>';
                    $success = false;
                }elseif(preg_match($emailpattern, $email) == False){
                    echo'<p>email is not in a valid format</p>';
                    $success = false;
                }else{      
                    if($conn->connect_error){
                        $errorMsg = "Connection failed: " . $conn->connect_error;
                        $success = false;
                    }else{
                        $sql = "SELECT * FROM account WHERE email='$email'";
                        // Execute the query
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // email already exists
                            $success = false;
                            echo'<p>email already exists</p>';
                            
                        }else{
                            $sqlUpdate .= "email='$email', ";
                        }
                    }
                }
            }
        }
    //vallidate password
    if (isset($_POST['chkpwd']) && $_POST['chkpwd'] == 'Yes') 
        {
            if(empty($_POST["opwd"]) || empty($_POST["npwd1"]) || empty($_POST["npwd2"])){
                $errorMsg .= "password is empty";
                $success = false;
            }else
            {
                $oPwd = sanitize_input($_POST["opwd"]);
                $nPwd1 = sanitize_input($_POST["npwd1"]);
                $nPwd2 = sanitize_input($_POST["npwd2"]);
                if(!filter_var($oPwd))
                {
                    $errorMsg .= "old password is not a valid format.";
                    $success = false;
                }elseif(preg_match($pwdpattern, $oPwd) == False){
                    $errorMsg .= "old password is not a valid format.";
                    $success = false;
                }elseif(preg_match($pwdpattern, $oPwd)){
                    if($conn->connect_error){
                        $errorMsg = "Connection failed: " . $conn->connect_error;
                        $success = false;
                    }else{
                        $sql = "SELECT * FROM account WHERE user_id='$userID'";
                        // Execute the query
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // get the row that userID matches
                            $row = $result->fetch_assoc();
                            $result->free_result();
                            //check that old password was entered correctly
                            if (password_verify($oPwd, $row['password'])) {
                                if(!filter_var($nPwd1)){
                                    $errorMsg .= "new password is not a valid format.";
                                    $success = false;
                                }elseif(preg_match($pwdpattern, $nPwd1) == False){
                                    echo'<p></p>';
                                    $errorMsg .= "new password is not a valid format.";
                                    $success = false;
                                }else if(!filter_var($nPwd2)){
                                    $errorMsg .= "new password is not a valid format.";
                                    $success = false;
                                }elseif(preg_match($pwdpattern, $nPwd2) == False){
                                    $errorMsg .= "new password is not a valid format.";
                                    $success = false;
                                }elseif($nPwd1 != $nPwd2){
                                    $hashedPwd = password_hash($nPwd1, PASSWORD_DEFAULT);
                                    $errorMsg .= "new passwords do not match.";
                                    $success = false;
                                }else{     
                                    $hashedPwd = password_hash($nPwd1, PASSWORD_DEFAULT);
                                    $sqlUpdate .= "password='$hashedPwd', ";
                                }
                                
                            }
                            else{
                                $errorMsg .= "old password entered does not match old password.";
                                $success = false;
                            }
                        }
                    }
                }
            }
        }

    //if not sucessful then call method to save to database
    if($success){
        saveMemberToDB();
        $conn->close();
        $_SESSION['ppeLoadedBefore'] = true;
        echo '<form name="processProfileForm" action="'. htmlspecialchars($_SERVER["PHP_SELF"]). '" method="POST">';
        echo '<button type="submit" name="submitPPE" value="return">Return to Homepage</button></form>';?>
        </div>
    </section>
</body>
<?php
    }else{
        $conn->close();
        $_SESSION['ppeLoadedBefore'] = true;
        
        echo '<header class="header1"><h1>Oops!</h1></header>';
        echo '<h4>The following input errors were detected:</h4>';
        echo '<p>" . $errorMsg . "</p>'; 

        echo '<form name="processProfileForm" action="'. htmlspecialchars($_SERVER["PHP_SELF"]). '" method="POST">';
        echo '<button type="submit" name="submitPPE" value="return">Return to Homepage</button></form>';
        ?>
        </div>
    </section>
</body>
<?php
    }
            ?>
        </html>
    <?php
    
}

?>
