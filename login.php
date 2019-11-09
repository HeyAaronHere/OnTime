<!DOCTYPE html>
<html>

<head>
    <title>Login - OnTime</title>
    <meta name="description" content="ONtime - Top Seller & Best Quality Services on watches">
    <meta name="keywords" content="Watches, Watch, Strap, Minute, Second, Buying, Selling, Discount, Offer, Fix, Repair, Maintenance, New Arrivals, Gshock, Fossil, Tag Heuer, Fashion, Hand Accessory, Second Hand, Time, Time Keeper, Pocket Watch, Rolex">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/login.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/headerFooter.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/login.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <main>
        <?php
        include "header.php";
        ?>
        <div class=container>
            <div class="row">
                <div class="col-md-6">
                    <!-- w3schools, https://www.w3schools.com/js/js_validation.asp -->
                    <div class="login-form">
                        <form name="Login" action="index.html" method="post" onsubmit="return validateform()">
                            <h2 class="text-center">Login</h2>
                            <div class="form-group">
                                <input type="text" class="form-control" name="Username" placeholder="Username" required pattern="[0-9a-zA-Z_.-]*">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="Password" placeholder="Password" required pattern="[0-9a-zA-Z_.-]*">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Log in</button>
                            </div>
                            <div class="clearfix">
                                <label class="pull-left checkbox-inline"><input type="checkbox">
                                    Remember me</label>
                                <a href="#" class="pull-right">Forgot Password?</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="login-form">
                        <form name="CreateAcc" action="index.html" method="post" onsubmit="return validateform()">
                            <h2 class="text-center">Create An Account</h2>
                            <div class="form-group">
                                <input type="text" class="form-control" name="CreateUsername" placeholder="Username" required pattern="[0-9a-zA-Z_.-]*">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="CreatePassword" placeholder="Password" required pattern="[0-9a-zA-Z_.-]*">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="CfmPassword" placeholder="Confirm Password" required pattern="[0-9a-zA-Z_.-]*">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    include "footer.php";
    ?>
</body>

</html>