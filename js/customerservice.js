window.onload = function () {
    document.getElementById("CI-submit").addEventListener("click", validateCIform);
    function validateCIform() {
        var ciname = document.forms["CustomerInquiries"]["CIname"].value;
        var ciemail = document.forms["CustomerInquiries"]["CIemail"].value;
        var cinumber = document.forms["CustomerInquiries"]["CInumber"].value;
        var ciquestion = document.forms["CustomerInquiries"]["CIquestion"].value;

        if (ciname === "" || ciemail === "" || cinumber === "" || ciquestion === "") {
            alert("All fields must be filled out");
            event.preventDefault();
            return false;
        }

        reName = /^([a-zA-Z]+[,.]?[ ]?|[a-zA-Z]+['-]?)+$/;
        if (reName.test(ciname) === false) {
            alert("Name is in invalid format.");
            event.preventDefault();
            return false;
        }

        reNumber = /[0-9]{8,8}/;
        if (reNumber.test(cinumber) === false) {
            alert("Phone number is in invalid format.");
            event.preventDefault();
            return false;
        }
    }
};