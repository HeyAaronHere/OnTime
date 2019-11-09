window.onload = function () {
    EventListeners();
};
function EventListeners() {
    btnSubmit = document.getElementById("btnSubmit");
    btnSubmit.addEventListener("click", validateform);
}

function validateform() {
    var form = document.getElementById("productdetails");
    var num = document.getElementById("productinput");
    var txtNum = num.value;
    var istxtNumValid = false;
    var isNSPNumValid = false;

    if (txtNum === "") {
        num.style.borderColor = "red";
        alert("Quantity must be filled out");
        return false;

    } else if (!/^[0-9]+$/.test(txtNum)) {
        num.style.borderColor = "red";
        alert("No special characters and alphabets allowed! Numbers only");
        return false;

    } else {
        alert("Submitted Successfully")
        form.submit();

    }
}