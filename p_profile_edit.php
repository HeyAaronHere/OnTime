<?php
//start session
if (!isset($_SESSION)) {
    session_start();
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
}
?>
