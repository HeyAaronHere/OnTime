
function validateform() {
    var review = document.forms["productreview"]["review"].value;

      if (review == "") {
        alert("Form must be filled out");
        return false;
      }
      else
        alert("Form Submitted Successfully");
        return false;
    }