//js file for aboutUs.php
$(document).ready(function(){
  $("#yeesiangstext").hide();
  $("#aaronstext").hide();
  $("#danielstext").hide();
  $("#nikolastext").hide();

  $("#yeesiangs").click(function(){
    $("#yeesiangstext").toggle();
  });
  $("#aarons").click(function(){
    $("#aaronstext").toggle();
  });
  $("#daniels").click(function(){
    $("#danielstext").toggle();
  });
  $("#nikolas").click(function(){
    $("#nikolastext").toggle();
  });
});
