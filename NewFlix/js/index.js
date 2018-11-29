function change() {
		$("#logo").hide();
		$("#butts").hide();
		$("#login").fadeIn(3000);
	}
function unchange() {
        $("#logo").fadeIn(3000);
        $("#butts").fadeIn(3000);
        $("#login").hide();
    }
function change2() {
        $("#login").hide();
        $("#signup").fadeIn(3000);
    }
function unchange2() {
        $("#login").fadeIn(3000);
        $("#signup").hide();
    }
var pass = document.querySelector('input.npass');
pass.oninvalid = function(e) {
  e.target.setCustomValidity("");
  if (!e.target.validity.valid) {
    if (e.target.value.length == 0) {
      e.target.setCustomValidity("This field is required");
    } 
    else {
      e.target.setCustomValidity("Password is at least 8 characteres");
    }
  }
};
var fname = document.querySelector('input.nname');
fname.oninvalid = function(e) {
  e.target.setCustomValidity("");
  if (!e.target.validity.valid) {
    if (e.target.value.length == 0) {
      e.target.setCustomValidity("This field is required");
    } 
    else {
      e.target.setCustomValidity("Pleas enter a valid name");
    }
  }
};
var email = document.querySelector('input.nEmail');
email.oninvalid = function(e) {
  e.target.setCustomValidity("");
  if (!e.target.validity.valid) {
    if (e.target.value.length == 0) {
      e.target.setCustomValidity("This field is required");
    } 
    else {
      e.target.setCustomValidity("Pleas enter a valid email : XXXX@XXXXX.XX");
    }
  }
};
$(document).ready(function(){
    $("#butlo").click(function(){
        var usn = $("#Email").val();
        var pass = $("#pass").val();
        $.post("php/login.php",
        {
          Email: usn,
          Pass: pass
        },
        function(data,status){
            if (data == "0") {
            $("#wrpa").slideUp(1000);$("#wrus").slideDown(1000);
            }
            if (data == "1") {
            $("#wrus").slideUp(1000);$("#wrpa").slideDown(1000);
            }
            if (data == "2") {
            location.href = 'php/home.php';
            }
            if (data == "3") {
            location.href = 'php/admin.php';
            }
        });

    });
    $("#butsi").click(function(){
        var usn = $("#nEmail").val();
        var pass = $("#npass").val();
        var name = $("#nname").val();
        if (!/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/.test(usn)){
          $("#suc").slideUp(1000);$("#war").slideUp(1000);$("#war2").slideUp(1000);$("#war3").slideUp(1000);$("#war1").slideDown(1000);
          go =0;
        }
        else if (!/.{8,20}/.test(pass)){
          $("#suc").slideUp(1000);$("#war").slideUp(1000);$("#war1").slideUp(1000);$("#war3").slideUp(1000);$("#war2").slideDown(1000);
          go =0;
        }
        else if (!/.{2,20}/.test(name)){
          $("#suc").slideUp(1000);$("#war").slideUp(1000);$("#war2").slideUp(1000);$("#war1").slideUp(1000);$("#war3").slideDown(1000);
          go =0;
        }
        else {
          $.post("php/signup.php",
        {
          Email: usn,
          Pass: pass,
          Name: name
        },
        function(data,status){
            if (data == "0") {
            $("#suc").slideUp(1000);$("#war1").slideUp(1000);$("#war2").slideUp(1000);$("#war3").slideUp(1000);$("#war").slideDown(1000);
            $("#npass").val('');            
            }
            if (data == "1") {
            $("#war1").slideUp(1000);$("#war").slideUp(1000);$("#war2").slideUp(1000);$("#war3").slideUp(1000);$("#suc").slideDown(1000);
            $("#nEmail").val('');
            $("#npass").val('');
            $("#nname").val('');
            }
        });
        }
    });
});
