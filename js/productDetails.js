function validateform() {
    var num = document.forms["productdetails"]["productdetails"].value;

    if (num == "") {
        alert("Quantity must be filled out");
        return false;
      }

    if (!/^[0-9]+$/.test(num)) {
        alert("No special characters and alphabets allowed!");
        return false; 
    }

    else
        alert("Submitted Sucessfully");
    return false;
}