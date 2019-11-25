<?php
//start session
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Main Page - OnTime</title>
        <meta charset="utf-8">
        <meta name="description" content="ONtime - Top Seller & Best Quality Services on watches">
        <meta name="keywords"
              content="Watches, Watch, Strap, Minute, Second, Buying, Selling, Discount, Offer, Fix, Repair, Maintenance, New Arrivals, Gshock, Fossil, Tag Heuer, Fashion, Hand Accessory, Second Hand, Time, Time Keeper, Pocket Watch, Rolex">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/headerFooter.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mainPage.js"></script>
    </head>
    <body>
        <main>
            <?php
            include "header.inc.php";
            ?>
            <section class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div id="imageCarousel" class="carousel slide" data-interval="5000" data-ride="carousel"
                             data-pause="hover" data-wrap="true">
                            <p id="carouselheadCC">Current Collection</p>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="row">
                                        <div class="col-xs-4 img-zoom imghover">
                                            <a href="product">
                                                <img src="img/WatchF1.png" class="img-responsive" alt="Olivia Burton P  ink">
                                            </a>
                                        </div>
                                        <div class="col-xs-4 img-zoom imghover">
                                            <a href="product">
                                                <img src="img/WatchF2.png" class="img-responsive" alt="Fossil townsman">
                                            </a>
                                        </div>
                                        <div class="col-xs-4 img-zoom imghover">
                                            <a href="product">
                                                <img src="img/WatchF3.png" class="img-responsive" alt="Fossil townsman">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row">
                                        <div class="col-xs-4 img-zoom imghover">
                                            <a href="product">
                                                <img src="img/WatchF4.png" class="img-responsive" alt="Fossil townsman">
                                            </a>
                                        </div>
                                        <div class="col-xs-4 img-zoom imghover">
                                            <a href="product">
                                                <img src="img/WatchM1.png" class="img-responsive" alt="Fossil townsman">
                                            </a>
                                        </div>
                                        <div class="col-xs-4 img-zoom imghover">
                                            <a href="product">
                                                <img src="img/WatchM2.png" class="img-responsive" alt="Fossil townsman">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="#imageCarousel" title="previous slide" class="carousel-control left" data-slide="prev"
                                   style="background:none !important">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a href="#imageCarousel" title="next slide" class="carousel-control right" data-slide="next"
                                   style="background:none !important">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div id="imageCarousel1" class="carousel slide" data-interval="5000" data-ride="carousel"
                             data-pause="hover" data-wrap="true">
                            <p id="carouselheadBC">Best Collection</p>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="row">
                                        <div class="col-xs-4 img-zoom imghover">
                                            <a href="product">
                                                <img src="img/WatchF1.png" class="img-responsive" alt="Fossil townsman">
                                            </a>
                                        </div>
                                        <div class="col-xs-4 img-zoom imghover">
                                            <a href="product">
                                                <img src="images/watch1.png" class="img-responsive" alt="Fossil townsman">
                                            </a>
                                        </div>
                                        <div class="col-xs-4 img-zoom imghover">
                                            <a href="product">
                                                <img src="img/WatchM1.png" class="img-responsive" alt="Fossil townsman">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row">
                                        <div class="col-xs-4 img-zoom imghover">
                                            <a href="product">
                                                <img src="img/WatchM2.png" class="img-responsive" alt="Fossil townsman">
                                            </a>
                                        </div>
                                        <div class="col-xs-4 img-zoom imghover">
                                            <a href="product">
                                                <img src="img/WatchM3.png" class="img-responsive" alt="Fossil townsman">
                                            </a>
                                        </div>
                                        <div class="col-xs-4 img-zoom imghover">
                                            <a href="product">
                                                <img src="img/WatchM4.png" class="img-responsive" alt="Fossil townsman">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="#imageCarousel1" title="previous slide" class="carousel-control left" data-slide="prev"
                                   style="background:none !important">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a href="#imageCarousel1" title="next slide" class="carousel-control right" data-slide="next"
                                   style="background:none !important">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="jumbotron" id="abit-abt-us">
                <h1 id="heading">WATCH US</h1>
                <div class="container-fluid">
                    <div class="col-md-4"></div>
                    <h2 id="abtus" class="col-md-4">Watch us as we bring you amazing watches with stunning designs. We try our best at
                        bringing you watches that you will love wearing all the time so that you can always be ONtime</h2>
                    <div class="col-md-4"></div>
                </div>
            </section>
            <?php
            include "footer.inc.php";
            ?>
        </main>
    </body>
</html>