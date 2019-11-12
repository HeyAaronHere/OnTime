<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

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
                        </div>

                        <div class="item">
                            <img src="img/carousel2.jpg" alt="Carousel 2" style="width:100%;">
                        </div>

                    </div>
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#slider" data-slide="prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        <i class="sr-only">Previous</i>
                    </a>
                    <a class="right carousel-control" href="#slider" data-slide="next">
                        <i class="glyphicon glyphicon-chevron-right"></i>
                        <i class="sr-only">Next</i>
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
            <div class="row">

                <div class="col-md-3">

                    <figure class="card">
                        <a href="productdetails.php"><img src="img/WatchM1.jpg" alt="Buring Classic Blue Men's Watch"></a>
                        <h1>Male Watch 1</h1>
                        <p class="price">$19.99</p>
                        <p>Some text about the watch..</p>

                        <figure class="overlay-right">
                            <!--<button class="btn btn-secondary" title="Quick Shop">
                                <i class="fa fa-eye"></i></button>
                            <button class="btn btn-secondary" title="Add to wishlist">
                                <i class="fa fa-heart-o"></i></button>-->
                            <a href="shoppingcart.php"><button class="btn btn-secondary" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i></button></a>
                        </figure>

                        <figure class="star-rating">
                            <i class="fa fa-star" data-rating="1"></i>
                            <i class="fa fa-star" data-rating="2"></i>
                            <i class="fa fa-star " data-rating="3"></i>
                            <i class="fa fa-star" data-rating="4"></i>
                            <i class="fa fa-star-half-o" data-rating="5"></i>
                        </figure>
                    </figure>
                </div>

                <div class="col-md-3">
                    <figure class="card">
                        <a href="productdetails.php"><img src="img/WatchM2.jpg" alt="Buring Classic White Men's Watch"></a>
                        <h1>Male Watch 2</h1>
                        <p class="price">$19.99</p>
                        <p>Some text about the watch..</p>
                        <figure class="overlay-right">
                            <!--<button class="btn btn-secondary" title="Quick Shop">
                                <i class="fa fa-eye"></i></button>
                            <button class="btn btn-secondary" title="Add to wishlist">
                                <i class="fa fa-heart-o"></i></button>-->
                            <a href="shoppingcart.php"><button class="btn btn-secondary" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i></button></a>
                        </figure>

                        <figure class="star-rating">
                            <i class="fa fa-star" data-rating="1"></i>
                            <i class="fa fa-star" data-rating="2"></i>
                            <i class="fa fa-star " data-rating="3"></i>
                            <i class="fa fa-star-o" data-rating="4"></i>
                            <i class="fa fa-star-o" data-rating="5"></i>
                        </figure>
                    </figure>
                </div>
                <div class="col-md-3">
                    <figure class="card">
                        <a href="productdetails.php"><img src="img/WatchM3.jpg" alt="Timberland Ashland Men's Watch"></a>
                        <h1>Male Watch 3</h1>
                        <p class="price">$19.99</p>
                        <p>Some text about the watch..</p>
                        <figure class="overlay-right">
                            <!--<button class="btn btn-secondary" title="Quick Shop">
                                <i class="fa fa-eye"></i></button>
                            <button class="btn btn-secondary" title="Add to wishlist">
                                <i class="fa fa-heart-o"></i></button>-->
                            <a href="shoppingcart.php"><button class="btn btn-secondary" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i></button></a>
                        </figure>

                        <figure class="star-rating">
                            <i class="fa fa-star" data-rating="1"></i>
                            <i class="fa fa-star" data-rating="2"></i>
                            <i class="fa fa-star " data-rating="3"></i>
                            <i class="fa fa-star" data-rating="4"></i>
                            <i class="fa fa-star-half-o" data-rating="5"></i>
                        </figure>
                    </figure>
                </div>
                <div class="col-md-3">
                    <figure class="card">
                        <a href="productdetails.php"><img src="img/WatchM4.jpg" alt="Timberland Biddeford Men's Watch"></a>

                        <h1>Male Watch 4</h1>
                        <p class="price">$19.99</p>
                        <p>Some text about the watch..</p>
                        <figure class="overlay-right">
                            <!--<button class="btn btn-secondary" title="Quick Shop">
                                 <i class="fa fa-eye"></i></button>
                             <button class="btn btn-secondary" title="Add to wishlist">
                                 <i class="fa fa-heart-o"></i></button>-->
                            <a href="shoppingcart.php"><button class="btn btn-secondary" title="Add to Cart">
                                    <i class="fa fa-shopping-cart"></i></button></a>
                        </figure>

                        <figure class="star-rating">
                            <i class="fa fa-star" data-rating="1"></i>
                            <i class="fa fa-star" data-rating="2"></i>
                            <i class="fa fa-star " data-rating="3"></i>
                            <i class="fa fa-star" data-rating="4"></i>
                            <i class="fa fa-star" data-rating="5"></i>
                        </figure>
                    </figure>
                </div>
            </div>

            <div class="container-fluid" id="newarr">
                <div class="title-box">
                    <h2> Newest </h2>
                </div>
            </div>

            <div class="col-md-3">
                <figure class="card">
                    <a href="productdetails.php"><img src="img/WatchF1.jpg" alt="Olivia Burton British Blooms Rose Women's Watch"></a>
                    <h1>Female Watch 1</h1>
                    <p class="price">$19.99</p>
                    <p>Some text about the watch..</p>
                    <figure class="overlay-right">
                        <!--<button class="btn btn-secondary" title="Quick Shop">
                                <i class="fa fa-eye"></i></button>
                            <button class="btn btn-secondary" title="Add to wishlist">
                                <i class="fa fa-heart-o"></i></button>-->
                        <a href="shoppingcart.php"><button class="btn btn-secondary" title="Add to Cart">
                                <i class="fa fa-shopping-cart"></i></button></a>
                    </figure>
                    <figure class="star-rating">
                        <i class="fa fa-star" data-rating="1"></i>
                        <i class="fa fa-star" data-rating="2"></i>
                        <i class="fa fa-star " data-rating="3"></i>
                        <i class="fa fa-star" data-rating="4"></i>
                        <i class="fa fa-star-o" data-rating="5"></i>
                    </figure>
                </figure>
            </div>

            <div class="col-md-3">
                <figure class="card">
                    <a href="productdetails.php"><img src="img/WatchF2.jpg" alt="Olivia Burton British Blooms Silver Women's Watch"></a>
                    <h1>Female Watch 2</h1>
                    <p class="price">$19.99</p>
                    <p>Some text about the watch..</p>
                    <figure class="overlay-right">
                        <!--<button class="btn btn-secondary" title="Quick Shop">
                                <i class="fa fa-eye"></i></button>
                            <button class="btn btn-secondary" title="Add to wishlist">
                                <i class="fa fa-heart-o"></i></button>-->
                        <a href="shoppingcart.php"><button class="btn btn-secondary" title="Add to Cart">
                                <i class="fa fa-shopping-cart"></i></button></a>
                    </figure>
                    <figure class="star-rating">
                        <i class="fa fa-star" data-rating="1"></i>
                        <i class="fa fa-star" data-rating="2"></i>
                        <i class="fa fa-star " data-rating="3"></i>
                        <i class="fa fa-star" data-rating="4"></i>
                        <i class="fa fa-star-o" data-rating="5"></i>
                    </figure>
                </figure>
            </div>

            <div class="col-md-3">
                <figure class="card">
                    <a href="productdetails.php"><img src="img/WatchF3.jpg" alt="Paul Hewitt Sailor Line Modest Black"></a>
                    <h1>Female Watch 3</h1>
                    <p class="price">$19.99</p>
                    <p>Some text about the watch..</p>
                    <figure class="overlay-right">
                        <!--<button class="btn btn-secondary" title="Quick Shop">
                                 <i class="fa fa-eye"></i></button>
                             <button class="btn btn-secondary" title="Add to wishlist">
                                 <i class="fa fa-heart-o"></i></button>-->
                        <a href="shoppingcart.php"><button class="btn btn-secondary" title="Add to Cart">
                                <i class="fa fa-shopping-cart"></i></button></a>
                    </figure>
                    <figure class="star-rating">
                        <i class="fa fa-star" data-rating="1"></i>
                        <i class="fa fa-star" data-rating="2"></i>
                        <i class="fa fa-star " data-rating="3"></i>
                        <i class="fa fa-star-half-o" data-rating="4"></i>
                        <i class="fa fa-star-o" data-rating="5"></i>
                    </figure>
                </figure>
            </div>

            <div class="col-md-3">
                <figure class="card">
                    <a href="productdetails.php"><img src="img/WatchF4.jpg" alt="Paul Hewitt Miss Ocean Line Holo Silver Women's Watch"></a>
                    <h1>Female Watch 4</h1>
                    <p class="price">$19.99</p>
                    <p>Some text about the watch..</p>
                    <figure class="overlay-right">
                        <!--<button class="btn btn-secondary" title="Quick Shop">
                                <i class="fa fa-eye"></i></button>
                            <button class="btn btn-secondary" title="Add to wishlist">
                                <i class="fa fa-heart-o"></i></button>-->
                        <a href="shoppingcart.php"><button class="btn btn-secondary" title="Add to Cart">
                                <i class="fa fa-shopping-cart"></i></button></a>
                    </figure>
                    <figure class="star-rating">
                        <i class="fa fa-star" data-rating="1"></i>
                        <i class="fa fa-star" data-rating="2"></i>
                        <i class="fa fa-star " data-rating="3"></i>
                        <i class="fa fa-star" data-rating="4"></i>
                        <i class="fa fa-star" data-rating="5"></i>
                    </figure>
            </div>
            <!--Product Card  W3school URL https://www.w3schools.com/howto/howto_css_product_card.asp  
               all images source from Cocomi.com URL = https://www.cocomi.com/ -->
        </main>
        <hr />

        <?php
        include "footer.php";
        ?>
    </body>

</html>