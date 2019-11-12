<!DOCTYPE html>
<html>

<head>
    <title>Shopping Cart - OnTime</title>
    <meta name="description" content="ONtime - Top Seller & Best Quality Services on watches">
    <meta name="keywords"
        content="Watches, Watch, Strap, Minute, Second, Buying, Selling, Discount, Offer, Fix, Repair, Maintenance, New Arrivals, Gshock, Fossil, Tag Heuer, Fashion, Hand Accessory, Second Hand, Time, Time Keeper, Pocket Watch, Rolex">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/shoppingcart.css">
    <link rel="stylesheet" href="css/headerFooter.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        crossorigin="anonymous"></script>
        <script defer src="js/shoppingcartcheck.js"></script>
</head>

<body>
    <section class="container">

        <?php
            include "header.php";
        ?>

        <header class="page-header">
            <h1>Your shopping cart at ONtime</h1>
        </header>
        <section class="row">
            <div class="col-md-12">
                <h2>Your Shopping Cart contains:</h2>
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price/piece</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tr>
                        <td><a href="ProductDetails.html" target="_blank">Watch1</a></td>
                        <td>1</td>
                        <td>40 SGD</td>
                        <td>40 SGD</td>
                        <td><button type="button" class="btn btn-danger btn-sm">Remove</button></td>
                        <!--will remove one item from the shopping cart-->
                    </tr>
                    <tr>
                        <td><a href="ProductDetails.html" target="_blank">Watch2</a></td>
                        <td>2</td>
                        <td>40 SGD</td>
                        <td>80 SGD</td>
                        <td><button type="button" class="btn btn-danger btn-sm">Remove</button></td>
                        <!--will remove one item from the shopping cart-->
                    </tr>
                    <tfoot>
                        <tr class="tfooter">
                            <td></td>
                            <td></td>
                            <td id="pricetotal">Price total: </td>
                            <td id="amounttotal">120 SGD</td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>

        <section class="well well-sm row">
            <!--change form -> only one form for everything!-->
            <form id="orderform" action="checkout.php" method="post">
                <h2>Delivery Address</h2>
                <section class="form-group row">
                    <div class="col-sm-4">
                        <label for="fullname">Full Name</label>
                        <input class="form-control" id="fname" type="text" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="email">Email Address</label>
                        <input class="form-control" id="email" type="email" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="phonenumber">Phone number</label>
                        <input class="form-control" id="phone" type="tel" required>
                    </div>
                </section>
                <section class="form-group row">
                    <div class="col-sm-4">
                        <label for="street">Street</label>
                        <input class="form-control" id="street" type="text" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="countrycode">Country Code</label>
                        <input class="form-control" id="countrycode" type="text" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="country">Country</label>
                        <input class="form-control" id="country" type="text" required>
                    </div>
                </section>
                <h2>Select Payment Type</h2>
                <input type="radio" name="payment-type" value="Cash" checked> Cash (Note: Cash must have the exact
                change!)<br>
                <input id="cashradio" type="radio" name="payment-type" value="Credit/DebitCard"> Credit/Debit Card
                <section class="form-group row">
                    <div class="col-sm-4">
                        <label for="cardname">Name on Card</label>
                        <input class="form-control" id="cardname" type="text" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="cardnumber">Card Number</label>
                        <input class="form-control" id="cardnumber" type="text" required>
                    </div>
                    <div class="col-sm-2">
                        <label for="expirydate">Expiry Data</label>
                        <input class="form-control" id="expdate" type="text" required>
                    </div>
                    <div class="col-sm-2">
                        <label for="cvv">cvv</label>
                        <input class="form-control" id="cvv" type="text" required>
                    </div>
                </section>
                <div id="checkoutbutton">
                    <button id="submitbutton" type="submit" class="btn btn-success btn-lg" onclick="validateForm()">
                        Purchase <span class="glyphicon glyphicon-arrow-right"></span></a>
                    </button>
                </div>
            </form>
        </section>


    </section>
    <br>

    <?php
        include "footer.php";
    ?>

</body>

</html>
