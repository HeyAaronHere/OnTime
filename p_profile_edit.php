<?php
//start session
if (!isset($_SESSION)) {
    session_start();
<<<<<<< HEAD
    include "connection.php";
    
    $success = true;
    
    $email = $nPwd1 = $nPwd2 = $oPwd = $fName = $hpNo = $lName = $errorMsg = "";
    $emailpattern = "/[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$/";
    $namepattern = "/^([a-zA-Z]+[,.]?[ ]?|[a-zA-Z]+['-]?)+$/";
    $pwdpattern = "/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/";
    $hpnopattern = "/[0-9]{8}/";
    $sqlUpdate = "UPDATE account SET ";
    $userID = $_SESSION['userID'];
    //$sql = "UPDATE user set dod='$dod', mod='$mod',yod='$yod' where id='$id'";

    //Helper function that checks input for malicious or unwanted content.
    function sanitize_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Yee Siang's function to save to DB
    function saveMemberToDB() {
        global $email , $nPwd1 , $nPwd2 , $oPwd , $fName , $hpNo , $lName , $errorMsg, $sqlUpdate, $userID, $conn;

        // remove comma from last statement
        $sqlUpdate = substr($sqlUpdate, 0, -2);
        $sqlUpdate .= " WHERE user_id='$userID'";
        echo "<br><br><p>". $sqlUpdate ."</p>";
        if (!$conn->query($sqlUpdate)){
            echo'<h1>could not update!</h1>';
            $errorMsg = "Database error: " . $conn->error;
            $success = false;
        }else{
            echo'<h1>profile updated!</h1>';
            //if name was updated, update the session first name for header
            if(isset($_POST['chkname']) && $_POST['chkname'] == 'Yes'){
                $_SESSION['firstName'] = $fName; //fname actually
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
                echo'<p>first name is not empty</p>';
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
    echo'<p>gone through the FIRST if statement</p>';

    //validate phone number
    if (isset($_POST['chkpno']) && $_POST['chkpno'] == 'Yes') 
        {
            echo'<p>phone number has been checked</p>';
            if(empty($_POST["pnumber"])){
                echo'<p>phone number is empty</p>';
            }else
            {
                echo'<p>phone number is not empty</p>';
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
    echo'<p>gone through the SECOND if statement</p>';

    //validate email
    if (isset($_POST['chke']) && $_POST['chke'] == 'Yes') 
        {
            echo'<p>email has been checked</p>';
            if(empty($_POST["email"])){
                echo'<p>email is empty</p>';
            }else
            {
                echo'<p>email is not empty</p>';
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
    echo'<p>gone through the THIRD if statement</p>';
    //vallidate password
    if (isset($_POST['chkpwd']) && $_POST['chkpwd'] == 'Yes') 
        {
            echo'<p>name has been checked</p>';
            if(empty($_POST["opwd"]) || empty($_POST["npwd1"]) || empty($_POST["npwd2"])){
                echo'<p>password is empty</p>';
            }else
            {
                echo'<p>password is not empty</p>';
                $oPwd = sanitize_input($_POST["opwd"]);
                $nPwd1 = sanitize_input($_POST["npwd1"]);
                $nPwd2 = sanitize_input($_POST["npwd2"]);
                if(!filter_var($oPwd))
                {
                    echo'<p>old password is not a valid format</p>';
                    $success = false;
                }elseif(preg_match($pwdpattern, $oPwd) == False){
                    echo'<p>old password is not in a valid format</p>';
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
                                echo'<p>password matches with database</p>';
                                if(!filter_var($nPwd1)){
                                    echo'<p>new password is not a valid format</p>';
                                    $success = false;
                                }elseif(preg_match($pwdpattern, $nPwd1) == False){
                                    echo'<p>new password is not a valid format</p>';
                                    $success = false;
                                }else if(!filter_var($nPwd2)){
                                    echo'<p>new password is not a valid format</p>';
                                    $success = false;
                                }elseif(preg_match($pwdpattern, $nPwd2) == False){
                                    echo'<p>new password is not a valid format</p>';
                                    $success = false;
                                }elseif($nPwd1 != $nPwd2){
                                    $hashedPwd = password_hash($nPwd1, PASSWORD_DEFAULT);
                                    echo'<p>new passwords do not match</p>';
                                    $success = false;
                                }else{     
                                    echo'<p>new password added</p>';
                                    $hashedPwd = password_hash($nPwd1, PASSWORD_DEFAULT);
                                    $sqlUpdate .= "fname='$hashedPwd', ";
                                }
                                
                            }
                            else{
                                echo'<p>old password entered does not match old password</p>';
                                $success = false;
                            }
                        }
                    }
                }
            }
        }
    
    echo'<p>gone through the LAST if statement</p>';

    //if no sucessful then call method to save to database
    if($success){
        saveMemberToDB();
        $conn->close();

            //echo "<script type='text/javascript'>alert('Details updated successfuly!') window.location.href='index.php';</script>";
    }else{
        
    $conn->close();
    }

        ?>

        <!DOCTYPE html>

        <html lang="en">

            <head>


            
            </head>

        </html>
    <?php
    
=======
    // Constants for accessing our DB:
    define("DBHOST", "161.117.122.252");
    define("DBNAME", "p2_7");
    define("DBUSER", "p2_7");
    define("DBPASS", "7tQeryxcIq");
    $email = $pwd = $fname = $errorMsg = "";
//chkname chkpno chke chkpwd
    if (isset($_POST['chkname']) && $_POST['chkname'] == 'Yes') {
        echo'<p>name has been checked</p>';
    }
    if (isset($_POST['chkname']) && $_POST['chkname'] == 'Yes') {
        echo'<p>name has been checked</p>';
    }
    if (isset($_POST['chkname']) && $_POST['chkname'] == 'Yes') {
        echo'<p>name has been checked</p>';
    }
    if (isset($_POST['chkname']) && $_POST['chkname'] == 'Yes') {
        echo'<p>name has been checked</p>';
    }
    if (isset($_POST['chkname']) && $_POST['chkname'] == 'Yes') {
        echo'<p>name has been checked</p>';
    }
    $success = true;
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>



        </head>

    </html>
    <?php
>>>>>>> 45f43d30ddd5e6088d02af7058dbb708b95f71b4
}

?>
