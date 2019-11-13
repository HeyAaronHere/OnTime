
//show cart on all pages -> linked to header?

//cart-info refers to id of button in navbar

$("#cart-info").click(function(){
    $("#cart").show();
});

$(".close").click(function(){
    $("#cart").hide();
});

//if close is clicked, hide shopping cart
