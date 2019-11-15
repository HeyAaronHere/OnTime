<!--how to create dynamic tabs with database src -https://www.webslesson.info/2017/03/create-dynamic-tabs-by-using-bootstrap-in-php.html-->
<?php
$connect = mysqli_connect('161.117.122.252', 'p2_7', '7tQeryxcIq', 'p2_7');
$tab_query = "SELECT * FROM category ORDER BY category_id ASC";
$tab_result = mysqli_query($connect, $tab_query);
$tab_menu = '';
$tab_content = '';
$dropdownlist = '';
$i = 0;
while ($row = mysqli_fetch_array($tab_result)) {
    if ($i == 0) {
        $tab_menu .= '
        <li class="active"><a href="#' . $row["category_id"] . '" data-toggle="tab">' . $row["category_name"] . '</a></li>';
        $tab_content .= '
        <div id="' . $row["category_id"] . '" class="tab-pane fade in active">';
        $dropdownlist .= '<option value="' . $row["category_name"] . '">' . $row["category_name"] . '</option>';
    } else {
        $tab_menu .= '
            <li><a href="#' . $row["category_id"] . '" data-toggle="tab">' . $row["category_name"] . '</a></li>';
        $tab_content .= '
            <div id="' . $row["category_id"] . '" class="tab-pane fade">';
        $dropdownlist .= '<option value="' . $row["category_name"] . '">' . $row["category_name"] . '</option>';
    }
    $product_query = "SELECT * FROM product WHERE category_id = '" . $row["category_id"] . "'";
    $product_result = mysqli_query($connect, $product_query);
    while ($sub_row = mysqli_fetch_array($product_result)) {
        $tab_content .= '
            <div class="col-md-2 card " >
                <a href="test.php?id=' . $sub_row['product_id'] . '"><img src="' . $sub_row["product_img"] . '"class="img-responsive img-thumbnail" /></a>
                <h1>' . $sub_row["product_name"] . '</h1>   
                <h4>Click for more info</h4>
                <p class="price">' . $sub_row["product_price"] . '</p>
                <figure class = "overlay-right">
                    <a href = "shoppingcart.php>"<button class = "btn btn-secondary" title = "Add to Cart">
                    <span class = "fa fa-shopping-cart"></span></button></a>
                </figure>
            </div> 
            ';
    }
    $tab_content .= '<div style="clear:both"></div></div>';
    $i++;
}
?>
<!--how to create dynamic tabs with database src -https://www.webslesson.info/2017/03/create-dynamic-tabs-by-using-bootstrap-in-php.html-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Product - ONTime</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/products.css" type="text/css" />
        <link rel="stylesheet" href="css/headerFooter.css" type="text/css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    </head>
    <body>
        <?php
        include "header.php";
        include "sideShoppingCart.php";
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
                            <img src="img/carousel1.jpg" alt="Carousel 1" style="width:100%;">
                            <div class="carousel-caption carouselstyle">
                                <h1>ONTime</h1>
                                <p>Your Friendly Watch Shop!</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="img/carousel2.jpg" alt="Carousel 2" style="width:100%;">
                            <div class="carousel-caption carouselstyle">
                                <h1>Awesome Watches!</h1>
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
        </section>

        <div class="container-fluid">


            <br />
            <ul class="nav nav-tabs">
                <?php
                echo $tab_menu;
                ?>
                <select><?php echo $dropdownlist; ?></select>

            </ul>
            <div class="tab-content">
                <br />


                <?php
                echo $tab_content;
                ?>
            </div>



        </div>
        <hr />

        <?php
        include "footer.php";
        ?>

    </body>
</html>

