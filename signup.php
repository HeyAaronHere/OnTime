<?php
session_start();
if (isset($_SESSION['firstName'])) {
    header("Location: index");
    exit();
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Signup - OnTime</title>
            <meta name="description" content="ONtime - Top Seller & Best Quality Services on watches">
            <meta name="keywords" content="Watches, Watch, Strap, Minute, Second, Buying, Selling, Discount, Offer, Fix, Repair, Maintenance, New Arrivals, Gshock, Fossil, Tag Heuer, Fashion, Hand Accessory, Second Hand, Time, Time Keeper, Pocket Watch, Rolex">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="css/signup.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="css/headerFooter.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="js/FormVal.js"></script>
        </head>
        <body>
            <main>
                <?php
                include 'header.inc.php';
                ?>
                <section class=container>
                    <section class="row">
                        <section class="login-form">
                            <form name="RegForm" action="p_signup" method="post">
                                <h1 class="text-center">Create An Account</h1>
                                <p>For existing members, please go to the <a href="login">login page</a>.</p>
                                <section class="form-group">
                                    <label for="fname">First Name: </label>
                                    <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname" required pattern="^([a-zA-Z]+[,.]?[ ]?|[a-zA-Z]+['-]?)+$">
                                </section>
                                <section class="form-group">
                                    <label for="lname">Last Name: </label>
                                    <input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lname" required pattern="^([a-zA-Z]+[,.]?[ ]?|[a-zA-Z]+['-]?)+$">
                                </section>
                                <section class="form-group">
                                    <label for="email">Email: </label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email..." title="E.g johndoe@gmail.com" required pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$">
                                </section>
                                <section class="form-group">
                                    <label for="HPnumber">Contact No: </label>
                                    <input type="tel" class="form-control" id="HPnumber" name="HPnumber" placeholder="(+65) E.g: 98765432" maxlength="8" required pattern="[0-9]{8}">
                                </section>
                                <section class="form-group">
                                    <label for="pwd">Password: </label>
                                    <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter your password..." title="Must contain at least 1 uppercase, 1 lowercase and 1 number/special character" required pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                                </section>
                                <section class="form-group">
                                    <label for="cfmpwd">Confirm Password: </label>
                                    <input type="password" class="form-control" name="cfmpwd" id="cfmpwd" placeholder="Confirm your password..." title="Input your password again" required pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                                </section>
                                <section class="checkbox">
                                    <label><input type="checkbox" id="TaC" name="TaC" value="" required> Agree to terms and conditions</label>
                                </section>
                                <section class="form-group">
                                    <button type="submit" name="signup-submit" class="btn btn-primary btn-block">Create Account</button>
                                </section>
                            </form>
                        </section>
                    </section>
                </section>
            </main>
            <?php
            include 'footer.inc.php';
            ?>
        </body>
    </html>
    <?php
}?>