
window.onload = function () {
    checkBoxListener();
};
function checkBoxListener() {
var checkboxListenerPwd = document.getElementById('chkpwd');
var checkboxListenerName = document.getElementById('chkname');
var checkboxListenerEmail = document.getElementById('chke');
var checkboxListenerPno = document.getElementById('chkpno');

checkboxListenerPwd.addEventListener("change", checkedFucntion);
checkboxListenerName.addEventListener("change", checkedFucntion);
checkboxListenerEmail.addEventListener("change", checkedFucntion);
checkboxListenerPno.addEventListener("change", checkedFucntion);
}

function checkedFucntion() {
    //checkbox listener for password
     if(document.getElementById('chkpwd').checked)
     {
        document.getElementById("opwd").disabled = false;
        document.getElementById("npwd1").disabled = false;
        document.getElementById("npwd2").disabled = false;

        document.getElementById("opwd").required = true;
        document.getElementById("npwd1").required = true;
        document.getElementById("npwd2").required = true;
     }
     else{
        document.getElementById("opwd").disabled = true;
        document.getElementById("npwd1").disabled = true;
        document.getElementById("npwd2").disabled = true;

        document.getElementById("opwd").required = false;
        document.getElementById("npwd1").required = false;
        document.getElementById("npwd2").required = false;
     }

    //checkbox listener for name
     if(document.getElementById('chkname').checked)
     {
        document.getElementById("fname").disabled = false;
        document.getElementById("lname").disabled = false;
        
        document.getElementById("fname").required = true;
        document.getElementById("lname").required = true;
     }
     else{
        document.getElementById("fname").disabled = true;
        document.getElementById("lname").disabled = true;
                
        document.getElementById("fname").required = false;
        document.getElementById("lname").required = false;
     }

    //checkbox listener for email
    if(document.getElementById('chke').checked)
    {
        document.getElementById("email").disabled = false;

        document.getElementById("email").required = true;
    }
    else{
        document.getElementById("email").disabled = true;
        
        document.getElementById("email").required = false;
    }

    //checkbox listener for handphone number
    if(document.getElementById('chkpno').checked)
    {
        document.getElementById("pnumber").disabled = false;
        
        document.getElementById("pnumber").required = true;
    }
    else{
        document.getElementById("pnumber").disabled = true;
        
        document.getElementById("pnumber").required = false;
    }
}


function validateProfileEditForm() {
    
    var npwd1 = document.forms["pEditForm"]["npwd1"].value;
    var npwd2 = document.forms["pEditForm"]["npwd2"].value;
    var opwd = document.forms["pEditForm"]["opwd"].value;
    var email = document.forms["pEditForm"]["email"].value;
    var fName = document.forms["pEditForm"]["fname"].value;
    var lName = document.forms["pEditForm"]["lname"].value;
    var pNo = document.forms["pEditForm"]["pnumber"].value;
    var emailR = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var pwdR = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
    var nameR = /^([a-zA-Z]+[,.]?[ ]?|[a-zA-Z]+['-]?)+$/;
    var pNoR = /[0-9]{8}/;

    
    //if none of check boxes checked
    if((document.getElementById('chkname').checked === false) && (document.getElementById('chkpno').checked === false) && (document.getElementById('chkpwd').checked === false) && (document.getElementById('chke').checked === false))
    {           
        alert("Must at least select one field to change");
        return false;
    }

    if (document.getElementById('chkname').checked) 
    {
        if(fName === null || fName === "") {
            alert("Fisrt Name cannot be empty");
            return false;
        }else if (nameR.test(fName) === false){
            alert("Fisrt Name must only contain alphabets");
            return false;
        }else if (lName === null || lName === ""){
            alert("Last Name cannot be empty");
            return false;
        }else if (nameR.test(lName) === false){
            alert("Fisrt Name must only contain alphabets");
            return false;
        }
    }
    
    if (document.getElementById('chkpno').checked) 
    {        
        if(pNo === null || pNo === "") {
            alert("phone number cannot be empty");
            return false;
        }else if(pNoR.test(pNo) === false){
            alert("phone number must only contain numbers");
            return false;
        }
    }
    
    if (document.getElementById('chke').checked) 
    {     
        //email validation
        if (emailR.test(email) === false){
            //no need to do anything if valid
            alert("You have entered an invalid email address!");
            return (false);
        }
    }

    if (document.getElementById('chkpwd').checked) 
    {

        //for password validation
        if (opwd === null || opwd === "" || opwd.length < 3) {
            alert("Old password cannot be null and must be longer than 3 characters");
            return false;
        }else if (pwdR.test(opwd) === false){
            //no need to do anything if valid
            alert("Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit.!");
            return false;
        }else if (npwd1 === null || npwd1 === "" || npwd1.length < 3 ) {
            alert("New password cannot be null and must be longer than 3 characters");
            return false;
        }else if(pwdR.test(npwd1) === false){
            alert("New password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit.!");
            return false;
        }else if(npwd1 !== npwd2){
            alert("Passwords must match");
            return false;
        }else if(opwd === npwd1){
            alert("New password and old password cannot be the same");
            return false;
        }
    } 
}
