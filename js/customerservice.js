function validateform() {
    var ciname = document.forms["CustomerInquiries"]["CIname"].value;
    var ciemail = document.forms["CustomerInquiries"]["CIemail"].value;
    var cinumber = document.forms["CustomerInquiries"]["CInumber"].value;
    var ciquestion = document.forms["CustomerInquiries"]["CIquestion"].value;

    if (ciname == "") {
      alert("Username must be filled out");
      return false;
    }

    if (ciname != /[^a-zA-Z\-\/]/) {
        alert("No special characters allowed!");
      return false;
    }

    if (ciemail == "") {
        alert("Username must be filled out");
        return false;
      }

      if (cinumber == "") {
        alert("Username must be filled out");
        return false;
      }
  
      if (cinumber != /[^0-9\-\/]/) {
          alert("No special characters and alphabets allowed!");
        return false;
      }

      if (ciquestion == "") {
        alert("Username must be filled out");
        return false;
      }

  }