<?php
//start session
if (!isset($_SESSION)) {
                session_start();
}
?>

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
    include "header.php";
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
                                <label for="FirstName">First Name:</label>
                                <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname" required="false" disabled="true" pattern="^([a-zA-Z]+[,.]?[ ]?|[a-zA-Z]+['-]?)+$">
                            </div>
                            <div class="form-group">
                                <label for="LastName">Last Name:</label>
                                <input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lname" required="false" disabled="true" pattern="^([a-zA-Z]+[,.]?[ ]?|[a-zA-Z]+['-]?)+$">
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
                                <label for="FirstName">Handphone no.:</label>
                                <input type="text" class="form-control" id="pnumber" placeholder="Enter phone no." name="pnumber"  required="false" disabled="true" >
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
                                <label for="email">Email address:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" required="false" disabled="true" name="email" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$">
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
                                <label for="pwd1">Old Password:</label>
                                <input type="password" class="form-control" id="opwd" placeholder="Enter password" name="opwd" required="false" disabled="true" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                            </div>
                            <div class="form-group">
                                <label for="pwd1">New Password:</label>
                                <input type="password" class="form-control" id="npwd1" placeholder="Enter password" name="npwd1" required="false" disabled="true" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                            </div>
                            <div class="form-group">
                                <label for="pwd1">Confirm New Password:</label>
                                <input type="password" class="form-control" id="npwd2" placeholder="Enter password" name="npwd2" required="false" disabled="true" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                            </div>

                            <div class="checkbox">
                                <label><input type="checkbox" id="chkpwd" name="chkpwd" value="Yes" >select to change password</label>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div> 
            
        <input type="submit" class="btn btn-default"></input>
        </div>
        
        </form>
    </main>

    <?php
    include "footer.php";
    ?>
</body>

</html>