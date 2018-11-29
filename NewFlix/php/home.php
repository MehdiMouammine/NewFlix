<?php
require 'Controleur.php';
require 'connbd.php';
$con = new Controleur($bd);
$series = $con->getLastAdded();
$all = $con->getSeries();
$content = 'content="streaming, series, serie, VOSTFR, VO, vo, vostfr, streaming series, streaming series vostfr, movies, movie, streaming website, online streaming, online, newflix, netflix, newflix.gq, NewFlix';
foreach ($all as $a) {
  $content = $content.", ".$a->getTitle();
}
$content = $content.'"';
?>
<?php
if (isset($_COOKIE['Email'])) {
  $reponse = $bd->query('SELECT name FROM User WHERE email=\'' . $_COOKIE['Email'] . '\'');
  $name="";
  while ($donnees = $reponse->fetch()){$name =$donnees['name']; }
  $long = 40 - strlen($name);

  $user ='<div onmouseenter="red(2)" id="movie2" onmouseleave="normal(2)" style="background-color: #000000; margin-left:'.$long.'%; font-size: 1.6em; color: white; padding-top: 1%; padding-left: 0.7%; padding-right: 0.7%; font-family: Impact;"><a href="profile.php" style="text-decoration: none;"><div style="color: white;"><i class="fa fa-user"></i> '.$name.'</div></a></div>
<a href="logout.php" id="out" onmouseenter="out()" onmouseleave="lout()"  style="margin-left: 0.6%;margin-top: 0.7%; text-decoration: none; color: white; font-size: 2em;"><i class="fa fa-power-off"></i></a>
';
}
else {
  $user ='<div onmouseenter="red(2)" id="movie2" onmouseleave="normal(2)" style="background-color: #000000; margin-left:38%; font-size: 1.6em; color: white; padding-top: 1%; padding-left: 0.7%; padding-right: 0.7%; font-family: Impact;"><a href="../index.php" style="text-decoration: none;"><div style="color: white;"><i class="fa fa-user"></i> Log in</div></a></div>
';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>NewFlix Series</title>
  <meta name="keywords" <?php echo $content;?>>
  <meta name="description" content="online streaming series vostfr website">
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body style="background-color: #222;">
<div style="background-color: #000; width: 100%; margin: 0%; display: flex; position: fixed; z-index: 5;">
<div style="padding: 1%; flex-basis: 11%;"><a href="home.php"><img src="../img/logo.png" width="100%"></a></div> 
<div style="background-color: #CC0000; font-size: 1.6em; color: white; padding-top: 1%; padding-left: 0.7%; padding-right: 0.7%; font-family: Impact;"><a href="home.php" style="text-decoration: none;"><div style="color: white;"> Series</div></a></div>
<div onmouseenter="red(1)" id="movie1" onmouseleave="normal(1)" style="background-color: #000000; font-size: 1.6em; color: white; padding-top: 1%; padding-left: 0.7%; padding-right: 0.7%; font-family: Impact;"><a href="home2.php" style="text-decoration: none;"><div style="color: white;"> Movies</div></a></div>
<div class="input-group" style="margin-top: 0.8%; margin-left: 1%; width: 30%;">
  <div class="input-group-addon" style="background-color: #333; color: #FFF;"><i class="fa fa-search"></i></div>
  <input class="form-control" style="overflow:scroll; background: #333; color: white;" onkeyup="rech()" id="rechr" pattern=".{0,20}" placeholder="Search..." type="text"/>
</div>
<?php echo $user;?>
</div>
<br>
          <div class="slideshow-container" width="100%" style="margin-top: 2.75%;" >
            <div style="position: absolute; float: right; display: none;" align="right">
              <span class="dot" onclick="currentSlide(1)"></span> 
              <span class="dot" onclick="currentSlide(2)"></span> 
              <span class="dot" onclick="currentSlide(3)"></span> 
              <span class="dot" onclick="currentSlide(4)"></span>
              <span class="dot" onclick="currentSlide(5)"></span> 
            </div>
            <?php
            $i = 1;
			foreach ($series as $serie) {
				echo '<a href="#ank" style="text-decoration: none;"><div class="mySlides fade">
              			<div style="width: 100%; background: linear-gradient(to left, rgba(0,0,0,0)35%, rgba(0,0,0,1)65%), url('.$serie->getBackground().'); background-repeat: no-repeat; background-position: right; height: 100%; min-height: 400px;">
              			<br>
			<span style="font-family: Impact; font-size: 3.5em; margin-left: 2%; margin-top: 3%; color: white;">'.$serie->getTitle().'</span>
			<br>
			<span style="font-family: Tahoma;font-size: 1em; margin-left: 3%; margin-top: 3%; color: green;">'.$serie->getNbSeasons().' Seasons&nbsp;&nbsp;'.$serie->getPeriod().'</span><br>
			<div style="width: 30%; font-size: 1.25em; margin-left: 3%; margin-top: 1%; color: #666;">'.$serie->getSynopsis().'</div>
              			</div>
            		</div></a>';
			}
			?>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
          </div>

<div id="tit1" style="display: none; color: white; font-family: Impact; font-size: 1.5em;">
<br>
Search Results :
</div>
<div id="list1" style="display: none;">
</div>
<div id="ser1" class="er">
</div>
<div id="ank"></div>
<br>
<div style="color: white; font-family: Impact; font-size: 1.5em;">
Most Watched :
</div>
<div id="list3">
</div>
<div id="ser3" class="er">
</div>
<br>
<div style="color: white; font-family: Impact; font-size: 1.5em;">
Last Added :
</div>
<div id="list">
</div>
<div id="ser" class="er">
</div>
<br>
<div style="color: white; font-family: Impact; font-size: 1.5em;">
Random Picks :
</div>
<div id="list2">
</div>
<div id="ser2" class="er">
</div>
<br>
<div id="favorite">
</div>
<div id="myModal4" class="modal">
  <div class="modal-content3 panel" style="border: none;">
    <a style="background-color: red; color: #FFF; float: right; position: absolute;" class="btn btn-xs" href="about:blank" onclick="modal4no()" target="TV" id="close"><i class="fa fa-times"></i></a>
    <iframe name="TV" width="100%" height="100%" allowfullscreen style="background-color: black;"></iframe>
  </div>
</div>
<script type="text/javascript" src="../js/home.js"></script>
</body>
</html>