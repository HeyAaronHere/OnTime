<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <head>
        <title>Customer Service - OnTime</title>
        <meta name="description" content="ONtime - Top Seller & Best Quality Services on watches">
        <meta name="keywords"
              content="Watches, Watch, Strap, Minute, Second, Buying, Selling, Discount, Offer, Fix, Repair, Maintenance, New Arrivals, Gshock, Fossil, Tag Heuer, Fashion, Hand Accessory, Second Hand, Time, Time Keeper, Pocket Watch, Rolex">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/productDetails.css" rel="stylesheet" type="text/css">
        <link href="css/headerFooter.css" rel="stylesheet" type="text/css">
        <script src="js/productDetails.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
        include "header.php";
        ?>
        <!-- Bootstrap Carousel  W3school  URL = https://www.w3schools.com/bootstrap/bootstrap_carousel.asp  
            all images source from Cocomi.com URL = https://www.cocomi.com/
            how to make a single product ecommerce URL https://www.youtube.com/watch?v=4zGBRBHsgEY Author- Easy Tutorials-->

        <article class="singleProduct">
            <section class="container">
                <section class=row>
                    <div class="col-md-5">
                        <div id="product-slider" class="carousel slide" data-ride="carousel">

                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#product-slider" data-slide-to="0" class="active"></li>
                                <li data-target="#product-slider" data-slide-to="1"></li>
                                <li data-target="#product-slider" data-slide-to="2"></li>
                                <li data-target="#product-slider" data-slide-to="3"></li>
                                <li data-target="#product-slider" data-slide-to="4"></li>
                                <li data-target="#product-slider" data-slide-to="5"></li>
                                <li data-target="#product-slider" data-slide-to="6"></li>
                                <li data-target="#product-slider" data-slide-to="7"></li>
                                <li data-target="#product-slider" data-slide-to="8"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <figure class="item active">
                                    <img src="img/WatchF1.jpg" alt="Buring Classic Blue Men's Watch">
                                </figure>

                                <figure class="item">
                                    <img src="img/WatchF2.jpg" alt="Buring Classic White Men's Watch">
                                </figure>
                                <figure class="item">
                                    <img src="img/WatchF3.jpg" alt="Timberland Ashland Men's Watch">
                                </figure>
                                <figure class="item">
                                    <img src="img/WatchF4.jpg" alt="Timberland Biddeford Men's Watch">
                                </figure>
                                <figure class="item">
                                    <img src="img/WatchM1.jpg" alt="Olivia Burton British Blooms Rose Women's Watch">
                                </figure>
                                <figure class="item">
                                    <img src="img/WatchM2.jpg" alt="Olivia Burton British Blooms Silver Women's Watch">
                                </figure>
                                <figure class="item">
                                    <img src="img/WatchM3.jpg" alt="Paul Hewitt Sailor Line Modest Black">
                                </figure>
                                <figure class="item">
                                    <img src="img/WatchM4.jpg" alt="Paul Hewitt Miss Ocean Line Holo Silver Women's Watch">
                                </figure>
                            </div>
                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#product-slider" data-slide="prev">
                                <i class="glyphicon glyphicon-chevron-left"></i>
                                <i class="sr-only">Previous</i>
                            </a>
                            <a class="right carousel-control" href="#product-slider" data-slide="next">
                                <i class="glyphicon glyphicon-chevron-right"></i>
                                <i class="sr-only">Next</i>
                            </a>
                        </div>
                    </div>


                    <div class="col-md-7">
                        <p class="new-arrival text-center">NEW</p>
                        <h2>Men and Women's Watches</h2>
                        <p>Product Code: A12345Z </p>
                        <figure class="star-rating">
                            <span class="fa fa-star" data-rating="1"></span>
                            <span class="fa fa-star" data-rating="2"></span>
                            <span class="fa fa-star" data-rating="3"></span>
                            <span class="fa fa-star" data-rating="4"></span>
                            <span class="fa fa-star-half-o" data-rating="5"></span>
                        </figure>
                        <p class="price">SGD $40.00 </p>
                        <p><b>Availability</b> In Stock </p>
                        <p><b>Condition</b> New </p>
                        <p><b>Brand</b> ABC.Co </p>
                        <label>Quantity </label>
                        <form name="productdetails" action="productDetails.html" method="post"
                              onsubmit="return validateform()">
                            <input id="productdetails" name="productdetails">
                            <button type="submit" value="Submit"> Add to Cart</button>
                    </div>
                </section>
            </section>

            <section class="productDescription">
                <section class="container">
                    <h3>Product Description</h3>
                    <p>This is the Product Description . This is the Product Description .This is the Product
                        Description This is the Product Description
                        This is the Product Description LOLThis is the Product Description This is the Product
                        Description This is the Product Description LOLThis is the Product
                        Description</p>

                    <p>This is the Product Description . This is the Product Description .This is the Product
                        Description This is the Product Description
                        This is the Product Description This is the Product Description This is the Product
                        Description This is the Product Description LOLThis is the Product
                        Description </p>

                    <hr />
                </section>
            </section>
        </section>
    </article>

    <!-- Bootstrap Carousel  W3school  URL = https://www.w3schools.com/bootstrap/bootstrap_carousel.asp  
        all images source from Cocomi.com URL = https://www.cocomi.com/
        how to make a single product ecommerce URL https://www.youtube.com/watch?v=4zGBRBHsgEY Author= Easy Tutorial (Youtube Channel)-->

    <?php
    include "footer.php";
    ?>
</body>