window.onload = function () {
    document.getElementById("signup-submit").addEventListener("click", validatesignupform);
    function validatesignupform() {
        var fname = document.forms["RegForm"]["fname"].value;
        var lname = document.forms["RegForm"]["lname"].value;
        var email = document.forms["RegForm"]["email"].value;
        var pwd = document.forms["RegForm"]["pwd"].value;
        var cfmpwd = document.forms["RegForm"]["cfmpwd"].value;

        if (document.getElementById("TaC").checked === false)
        {
            alert("Terms & Conditions box is not checked.");
            event.preventDefault();
            return false;
        }

        if (fname === "" || lname === "" || email === "" || pwd === "" || cfmpwd === "") {
            alert("Forms can't be blank");
            event.preventDefault();
            return false;
        } else if (pwd.length < 8 || cfmpwd.length < 8) {
            alert("Password must be at least 8 characters long.");
            event.preventDefault();
            return false;
        } else if (pwd !== cfmpwd) {
            alert("Password is not the same as the confirmation password.");
            event.preventDefault();
            return false;
        }

        reName = /^([a-zA-Z]+[,.]?[ ]?|[a-zA-Z]+['-]?)+$/;
        if (reName.test(fname) === false || reName.test(lname) === false) {
            alert("Name is in invalid format.");
            event.preventDefault();
            return false;
        }

        reEmail = /[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$/;
        if (reEmail.test(email) === false) {
            alert("Email is in invalid format.");
            event.preventDefault();
            return false;
        }

        rePwd = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
        if (rePwd.test(pwd) === false || rePwd.test(cfmpwd) === false) {
            alert("Password is in invalid format");
            event.preventDefault();
            return false;
        }
    }
};