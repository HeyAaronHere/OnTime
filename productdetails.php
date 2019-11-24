<?php
//start session
if (!isset($_SESSION)) {
    session_start();
}
// accessing our DB:
include "connection.inc.php";

if (!isset($_POST['product_id']) || empty($_POST['product_id']) || !is_numeric($_POST['product_id'])) {
    $errors[] = 'You must select a product in order to see its details!';
} else {
    $productID = $_POST['product_id'];
}
$IDquery = "SELECT * FROM product WHERE product_id = ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $IDquery)) {
    echo "SQL statement failed";
} else {
    //Bind parameters to the placeholder
    mysqli_stmt_bind_param($stmt, "i", $productID);
    //Run parameters inside database
    mysqli_stmt_execute($stmt);
    $sql = mysqli_stmt_get_result($stmt);
}
if (mysqli_num_rows($sql) > 0) {
    while ($productDetails = mysqli_fetch_assoc($sql)) {
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Product Details - OnTime</title>
        <meta name="description" content="ONtime - Top Seller & Best Quality Services on watches">
        <meta name="keywords" content="Watches, Watch, Strap, Minute, Second, Buying, Selling, Discount, Offer, Fix, Repair, Maintenance, New Arrivals, Gshock, Fossil, Tag Heuer, Fashion, Hand Accessory, Second Hand, Time, Time Keeper, Pocket Watch, Rolex">
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
        include "header.inc.php";
        ?>

        <!-- Bootstrap Carousel  W3school  URL = https://www.w3schools.com/bootstrap/bootstrap_carousel.asp
        all images source from Cocomi.com URL = https://www.cocomi.com/
        how to make a single product ecommerce URL https://www.youtube.com/watch?v=4zGBRBHsgEY Author- Easy Tutorials-->
        <article class="container singleProduct">
            <section class=row>
                <div class="col-md-5">
                    <img src="<?php echo $productDetails['product_img'] ?>" alt="<?php echo $productDetails['product_alt'] ?> "> 
                    <cite><?php echo $productDetails['product_cite']?></cite>
                </div>
                <div class="col-md-7">
                    <p class="new-arrival text-center">NEW</p>
                    <h2><?php echo $productDetails['product_name'] ?></h2>
                    <p><b>Product Code:</b> <?php echo $productDetails['product_code'] ?></p>
                    <p id="price">$<?php echo $productDetails['product_price'] ?></p>
                    <p><b>Availability:</b> <?php echo $productDetails['product_stock'] ?> </p>
                    <p><b>Condition:</b> New </p>
                    <p><b>Brand:</b> <?php echo $productDetails['product_brand'] ?></p>
                    <label for="productinput">Quantity </label>
                    <form id="productdetails" action="process_shoppingcartitem" method="post">
                        <input type="number" id="productinput" min="1" name="productAmount" value="1">
                        <input type="hidden" name="productPrice" value="<?php echo $productDetails['product_price'] ?>">
                        <input type="hidden" name="productID" value="<?php echo $productDetails['product_id'] ?>">
                        <button type="submit" id="btnSubmit" value="Submit">Add to Cart</button>
                    </form>
                </div>
            </section>
            <section class="container productDescription">
                <h3>Product Description</h3>
                <p><?php echo $productDetails['product_desc'] ?></p>
                <p><?php echo $productDetails['product_desc'] ?></p>
                <hr>
            </section>
            <?php
            }

            $sql->free();
            $conn->close();
            }
            ?>
        </article>
        <!-- Bootstrap Carousel  W3school  URL = https://www.w3schools.com/bootstrap/bootstrap_carousel.asp
all images source from Cocomi.com URL = https://www.cocomi.com/
how to make a single product ecommerce URL https://www.youtube.com/watch?v=4zGBRBHsgEY Author= Easy Tutorial (Youtube Channel)-->
        <?php
        include "footer.inc.php";
        ?>
    </body>

</html>