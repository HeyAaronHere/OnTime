<!--how to create dynamic tabs with database src -https://www.webslesson.info/2017/03/create-dynamic-tabs-by-using-bootstrap-in-php.html-->
<?php
//start session
if (!isset($_SESSION)) {
    session_start();
}

include "connection.inc.php";

$tab_query = "SELECT * FROM category ORDER BY category_id ASC";
$tab_result = mysqli_query($conn, $tab_query);
$tab_menu = '';
$tab_content = '';
$i = 0;

while ($row = mysqli_fetch_array($tab_result)) {
    if ($i == 0) {
        $tab_menu .= '
        <li class="active"><a href="#' . $row['category_id'] . '" data-toggle="tab">' . $row['category_name'] . '</a></li>';
        $tab_content .= '
        <div id="' . $row['category_id'] . '" class="tab-pane fade in active">';
    } else {
        $tab_menu .= '
        <li><a href="#' . $row['category_id'] . '" data-toggle="tab">' . $row['category_name'] . '</a></li>';
        $tab_content .= '
            <div id="' . $row['category_id'] . '" class="tab-pane fade">';
    }
    //create prepared statement
    $product_result = $conn->prepare("SELECT * FROM product WHERE category_id = ?");
    $productId = $row['category_id'];
    //Bind parameters to the placeholder
    $product_result->bind_param("i", $productId);
    //Run parameters inside database
    $checkResult = $product_result->execute();
    $getResult = $product_result->get_result();


    while ($sub_row = mysqli_fetch_array($getResult)) {
        $tab_content .= '
            <div class="col-md-2 card " >
                <form method="post" action="productdetails.php">
                    <img src="' . $sub_row['product_img'] . '" alt= "' . $sub_row['product_alt'] . '" class="img-responsive img-thumbnail">
                    <h1>' . $sub_row["product_name"] . '</h1>
                    <input type="hidden" name="product_id" value="' . $sub_row['product_id'] . '"> <!--session variable to transport product id?-->
                    <input type="hidden" name="product_price" value="<' . $sub_row['product_price'] . '">
                    <input type="submit" name="submitbutton" value="click for more info">
                    <p class="price">$' . $sub_row["product_price"] . '</p>
                    
                    <figure class = "overlay-right">
                        <a href="shoppingcart.php" title="Add to Cart">
                        <span class = "fa fa-shopping-cart"></span></a>
                    </figure>
                </form>
            </div>
            ';
    }

    $tab_content .= '<div style="clear:both"></div></div>';
    $i++;
    $getResult->free_result();
    $product_result->close();
}
?>
<!--how to create dynamic tabs with database src -https://www.webslesson.info/2017/03/create-dynamic-tabs-by-using-bootstrap-in-php.html-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product - ONTime</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/products.css" type="text/css">
    <link rel="stylesheet" href="css/headerFooter.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    include "header.inc.php";
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
                <div class="carousel-inner carouselstyle">
                    <div class="item active">
                        <img src="img/carousel1.png" alt="Carousel 1" style="width:100%;">
                        <div class="carousel-caption carouselstyle">
                            <h2>ONTime</h2>
                            <p>Your Friendly Watch Shop!</p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="img/carousel2.png" alt="Carousel 2" style="width:100%;">
                        <div class="carousel-caption carouselstyle">
                            <h2>Awesome Watches!</h2>
                            <p>Check out more about our watches below</p>
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
            <cite>Cocomi.com Men Section Jumbotron, Retrieved October 11, 2019
                from https://i.shgcdn.com/a1b79457-8515-40bc-85c0-f119583abaa6/-/format/auto/-/preview/3000x3000/-/quality/lighter/</cite>
            <br>
            <cite>Cocomi.com Women Section Jumbotron, Retrieved October 11, 2019
                from https://i.shgcdn.com/ae0f7351-ae89-4acf-8051-a1b2bc5b60f8/-/format/auto/-/preview/3000x3000/-/quality/lighter/</cite>
        </div>
    </section>

    <div class="container-fluid">
        <ul class="nav nav-tabs styletab">
            <?php
            echo $tab_menu;
            ?>
        </ul>
        <div class="tab-content">
            <?php
            echo $tab_content;
            ?>
            <br>
            <cite>BERING Classic 10540-567 Blue 40 mm Mens Watch, Retrieved October 10, 2019
                from https://cdn.shopify.com/s/files/1/1712/5149/products/10540-567@2x.jpg?v=1571586623</cite>
            <br>
            <cite>Olivia Burton British Blooms Rose Womens Watch (OB16EG134), Retrieved October 10, 2019
                from https://cdn.shopify.com/s/files/1/1712/5149/products/OB16EG134@2x.jpg?v=1571586947</cite>
        </div>
    </div>
    <hr>

    <?php
    include "footer.inc.php";
    ?>

</body>

</html>