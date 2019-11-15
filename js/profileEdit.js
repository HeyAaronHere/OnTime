
function validateProfileEditForm() {
    
    var npwd1 = document.forms["pEditForm"]["npwd1"].value;
    var npwd2 = document.forms["pEditForm"]["npwd2"].value;
    var opwd = document.forms["pEditForm"]["opwd"].value;
    var email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var pwdR = /^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/;
    var e = document.forms["pEditForm"]["email"].value;

    

if (document.getElementById('xxx').checked) 
{
    document.getElementById('totalCost').value = 10;
} else {
    calculate();
}
//chkname
//chkpno
//chke
//chkpwd

if(!empty($_POST['chkname'])) { 
    
    
     //email validation
    if (e.match(email) === null)
    {
        //no need to do anything if valid
        alert("You have entered an invalid email address!")
        return (false);
    }
    
    //password vallidation using regex
    if(npwd1.match(pwdR) === null)
    {
        //no need to do anything if valid
        alert("Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit.")
        return (false);
    }
    
    //for password validation
    if (npwd1 === null || pwd1 === "" || pwd1.length < 3) {
        alert("Passwords cannot be null and must be longer than 3 characters");
        return (false);
    }
    else if(npwd1 !== npwd2){
        alert("Passwords must match");
        return (false);
    }


}

