<?php

//start session
if (!isset($_SESSION)) {
                session_start();
}

//Constants for accessing our DB:
define("DBHOST", "161.117.122.252");
define("DBNAME", "p2_7");
define("DBUSER", "p2_7");
define("DBPASS", "7tQeryxcIq");
$email = $pwd = $fname = "";
$errorMsg = "";
$success = true;

if (!isset($_GET['id']) || empty($_GET['id']) || !is_numeric($_GET['id'])) {
    $errors[] = 'You must select a product in order to see its details!';
} else {
    $productId = $_GET['id'];
}
//$id = isset($_GET['product_id']) ? (int) $_GET['product_id'] : 0;
// if(isset( $_GET['product_id'])) $id = $_GET['product_id'];
//else echo " no product id";
$IDquery = "SELECT * FROM product WHERE product_id = " . $productId;
$sql = mysqli_query($connect, $IDquery);
if (mysqli_num_rows($sql) > 0) {
    while ($productDetails = mysqli_fetch_assoc($sql)) {
        ?>


        <!DOCTYPE html>
        <!--
        To change this license header, choose License Headers in Project Properties.
        To change this template file, choose Tools | Templates
        and open the template in the editor.
        -->
        <html>

            <head>
                <title>Product Details - OnTime</title>
                <meta name="description" content="ONtime - Top Seller & Best Quality Services on watches">
                <meta name="keywords"
                      content="Watches, Watch, Strap, Minute, Second, Buying, Selling, Discount, Offer, Fix, Repair, Maintenance, New Arrivals, Gshock, Fossil, Tag Heuer, Fashion, Hand Accessory, Second Hand, Time, Time Keeper, Pocket Watch, Rolex">
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="css/productDetails.css" rel="stylesheet" type="text/css">
                <link href="css/headerFooter.css" rel="stylesheet" type="text/css">
        <!--        <script src="js/productDetails.js"></script>  -->
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
                //include "sideShoppingCart.php";
                ?>

                <!-- Bootstrap Carousel  W3school  URL = https://www.w3schools.com/bootstrap/bootstrap_carousel.asp
                    all images source from Cocomi.com URL = https://www.cocomi.com/
                    how to make a single product ecommerce URL https://www.youtube.com/watch?v=4zGBRBHsgEY Author- Easy Tutorials-->

                <article class="singleProduct">
                    <section class="container">
                        <section class=row>
                            <div class = "col-md-5">
                                <img src = "<?php echo $productDetails['product_img'] ?>">
                            </div>

                            <div class = "col-md-7">
                                <p class = "new-arrival text-center">NEW</p>
                                <h2><?php echo $productDetails['product_name'] ?></h2>
                                <p><b>Product Code:</b> <?php echo $productDetails['product_code'] ?></p>
                                <p id="price"><?php echo $productDetails['product_price'] ?></p>
                                <p><b>Availability:</b> <?php echo $productDetails['product_stock'] ?> </p>
                                <p><b>Condition:</b> New </p>
                                <p><b>Brand:</b> <?php echo $productDetails['product_brand'] ?></p>

                                <label for="productdetails">Quantity </label>
                                <form id="productdetails" action="process_shoppingcartitem.php" method="post"> <!-- action="productdetails.php" method="post"-->
                                    <input type ="number" id="productinput" name="productinput" value="1">
                                    <input type="hidden" name="productID" value="<?php echo $productDetails["product_id"]; ?>">
                                    <button type="submit" id="btnSubmit" value="Submit">Add to Cart</button>
                                </form>

                            </div>

                        </section>
                    </section>

                    <section class="productDescription">
                        <section class="container">
                            <h3>Product Description</h3>
                            <p><?php echo $productDetails['product_desc'] ?></p>

                            <p>This is the Product Description . This is the Product Description .This is the Product
                                Description This is the Product Description
                                This is the Product Description This is the Product Description This is the Product
                                Description This is the Product Description.This is the Product
                                Description </p>

                            <hr />
                        </section>
                    </section>
                    <?php
                }
            }
            ?>
        </article>

        <!-- Bootstrap Carousel  W3school  URL = https://www.w3schools.com/bootstrap/bootstrap_carousel.asp
            all images source from Cocomi.com URL = https://www.cocomi.com/
            how to make a single product ecommerce URL https://www.youtube.com/watch?v=4zGBRBHsgEY Author= Easy Tutorial (Youtube Channel)-->

        <?php
        include "footer.php";
        ?>
    </body>
</html>
