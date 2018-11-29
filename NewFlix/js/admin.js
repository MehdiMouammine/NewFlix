function out() {
    $("#out").css('color', 'red')
  }
  function lout() {
    $("#out").css('color', 'white')
  }
$(document).ready(function(){
    $("#haddsr").click(function(){$("#addsr").slideToggle(2000);});
    $("#haddmv").click(function(){$("#addmv").slideToggle(2000);});
    $("#haddse").click(function(){$("#addse").slideToggle(2000);});
    $("#haddep").click(function(){$("#addep").slideToggle(2000);});
    $("#hseasr").click(function(){$("#seasr").slideToggle(2000);});
    $("#hseamv").click(function(){$("#seamv").slideToggle(2000);});
    $("#hedsr").click(function(){$("#edsr").slideToggle(2000);});
    $("#hedmv").click(function(){$("#edmv").slideToggle(2000);});
    $("#hedse").click(function(){$("#edse").slideToggle(2000);});
    $("#hedep").click(function(){$("#edep").slideToggle(2000);});
    $("#hdelsr").click(function(){$("#delsr").slideToggle(2000);});
    $("#hdelmv").click(function(){$("#delmv").slideToggle(2000);});
    $("#hdelse").click(function(){$("#delse").slideToggle(2000);});
    $("#hdelep").click(function(){$("#delep").slideToggle(2000);});
    });
    function search1() {
    	var ser = $("#ser").val();
    	if (ser != "") {
    		var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("result1").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "Searchadd.php?Ser="+ser, true);
	xhttp.send();
    	}
    	else{
    		document.getElementById("result1").innerHTML = null;
    	}
    }
    function search2() {
        var ser = $("#mov").val();
        if (ser != "") {
            var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("result2").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "MSearchadd.php?Ser="+ser, true);
    xhttp.send();
        }
        else{
            document.getElementById("result2").innerHTML = null;
        }
    }