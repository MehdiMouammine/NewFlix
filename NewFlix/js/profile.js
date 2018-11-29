function red(n) {
    $("#movie"+n).css('background-color', '#A30000')
  }
  function normal(n) {
    $("#movie"+n).css('background-color', '#000000')
  }
 function out() {
    $("#out").css('color', 'red')
  }
  function lout() {
    $("#out").css('color', 'white')
  }
  function nam() {
        $("#nn").fadeIn(3000);
        $(".nns").hide();
    }
  function pas() {
        $("#pp").fadeIn(3000);
        $(".pps").hide();
    }
  function emai() {
        $("#ee").fadeIn(3000);
        $(".ees").hide();
    }
var name = document.querySelector('input.nname');
name.oninvalid = function(e) {
  e.target.setCustomValidity("");
  if (!e.target.validity.valid) {
    if (e.target.value.length == 0) {
      e.target.setCustomValidity("This field is required");
    } 
    else {
      e.target.setCustomValidity("Pleas enter a valid name : More than 2 characters");
    }
  }
};
var pass = document.querySelector('input.npass');
pass.oninvalid = function(e) {
  e.target.setCustomValidity("");
  if (!e.target.validity.valid) {
    if (e.target.value.length == 0) {
      e.target.setCustomValidity("This field is required");
    } 
    else {
      e.target.setCustomValidity("Pleas enter a valid password : More than 8 characters");
    }
  }
};
var email = document.querySelector('input.nemail');
email.oninvalid = function(e) {
  e.target.setCustomValidity("");
  if (!e.target.validity.valid) {
    if (e.target.value.length == 0) {
      e.target.setCustomValidity("This field is required");
    } 
    else {
      e.target.setCustomValidity("Pleas enter a valid email");
    }
  }
};