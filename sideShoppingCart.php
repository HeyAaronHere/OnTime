<!--included on all pages to show side shoppingcart-->
<link href="css/shoppingcart.css" rel="stylesheet" type="text/css">
<section id="cart" class="cart">
<span id="close" class="glyphicon glyphicon-remove close" aria-label="close shopping cart"></span>
<h2>Your Shopping Cart</h2>
<table class="table table-striped table-responsive">
    <thead>
        <tr>
            <th>Quantity</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
    </thead>
    <tr>
        <td id="qty">1</td>
        <td>Watch 1</td>
        <td>40 SGD</td>
    </tr>
    <tfoot>
        <td></td>
        <td id="pricetotal">Total</td>
        <td id="amounttotal">40 SGD</td>
    </tfoot>
</table>
<button type="button" class="btn btn-danger btn-sm">Clear Shopping Cart</button>
<button type="button" class="btn btn-success btn-sm"><a href="shoppingcart.php">Proceed to Checkout</a></button>

</section>
