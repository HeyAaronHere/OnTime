<nav class="navbar navbar-custom navbar-fixed-top navbar-inverse">
    <div id="topnav-centered">
        <a class="navbar-brand" href="index" title="Link to HomePage" ><img src="images/logo3.png" alt="Ontime logo"></a>
    </div>
    <section class="navbar-header" id="myNavBarLeft">
        <button title="expand navbar" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </section>
    <section class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li><a href="product">Products</a></li>
            <li><a href="customerservice">Customer Service</a></li>
            <li><a href="productsreview">Reviews</a></li>
            <li><a href="aboutus">About us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
            if (isset($_SESSION['firstName'])) {
                echo'<li><a href="profile_edit"><span class="glyphicon glyphicon-user"></span>  ' . $_SESSION['firstName'] . '</a></li>';
                echo'<li><a href="shoppingcart"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>';
                echo'<li><a href="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
            } else {
                echo'<li><a href="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                echo '<li><a href="signup"><span class="glyphicon glyphicon-pencil"></span> Signup</a></li>';
            }
            ?>
        </ul>
    </section>
</nav>
