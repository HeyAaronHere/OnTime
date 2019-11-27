<?php
session_start();
if (isset($_SESSION['userID'])) {
    header("Location: index");
    exit();
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Login - OnTime</title>
            <meta name="description" content="ONtime - Top Seller & Best Quality Services on watches">
            <meta name="keywords" content="Watches, Watch, Strap, Minute, Second, Buying, Selling, Discount, Offer, Fix, Repair, Maintenance, New Arrivals, Gshock, Fossil, Tag Heuer, Fashion, Hand Accessory, Second Hand, Time, Time Keeper, Pocket Watch, Rolex">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="css/login.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="css/headerFooter.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="js/login.js"></script>
        </head>
        <body>
            <main>
                <?php
                include "header.inc.php";
                ?>
                <section class="container">
                    <section class="row">
                        <!-- w3schools, https://www.w3schools.com/js/js_validation.asp -->
                        <section class="login-form">
                            <form novalidate name="LoginForm" action="p_login" method="post">
                                <h2 class="text-center">Login</h2>
                                <p>For new members, please go to the <a href="signup">Sign Up page</a>.</p>
                                <section class="form-group">
                                    <label for="email">Email: </label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email..." title="E.g johndoe@gmail.com" required pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$">
                                </section>
                                <section class="form-group">
                                    <label for="pwd">Password: </label>
                                    <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter your password..." title="Must contain at least 1 uppercase, 1 lowercase and 1 number/special character." required pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                                </section>
                                <section class="form-group">
                                    <button type="submit" name="login-submit" class="btn btn-primary btn-block">Log in</button>
                                </section>
                            </form>
                        </section>
                    </section>
                </section>
            </main>
            <?php
            include "footer.inc.php";
            ?>
        </body>
    </html>
<?php } ?>