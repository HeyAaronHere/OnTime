<?php
//start session
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['firstName'])) {
    header("Location: login_first.php");
    exit();
}else {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile page - OnTime</title>
    <meta charset="utf-8">
    <meta name="description" content="ONtime - Top Seller & Best Quality Services on watches">
    <meta name="keywords"
          content="Watches, Watch, Strap, Minute, Second, Buying, Selling, Discount, Offer, Fix, Repair, Maintenance, New Arrivals, Gshock, Fossil, Tag Heuer, Fashion, Hand Accessory, Second Hand, Time, Time Keeper, Pocket Watch, Rolex">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/headerFooter.css" />
    <script src="js/profileEdit.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/bootstrap.min.js"></script>

</head>    
<body>

    <?php
    include "header.inc.php";
    ?>

    <main>
    <form novalidate name="pEditForm" action="p_profile_edit.php" method="post" onsubmit="return validateProfileEditForm()" autocomplete="off">
        <div class="container">
            <h2>Edit Particulars</h2>
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">    
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Change name</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <h2 class="text-center">Change name</h2>

                            <div class="form-group">
                                <label for="fname" id="fname_lbl">First Name:</label>
                                <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname" disabled pattern="^([a-zA-Z]+[,.]?[ ]?|[a-zA-Z]+['-]?)+$">
                            </div>
                            <div class="form-group">
                                <label for="lname" id="lname_lbl">Last Name:</label>
                                <input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lname" disabled pattern="^([a-zA-Z]+[,.]?[ ]?|[a-zA-Z]+['-]?)+$">
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" id="chkname" name="chkname" value="Yes" >select to change name</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">    
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Change Handphone no.</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <h2 class="text-center">Change Handphone No.</h2>

                            <div class="form-group">
                                <label for="pnumber" id="pnumber_lbl">Handphone no.:</label>
                                <input type="text" class="form-control" id="pnumber" placeholder="Enter phone no." name="pnumber" disabled pattern="[0-9]{8}" >
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" id="chkpno" name="chkpno" value="Yes" >select to change phone number</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">    
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Change Email</a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse">
                        <div class="panel-body">
                            <h2 class="text-center">Change Email</h2>
                            <div class="form-group">
                                <label for="email" id="email_lbl">Email address:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" disabled name="email" pattern="/[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$/">
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" id="chke" name="chke" value="Yes" >select to change email</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">    
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Change Password</a>
                        </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse">
                        <div class="panel-body">
                            <h2 class="text-center">Change Password</h2>
                            <div class="form-group">
                                <label for="opwd" id="pwd_lbl">Old Password:</label>
                                <input type="password" class="form-control" id="opwd" placeholder="Enter password" name="opwd" disabled pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                            </div>
                            <div class="form-group">
                                <label for="npwd1">New Password:</label>
                                <input type="password" class="form-control" id="npwd1" placeholder="Enter password" name="npwd1" disabled pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                            </div>
                            <div class="form-group">
                                <label for="npwd2">Confirm New Password:</label>
                                <input type="password" class="form-control" id="npwd2" placeholder="Enter password" name="npwd2" disabled pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" id="chkpwd" name="chkpwd" value="Yes" >select to change password</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <input type="submit" name="submitPPE" value="goto" class="btn btn-default">
        </div>
    </form>
        </main>
        <?php
        include "footer.inc.php";
        ?>
    </body>
</html>
<?php
}
?>