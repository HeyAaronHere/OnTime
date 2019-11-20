
$(document).ready(function(){
  $('#cardpayment').hide();

  $('#card').click(function() {
    $('#cardpayment').slideDown();
  });

  $('#cash').click(function() {
    $('#cardpayment').slideUp();
  });



var x = document.getElementById("orderform");
x.addEventListener("submit", validateForm);

function validateForm(e) {
  //first name must be filled out
  var fname = document.forms["orderform"]["fname"].value;
  var properName = /[^A-Za-z\s-]/;
  //var onlyLetters = /^([a-zA-Z]+[,.]?[ ]?|[a-zA-Z]+['-]?)+$/;
  //onlyLetters.test(fname);
  if (fname === "") {
    alert("First Name must be filled out");
    e.preventDefault();
    return false;
  }else if (properName.test(fname)) {
    alert("First Name must contain only letters, whitespaces and dashes.");
    e.preventDefault();
    return false;
  }

  var lname = document.forms["orderform"]["lname"].value;
  if (lname === "") {
    alert("Last Name must be filled out");
    e.preventDefault();
    return false;
  }else if (properName.test(lname)) {
    alert("Last Name must contain only letters, dashes and whitespaces.");
    e.preventDefault();
    return false;
  }

  //Email Address must be valid
  var email = document.forms["orderform"]["email"].value;
  var properEmail = /^\S+@\S+\.\S{2,3}$/;
  if (email === "") {
    alert("Email must be filled out");
    e.preventDefault();
    return false;
  }else if(!properEmail.test(email)){
      alert("Please enter a valid email address");
      e.preventDefault();
      return false;
  }

  //phone number must be validate
  var phone = document.forms["orderform"]["phone"].value;
  var properPhone = /^[0-9]{8,13}$/;
  if (phone === "") {
    alert("Phone number must be filled out");
    e.preventDefault();
    return false;
  }else if (!properPhone.test(phone)) {
    alert("Phone number must contain only numbers");
    e.preventDefault();
    return false;
  }

  //Street must be filled out
  var street = document.forms["orderform"]["street"].value;
  var properStreet = /[^A-Za-z\s0-9-]/;
  if (street === "") {
    alert("Street must be filled out");
    e.preventDefault();
    return false;
  }else if (properStreet.test(street)) {
    alert("Street must contain only letters, whitespaces, and numbers.");
    e.preventDefault();
    return false;
  }

  //Appartment must be filled out
  var appartment = document.forms["orderform"]["appartment"].value;
  var properAppartment = /^\d{2}[-]\d{2,3}$/;
  if (countrycode == "") {
    alert("Appartment must be filled out");
    e.preventDefault();
    return false;
  }else if (!properAppartment.test(appartment)){
    alert("Appartment must be in this format: ss-nn or ss-nnn");
    e.preventDefault();
    return false;
  }

  //Country Code must be filled out
  var countrycode = document.forms["orderform"]["countrycode"].value;
  var properCountry = /^[A-Z]{2}$/;
  if (countrycode == "") {
    alert("Country Code must be filled out");
    e.preventDefault();
    return false;
  }else if (!properCountry.test(countrycode)){
    alert("Country Code must contain of two capital letters.");
    e.preventDefault();
    return false;
  }

  //Postal Code must be filled out (and valid?)
  var postalcode = document.forms["orderform"]["postalcode"].value;
  var properPost = /^\d{4,10}$/;
  if (postalcode === "") {
    alert("Postal Code must be filled out");
    e.preventDefault();
    return false;
  }else if (!properPost.test(postalcode)) {
    alert("Postal Code must contain only 4-10 numbers.");
    e.preventDefault();
    return false;
  }

  var city = document.forms["orderform"]["city"].value;
  if (city === "") {
    alert("City must be filled out");
    e.preventDefault();
    return false;
  }else if (properName.test(city)) {
    alert("City must contain only letters, dashes and whitespaces.");
    e.preventDefault();
    return false;
  }

  //if payment checked and if card payment checked
  if(!document.getElementById("card").checked && !document.getElementById("cash").checked){
    alert("Payment Method must be selected.");
    e.preventDefault();
    return false;
  }else if (document.getElementById("card").checked) {
    //Name on Card filled out
    var cardname = document.forms["orderform"]["cardname"].value;
    if (cardname == "") {
      alert("Name on Card must be filled out");
      e.preventDefault();
      return false;
    }else if (properName.test(cardname)){
      alert("Card Name must contain only letters, dashes and whitespaces.");
      e.preventDefault();
      return false;
    }

    //Card number must have 16 digits
    var cardnumber = document.forms["orderform"]["cardnumber"].value;
    var onlyNumbers = /^[0-9]{16}$/;
    if (cardnumber == "") {
      alert("Card Number must be filled out");
      e.preventDefault();
      return false;
    }else if (!onlyNumbers.test(cardnumber)){
      alert("Card Number must contain exactly 16 digits.");
      e.preventDefault();
      return false;
    }

    //expiry date must have mm-yy format
    var expdate = document.forms["orderform"]["expdate"].value;
    var properExpDate = /^([1][0-2]|[0][1-9])[-]\d{2}$/;
    if (expdate == "") {
      alert("Expiry Date must be filled out");
      e.preventDefault();
      return false;
    }else if (!properExpDate.test(expdate)){
      alert("Expiry Date must be in this format: mm-yy.");
      e.preventDefault();
      return false;
    }

    //CVV must have 3 digits
    var cvv = document.forms["orderform"]["cvv"].value;
    var onlyNumbers = /^[0-9]{3}$/;
    if (cvv == "") {
      alert("CVV must be filled out");
      e.preventDefault();
      return false;
    }else if (!onlyNumbers.test(cvv)){
      alert("CVV must contain exactly 3 digits.");
      e.preventDefault();
      return false;
    }
  }
}
});
