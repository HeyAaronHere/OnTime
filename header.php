<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <nav class="navbar navbar-custom navbar-fixed-top navbar-inverse">
        <div id="topnav-centered">
            <a class="navbar-brand" href="index.php"><img src="images\logo3.png" alt="Ontime logo"
                                                           style="width:150px;height:60px;" /></a>
        </div>

        <section class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </section>

        <section class="collapse navbar-collapse container-fluid" id="myNavbar">

            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Products <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="products.php#hot">Top selling</a></li>
                        <li><a href="products.php#newarr">Newest</a></li>
                        <li><a href="products.php">All</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Customer service<span
                            class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="customerservice.php#Maintenance">Maintainence</a></li>
                        <li><a href="customerservice.php#FAQ">Faq</a></li>
                    </ul>
                </li>
                <li><a href="productsreview.php">Reviews</a></li>
                <li><a href="aboutus.php">About us</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="shoppingcart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li><a href="signup.php"><span class="glyphicon glyphicon-registration-mark"></span> Signup</a></li>
            </ul>
        </section>
    </nav>

</html>