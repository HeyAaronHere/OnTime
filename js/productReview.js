window.onload = function () {
  EventListeners();
};
function EventListeners() {
  btnSubmit = document.getElementById("btnSubmit");
  btnSubmit.addEventListener("click", validateform);
}

function validateform() {
  var form = document.getElementById("productreviews");
  var reviews = document.getElementById("reviewinput");
  var txtreviews = reviews.value;


  if (txtreviews === "") {
      reviews.style.borderColor = "red";
      alert("Form must be filled out");
      return false;
  } 
  else {
      alert("Form Submitted Successfully");
      form.submit();
  }
}