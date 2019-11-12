<!DOCTYPE html>
<html>
    <head>
        <title>Signup - OnTime</title>
        <meta name="description" content="ONtime - Top Seller & Best Quality Services on watches">
        <meta name="keywords" content="Watches, Watch, Strap, Minute, Second, Buying, Selling, Discount, Offer, Fix, Repair, Maintenance, New Arrivals, Gshock, Fossil, Tag Heuer, Fashion, Hand Accessory, Second Hand, Time, Time Keeper, Pocket Watch, Rolex">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/signup.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/headerFooter.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="js/FormVal.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <main>
            <?php
            include 'header.php';
            ?>
            <div class=container>
                <div class="row">
                    <div class="login-form">
                        <form name="RegForm" action="p_signup.php" method="post" onsubmit="return validateform()">
                            <h2 class="text-center">Create An Account</h2>
                            <p>For existing members, please go to the <a href="login.php">login page</a>.</p>
                            <div class="form-group">
                                <label for="FirstName">First Name:</label>
                                <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname" required pattern="^([a-zA-Z]+[,.]?[ ]?|[a-zA-Z]+['-]?)+$">
                            </div>
                            <div class="form-group">
                                <label for="LastName">Last Name:</label>
                                <input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lname" required pattern="^([a-zA-Z]+[,.]?[ ]?|[a-zA-Z]+['-]?)+$">
                            </div>
                            <div class="form-group">
                                <label for="Email">Email:</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email..." title="E.g johndoe@gmail.com" required pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$">
                            </div>
                            <div class="form-group">
                                <label for="Password">Password:</label>
                                <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter your password..." title="Must contain at least 1 uppercase, 1 lowercase and 1 number/special character" required pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                            </div>
                            <div class="form-group">
                                <label for="ConfirmPassword">Confirm Password:</label>
                                <input type="password" class="form-control" name="cfmpwd" id="cfmpwd" placeholder="Confirm your password..." title="Input your password again" required pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" id="TaC" name="TaC" value="" required> Agree to terms and conditions</label>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="signup-submit" class="btn btn-primary btn-block">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <?php
        include 'footer.php';
        ?>
    </body>
</html>