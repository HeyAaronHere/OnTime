
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
  var onlyLetters = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
  //var onlyLetters = /^([a-zA-Z]+[,.]?[ ]?|[a-zA-Z]+['-]?)+$/;
  //onlyLetters.test(fname);
  if (fname === "") {
    alert("First Name must be filled out");
    e.preventDefault();
    return false;
  }else if (!onlyLetters.test(fname)) {
    alert("First Name must contain only letters and whitespace.");
    e.preventDefault();
    return false;
  }

  var lname = document.forms["orderform"]["lname"].value;
  if (lname === "") {
    alert("Last Name must be filled out");
    e.preventDefault();
    return false;
  }else if (!onlyLetters.test(lname)) {
    alert("Last Name must contain only letters and whitespace.");
    e.preventDefault();
    return false;
  }

  //Email Address must be valid
  var email = document.forms["orderform"]["email"].value;
  var properForm = /\S+@\S+\.\S+/;
  properForm.test(email);
  if (email === "") {
    alert("Email must be filled out");
    e.preventDefault();
    return false;
  }else if(!properForm.test(email)){
      alert("Please enter a valid email address");
      e.preventDefault();
      return false;
  }

  //phone number must be validate
  var phone = document.forms["orderform"]["phone"].value;
  var properPhone = /^[0-9]*$/;
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
  var onlyLetters = /^[0-9a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])+[0-9]*$/;
  onlyLetters.test(street);
  if (street === "") {
    alert("Street must be filled out");
    e.preventDefault();
    return false;
  }else if (!onlyLetters.test(street)) {
    alert("Street must contain only letters, whitespaces, and numbers.");
    e.preventDefault();
    return false;
  }

  //Country Code must be filled out
  var countrycode = document.forms["orderform"]["countrycode"].value;
  var onlyNumbers = /^[A-Z]*$/;
  if (countrycode == "") {
    alert("Country Code must be filled out");
    e.preventDefault();
    return false;
  }else if (!onlyNumbers.test(countrycode)){
    alert("Country Code must contain only numbers.");
  }

  //Country must be filled out (and valid?)
  var country = document.forms["orderform"]["country"].value;
  var onlyLetters = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
  onlyLetters.test(country);
  if (fname === "") {
    alert("Country must be filled out");
    e.preventDefault();
    return false;
  }else if (!onlyLetters.test(country)) {
    alert("Country must contain only letters and whitespaces.");
    e.preventDefault();
    return false;
  }

  //if card payment checked:
  if (document.getElementById("cashradio").checked = true) {

    //Name on Card filled out
    var cardname = document.forms["orderform"]["cardname"].value;
    if (cardname == "") {
      alert("Name on Card must be filled out");
      e.preventDefault();
      return false;
    }

    //Card number must have 16 digits
    var cardnumber = document.forms["orderform"]["cardnumber"].value;
    var onlyNumbers = /^[0-9]{16}*$/;
    if (cardnumber == "") {
      alert("Card Number must be filled out");
      e.preventDefault();
      return false;
    }else if (!onlyNumbers.test(cardnumber)){
      alert("Card Number must contain exactly 16 digits.");
    }else{
    return true;
    }

    //CVV must have 3 digits
    var cvv = document.forms["orderform"]["cvv"].value;
    var onlyNumbers = /^[0-9]{3}*$/;
    if (cvv == "") {
      alert("CVV must be filled out");
      e.preventDefault();
      return false;
    }else if (!onlyNumbers.test(cvv)){
      alert("CVV must contain exactly 3 digits.");
    }else{
    return true;
    }
  }
}
});
