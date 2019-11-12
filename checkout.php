<html>

<head>
    <title>Shopping Cart - OnTime</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ONtime - Top Seller & Best Quality Services on watches">
    <meta name="keywords"
        content="Watches, Watch, Strap, Minute, Second, Buying, Selling, Discount, Offer, Fix, Repair, Maintenance, New Arrivals, Gshock, Fossil, Tag Heuer, Fashion, Hand Accessory, Second Hand, Time, Time Keeper, Pocket Watch, Rolex">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css\headerFooter.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/shoppingcart.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <?php
        include "header.php";
    ?>

    <section class="container">

        <header class="page-header">
            <h1>Thank you for your purchase at ONtime.</h1>
        </header>

        <p>You will receive further updates regarding your order via email.</p>
        <p>We'd like to provide the best service to you. Feel free to <a href="customerservice.html">contact us</a>
            if you have any questions.</p>

        <h2>Your order at a glance</h2>
        <table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tr>
                <td><a href="ProductDetails.html" target="_blank">Watch1</a></td>
                <td>1</td>
                <td>40 SGD</td>
            </tr>
            <tr>
                <td><a href="ProductDetails.html" target="_blank">Watch2</a></td>
                <td>2</td>
                <td>80 SGD</td>
            </tr>
            <tfoot>
                <tr class="tfooter">
                    <td></td>
                    <td id="pricetotal">Price total: </td>
                    <td id="amounttotal">120 SGD</td>
                </tr>
            </tfoot>
        </table>
        <button type="button" class="btn btn-info btn-sm">
            <a href="index.html">
                Back to the main page
            </a>
        </button>
        <br>
    </section>

    <?php
        include "footer.php";
    ?>

</body>

</html>
