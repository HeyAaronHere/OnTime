window.onload = function () {
    document.getElementById("login-submit").addEventListener("click", validateloginform);

    function validateloginform(event) {
        var email = document.forms["LoginForm"]["email"].value;
        var pwd = document.forms["LoginForm"]["pwd"].value;

        if (email === "" || pwd === "") {
            alert("Forms can't be blank");
            event.preventDefault();
            return false;
        } else if (pwd.length < 8) {
            alert("Password must be at least 8 characters long.");
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
        if (rePwd.test(pwd) === false) {
            alert("Password is in invalid format");
            event.preventDefault();
            return false;
        }
    }
};