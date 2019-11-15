<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">

    <head>
        <title>ONTime</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="ONtime - Top Seller & Best Quality Services on watches">
        <meta name="keywords"
              content="Watches, Watch, Strap, Minute, Second, Buying, Selling, Discount, Offer, Fix, Repair, Maintenance, New Arrivals, Gshock, Fossil, Tag Heuer, Fashion, Hand Accessory, Second Hand, Time, Time Keeper, Pocket Watch, Rolex">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/products.css" type="text/css" />
        <link rel="stylesheet" href="css/headerFooter.css" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
        </script>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
        include "header.php";
      //  include "sideShoppingCart.php"
        ?>
        <!-- Bootstrap Carousel  W3school  URL = https://www.w3schools.com/bootstrap/bootstrap_carousel.asp-->
        <section>
            <div class="container-fluid">
                <div id="slider" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#slider" data-slide-to="0" class="active"></li>
                        <li data-target="#slider" data-slide-to="1"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="img/carousel1.jpg" alt="Carousel 1" style="width:100%;">
                            <div class="carousel-caption">
                                <h1>ONTime</h1>
                                <p>Your Friendly Watch Shop!</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="img/carousel2.jpg" alt="Carousel 2" style="width:100%;">
                            <div class="carousel-caption">
                                <h1>Awesome Watches!</h1>
                                <p>Check out more about our watches below</p>
                            </div>
                        </div>

                    </div>
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#slider" data-slide="prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        <i class="sr-only">Previous</i>
                    </a>
                    <a class="right carousel-control" href="#slider" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Bootstrap Carousel  W3school  URL = https://www.w3schools.com/bootstrap/bootstrap_carousel.asp -->

        <main class="container-fluid" id="hot">
            <section class="container-fluid">
                <section class="title-box">
                    <h2> Top Selling </h2>
                </section>
            </section>

            <!--Product Card  W3school URL https://www.w3schools.com/howto/howto_css_product_card.asp
                all image sources are from Cocomi.com URL = https://www.cocomi.com/-->
            <div class="container-fluid">

                <?php
                $connect = mysqli_connect('161.117.122.252', 'p2_7', '7tQeryxcIq', 'p2_7');
                $query = "SELECT * FROM product ORDER BY product_id ASC LIMIT 8";
                $result = mysqli_query($connect, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($product = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col-md-2 card">
                            <form method="post" action="productdetails.php"> <!--product_database.php?action=add&id=<?php //echo $product['product_id']; ?>-->
                                <div class="products">
                                    <a href="productdetails.php"><img src="img/<?php echo $product['product_img']; ?>" class="img-responsive"></a>
                                    <h4><?php echo $product['product_name']; ?></h4>
                                    <h4><?php echo $product['product_desc']; ?></h4>
                                    <p class="price"><?php echo $product['product_price']; ?></p>
                                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>"> <!--session variable to transport product id?-->
                                    <input type="hidden" name="product_name" value="<?php echo $product['product_name']; ?>">
                                    <input type="hidden" name="product_description" value="<?php echo $product['product_desc']; ?>">
                                    <input type="hidden" name="product_price" value="<?php echo $product['product_price']; ?>">
                                    <input type="submit" name="submitbutton" value="anschauen">
                                    <figure class="overlay-right">
                                        <a href="shoppingcart.php>"<button class="btn btn-secondary" title="Add to Cart">
                                                <span class="fa fa-shopping-cart"></span></button></a>
                                    </figure>

                                </div>
                            </form>
                        </div>

                        <?php
                    }
                }
                ?>
            </div>
        </main>
        <hr />

        <?php
        include "footer.php";
        ?>
    </body>

</html>
