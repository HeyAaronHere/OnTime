<nav class="navbar navbar-custom navbar-fixed-top navbar-inverse">
    <div id="topnav-centered">
<<<<<<< HEAD
        <a class="navbar-brand" href="index.php" title="Link to HomePage" ><img src="images/logo3.png" alt="Ontime logo"></a>
=======
        <a class="navbar-brand" href="index.php" title="Link to HomePage" ><img id="navbarstyle" src="images/logo3.png" alt="Ontime logo"></a>
>>>>>>> 5c544de4a2f97898bdd623708169224f6f84cf96
    </div>
    <section class="navbar-header" id="myNavBarLeft">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </section>
    <section class="collapse navbar-collapse container-fluid" id="myNavbar">
        <ul class="nav navbar-nav">
            <li><a href="product.php">Products</a></li>
            <li><a href="customerservice.php">Customer Service</a></li>
            <li><a href="productsreview.php">Reviews</a></li>
            <li><a href="aboutus.php">About us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
            if (isset($_SESSION['firstName'])) {
                echo'<li><a href="profile_edit.php"><span class="glyphicon glyphicon-user"></span>  ' . $_SESSION['firstName'] . '</a></li>';
                echo'<li><a href="shoppingcart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>';
                echo'<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
            } else {
                echo'<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                echo '<li><a href="signup.php"><span class="glyphicon glyphicon-pencil"></span> Signup</a></li>';
            }
            ?>
        </ul>
    </section>
</nav>
