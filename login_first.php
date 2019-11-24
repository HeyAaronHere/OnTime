<?php
//start session
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Main Page - OnTime</title>
        <meta charset="utf-8">
        <meta name="description" content="ONtime - Top Seller & Best Quality Services on watches">
        <meta name="keywords"
              content="Watches, Watch, Strap, Minute, Second, Buying, Selling, Discount, Offer, Fix, Repair, Maintenance, New Arrivals, Gshock, Fossil, Tag Heuer, Fashion, Hand Accessory, Second Hand, Time, Time Keeper, Pocket Watch, Rolex">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/main.css" />
        <link rel="stylesheet" type="text/css" href="css/headerFooter.css" />
        <script src="js/mainPage.js"></script>
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
        <section class="jumbotron" id="login_first_msg">
            <h1>SORRY :(</h1>
            <div class="container-fluid">
                <div class="col-md-4"></div>
                <h2 class="col-md-4">You must Log in first to access this page <a href="login">
                        <p><i class="loginLink"></i> Login Page</p>
                    </a>
                </h2>
                <div class="col-md-4"></div>
            </div>
        </section>
        <?php
        include "footer.inc.php";
        ?>
    </body>
</html>