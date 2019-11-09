function validateform() {
    var username = document.forms["Login"]["Username"].value;
    var password = document.forms["Login"]["Password"].value;
    var createusername = document.forms["CreateAcc"]["CreateUsername"].value;
    var createpassword = document.forms["CreateAcc"]["CreatePassword"].value;
    var cfmpassword = document.forms["CreateAcc"]["CfmPassword"].value;

    if (username == "") {
      alert("Username must be filled out");
      return false;
    }

    if (username != /[^a-zA-Z0-9\-\/]/) {
        alert("No special characters allowed!");
      return false;
    }

    if (password == "") {
        alert("Password must be filled out");
        return false;
    }

    if (password != /[^a-zA-Z0-9\-\/]/) {
        alert("No special characters allowed!");
        return false;
    }

    if (createusername == "") {
        alert("Username must be filled out");
        return false;
      }
  
      if (createusername != /[^a-zA-Z0-9\-\/]/) {
          alert("No special characters allowed!");
        return false;
      }
  
      if (createpassword == "") {
          alert("Password must be filled out");
          return false;
      }
  
      if (createpassword != /[^a-zA-Z0-9\-\/]/) {
          alert("No special characters allowed!");
          return false;
      }

      if (cfmpassword == "") {
        alert("Password must be filled out");
        return false;
    }

    if (cfmpassword != /[^a-zA-Z0-9\-\/]/) {
        alert("No special characters allowed!");
        return false;
    }

    if (createpassword != cfmpassword) {
        alert("Password and Confirm Password are not the same");
        return false;
    }

  }