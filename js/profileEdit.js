
window.onload = function () {
    checkBoxListener();
};
function checkBoxListener() {
var checkboxListenerPwd = document.getElementById('chkpwd');
var checkboxListenerName = document.getElementById('chkname');
var checkboxListenerEmail = document.getElementById('chke');
var checkboxListenerPno = document.getElementById('chkpno');
var peSubmitBtnListener = document.getElementById("peSubmitBtn")

checkboxListenerPwd.addEventListener("change", checkedFucntion);
checkboxListenerName.addEventListener("change", checkedFucntion);
checkboxListenerEmail.addEventListener("change", checkedFucntion);
checkboxListenerPno.addEventListener("change", checkedFucntion);
peSubmitBtnListener.addEventListener("click", validateProfileEditForm);
}

function checkedFucntion() {
    //checkbox listener for password
     if(document.getElementById('chkpwd').checked)
     {
        document.getElementById("opwd").disabled = false;
        
        document.getElementById("opwd").removeAttribute('disabled');
        document.getElementById("npwd1").removeAttribute('disabled');
        document.getElementById("npwd2").removeAttribute('disabled');

        document.getElementById("opwd").setAttribute('required', 'required');
        document.getElementById("npwd1").setAttribute('required', 'required');
        document.getElementById("npwd2").setAttribute('required', 'required');
     }
     else{
        document.getElementById("opwd").setAttribute('disabled', 'disabled');
        document.getElementById("npwd1").setAttribute('disabled', 'disabled');
        document.getElementById("npwd2").setAttribute('disabled', 'disabled');

        document.getElementById("opwd").removeAttribute('required');
        document.getElementById("npwd1").removeAttribute('required');
        document.getElementById("npwd2").removeAttribute('required');
     }

    //checkbox listener for name
     if(document.getElementById('chkname').checked)
     {
        document.getElementById("fname").removeAttribute('disabled');
        document.getElementById("lname").removeAttribute('disabled');
        
        document.getElementById("fname").setAttribute('required', 'required');
        document.getElementById("lname").setAttribute('required', 'required');
     }
     else{
        document.getElementById("fname").setAttribute('disabled', 'disabled');
        document.getElementById("lname").setAttribute('disabled', 'disabled');
                
        document.getElementById("fname").removeAttribute('required');
        document.getElementById("lname").removeAttribute('required');
     }

    //checkbox listener for email
    if(document.getElementById('chke').checked)
    {
        document.getElementById("email").removeAttribute('disabled');

        document.getElementById("email").setAttribute('required', 'required');
    }
    else{
        document.getElementById("email").setAttribute('disabled', 'disabled');
        
        document.getElementById("email").removeAttribute('required');
    }

    //checkbox listener for handphone number
    if(document.getElementById('chkpno').checked)
    {
        document.getElementById("pnumber").removeAttribute('disabled');
        
        document.getElementById("pnumber").setAttribute('required', 'required');
    }
    else{
        document.getElementById("pnumber").setAttribute('disabled', 'disabled');
        
        document.getElementById("pnumber").removeAttribute('required');
    }
}


function validateProfileEditForm(event1) {
    
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
        event1.preventDefault();
        return false;
    }

    if (document.getElementById('chkname').checked) 
    {
        if(fName === null || fName === "") {
            alert("Fisrt Name cannot be empty");
            event1.preventDefault();
            return false;
        }else if (nameR.test(fName) === false){
            alert("Fisrt Name must only contain alphabets");
            event1.preventDefault();
            return false;
        }else if (lName === null || lName === ""){
            alert("Last Name cannot be empty");
            event1.preventDefault();
            return false;
        }else if (nameR.test(lName) === false){
            alert("Fisrt Name must only contain alphabets");
            event1.preventDefault();
            return false;
        }
    }
    
    if (document.getElementById('chkpno').checked) 
    {        
        if(pNo === null || pNo === "") {
            alert("phone number cannot be empty");
            event1.preventDefault();
            return false;
        }else if(pNoR.test(pNo) === false){
            alert("phone number must only contain numbers");
            event1.preventDefault();
            return false;
        }
    }
    
    if (document.getElementById('chke').checked) 
    {     
        //email validation
        if (emailR.test(email) === false){
            //no need to do anything if valid
            alert("You have entered an invalid email address!");
            event1.preventDefault();
            return (false);
        }
    }

    if (document.getElementById('chkpwd').checked) 
    {

        //for password validation
        if (opwd === null || opwd === "" || opwd.length < 3) {
            alert("Old password cannot be null and must be longer than 3 characters");
            event1.preventDefault();
            return false;
        }else if (pwdR.test(opwd) === false){
            //no need to do anything if valid
            alert("Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit.!");
            event1.preventDefault();
            return false;
        }else if (npwd1 === null || npwd1 === "" || npwd1.length < 3 ) {
            alert("New password cannot be null and must be longer than 3 characters");
            event1.preventDefault();
            return false;
        }else if(pwdR.test(npwd1) === false){
            alert("New password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit.!");
            event1.preventDefault();
            return false;
        }else if(npwd1 !== npwd2){
            alert("Passwords must match");
            event1.preventDefault();
            return false;
        }else if(opwd === npwd1){
            alert("New password and old password cannot be the same");
            event1.preventDefault();
            return false;
        }
    } 
}
