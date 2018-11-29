function dark(n) {
    $("#"+n).css('opacity', '0.5')
  }
  function light(n) {
    $("#"+n).css('opacity', '1')
  }
  function out() {
    $("#out").css('color', 'red')
  }
  function lout() {
    $("#out").css('color', 'white')
  }
  	function red(n) {
    $("#movie"+n).css('background-color', '#A30000')
  }
  function normal(n) {
    $("#movie"+n).css('background-color', '#000000')
  }
	function modal4no() {
	var modal4 = document.getElementById('myModal4');
      modal4.style.display = "none";
  }
	//SlideShow
var slideIndex = 1;
showSlides(slideIndex);
function plusSlides(n) {
  showSlides(slideIndex += n);
}
function currentSlide(n) {
  showSlides(slideIndex = n);
}
function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";
}
//Auto Mouvment Of The Slideshow
var myIndex = 0;
carousel();
function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var y = document.getElementsByClassName("dot");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < y.length; i++) {
    y[i].className = y[i].className.replace(" active", "");  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";
  y[myIndex-1].className += " active";
  setTimeout(carousel, 5000);
}	
	var xhttp1 = new XMLHttpRequest();
	xhttp1.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("list3").innerHTML = this.responseText;
		}
	};
	xhttp1.open("GET", "MMostwatched.php", true);
	xhttp1.send();
	var xhttpxx = new XMLHttpRequest();
	xhttpxx.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("favorite").innerHTML = this.responseText;
		}
	};
	xhttpxx.open("GET", "MFavoris.php", true);
	xhttpxx.send();
	var xhttp2 = new XMLHttpRequest();
	xhttp2.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("list").innerHTML = this.responseText;
		}
	};
	xhttp2.open("GET", "MLastadded.php", true);
	xhttp2.send();
	var xhttp3 = new XMLHttpRequest();
	xhttp3.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("list2").innerHTML = this.responseText;
		}
	};
	xhttp3.open("GET", "MRandom.php", true);
	xhttp3.send();
	function rech() {
	var n = $("#rechr").val();
	if (n != "") {
	$("#tit1").slideDown(2000);
	$("#list1").slideDown(2000);
	var xhttp3 = new XMLHttpRequest();
	xhttp3.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("list1").innerHTML = this.responseText;
		}
	};
	xhttp3.open("GET", "MSearch.php?Search="+n, true);
	xhttp3.send();
	}
	else {
		$("#tit1").slideUp();
		$("#list1").slideUp();
	}
	}
	function charger(n) {
	$("#ser").slideDown(1000);
	$("#ser3").slideUp(1000);
	$("#ser1").slideUp(1000);
	$("#ser2").slideUp(1000);
	$("#list1").slideUp(1000);
	$("#tit1").slideUp(1000);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("ser").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "Moviebar.php?Ser="+n, true);
	xhttp.send();
	}
	function charger1(n) {
	$("#ser3").slideDown(1000);
	$("#ser").slideUp(1000);
	$("#ser1").slideUp(1000);
	$("#ser2").slideUp(1000);
	$("#list1").slideUp(1000);
	$("#tit1").slideUp(1000);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("ser3").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "Moviebar.php?Ser="+n, true);
	xhttp.send();
	}
	function charger3(n) {
	$("#ser1").slideDown(1000);
	$("#ser3").slideUp(1000);
	$("#ser2").slideUp(1000);
	$("#ser").slideUp(1000);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("ser1").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "Moviebar.php?Ser="+n, true);
	xhttp.send();
	}
	function charger2(n) {
	$("#ser2").slideDown(1000);
	$("#ser3").slideUp(1000);
	$("#ser1").slideUp(1000);
	$("#ser").slideUp(1000);
	$("#list1").slideUp(1000);
	$("#tit1").slideUp(1000);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("ser2").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "Moviebar.php?Ser="+n, true);
	xhttp.send();
	}
	function chargerx(n,i) {
	$("#ser2").slideUp(1000);
	$("#ser3").slideUp(1000);
	$("#ser1").slideUp(1000);
	$("#ser").slideUp(1000);
	$("#list1").slideUp(1000);
	$("#tit1").slideUp(1000);
	$("#lx"+i).slideDown(1000);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("lx"+i).innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "Moviebar.php?Ser="+n, true);
	xhttp.send();
	}
	function play(n) {
		var modal4 = document.getElementById('myModal4');
  		modal4.style.display = "block";
        var xhttp = new XMLHttpRequest();
		xhttp.open("GET", "MCount.php?Ser="+n, true);
		xhttp.send();
	}
	function mlist(sr,us) {
		$(".er").slideUp(1000);
        var xhttp = new XMLHttpRequest();
		xhttp.open("GET", "MList.php?Ser="+sr+"&Usr="+us, true);
		xhttp.send();
		var xhttpxx = new XMLHttpRequest();
		xhttpxx.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("favorite").innerHTML = this.responseText;
		}
		};
		xhttpxx.open("GET", "MFavoris.php", true);
		xhttpxx.send();
	}
	function nomlist(sr,us) {
		$(".er").slideUp(1000);
        var xhttp = new XMLHttpRequest();
		xhttp.open("GET", "NoMList.php?Ser="+sr+"&Usr="+us, true);
		xhttp.send();
		var xhttpxx = new XMLHttpRequest();
		xhttpxx.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("favorite").innerHTML = this.responseText;
		}
	};
	xhttpxx.open("GET", "MFavoris.php", true);
	xhttpxx.send();
	}
	function clo() {
	$(".er").slideUp(1000);
	}
	function season() {
		$(".s").slideUp(2000);
    	var num = $( "select#seasons option:checked" ).val();   
        $("#s"+num).slideDown(2000);
	}