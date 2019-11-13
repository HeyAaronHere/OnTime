window.onload = function () {
    EventListeners();
};
function EventListeners() {
    btnSubmit = document.getElementById("btnSubmit");
    btnSubmit.addEventListener("click", validateform);
}


function chkNameSyntax(name) { //this is to check whether syntax of name is correct format or not
    return /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/.test(name);
}

function chkEmailSyntax(email) { //this is to check whether syntax of email is correct format or not
    return /\S+@\S+\.\S+/.test(email);
}

function validateform() {
    var form = document.getElementById("productreviews");
    var email = document.getElementById("email");
    var txtEmail = email.value;
    var isEmailValid = false;
    var name = document.getElementById("name");
    var txtName = name.value;
    var isNameValid = false;
    var reviews = document.getElementById("reviewinput");
    var txtreviews = reviews.value;
    var isReviewsValid = false;

    if (txtName === "") {
        name.style.borderColor = "red";
        name.setCustomValidity("This is a required field!");
        isNameValid = false;
    } else {
        if (!chkNameSyntax(txtName)) {
            name.setCustomValidity("Please enter a proper first name!");
            isNameValid = false;
        } else {
            name.style.borderColor = "green";
            name.setCustomValidity("");
            nameValid = true;
        }
    }

    if (txtEmail === "") {
        email.style.borderColor = "red";
        email.setCustomValidity("This is a required field!");
        isEmailValid = false;
    } else {
        if (!chkEmailSyntax(txtEmail)) {
            email.style.borderColor = "red";
            email.setCustomValidity("Please enter a proper email!");
            isEmailValid = false;
        } else {
            email.style.borderColor = "green";
            email.setCustomValidity("");
            isEmailValid = true;
        }
    }

    if (txtreviews === "") {
        reviews.style.borderColor = "red";
        reviews.setCustomValidity("Form must be filled out");
        isReviewsValid = false;
    } else {
        reviews.style.borderColor = "green";
        reviews.setCustomValidity("");
        isReviewsValid = true;
    }

    if (isNameValid && isEmailValid && isReviewsValid)
    {
        alert("Form Submitted Successfully!");
        form.submit();
    }
}

