<?php
require 'Controleur.php';
require 'connbd.php';
$con = new Controleur($bd);
$serie = $con->getMovie($_GET['Ser']);
?>
<?php
$blist="";
if (isset($_COOKIE['Email'])) {
  $reponse = $bd->query('SELECT Id FROM User WHERE email=\'' . $_COOKIE['Email'] . '\'');
  $id=0;
  while ($donnees = $reponse->fetch()){$id =$donnees['Id']; }
  $json = file_get_contents("../json/users/".$id.".json");
  $list = json_decode($json, true);      
  $series=$list[1];
  $param=$_GET["Ser"].','.$id;
  $blist ='<a class="btn btn-default" onclick="mlist('.$param.')" id="list"><span class="glyphicon glyphicon-plus"></span> My List</a>';
  foreach ($series as $value) {
  	if ($_GET['Ser'] == $value) {
  		$blist ='<a class="btn btn-success" onclick="nomlist('.$param.')" id="inlist"><span class="glyphicon glyphicon-ok"></span> My List</a>';break;
  	}
  }
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<div style="width: 100%; background: linear-gradient(to left, rgba(0,0,0,0)35%, rgba(0,0,0,1)65%), url(<?php echo $serie->getBackground();?>); background-repeat: no-repeat; background-position: right; height: 100%; min-height: 400px;">
			<a style="background-color: black; color: #FFF; float: right;" class="btn btn-xs" onclick="clo()" id="close"><i class="fa fa-times"></i></a>
			<br>
			<span style="font-family: Impact; font-size: 3.5em; margin-left: 2%; margin-top: 3%; color: white;"><?php echo $serie->getTitle();?></span>
			<br>
			<div <?php echo 'id="'.$_GET['Ser'].'bar"';?>>
			<span style="font-family: Tahoma;font-size: 1em; margin-left: 3%; margin-top: 3%; color: green;"><?php echo $serie->getYear();?> &nbsp;&nbsp;<?php echo $serie->getDuration();?> Minutes</span><br>
			<div style="width: 30%; font-size: 1.25em; margin-left: 3%; margin-top: 1%; color: #666;"><?php echo $serie->getSynopsis();?></div>
			<div style="margin-left: 3%; margin-top: 2%; margin-bottom: 7%;"><a class="btn btn-warning" style="margin-right: 1%;" onclick="play(<?php echo $_GET['Ser'];?>)"modal4()"""  href=<?php echo '"'.$serie->getLink().'"';?> target="TV" id="play"><span class="glyphicon glyphicon-play"></span> Play</a><?php echo $blist;?></div>
			</div>
			</div>
	</div>
</body>
</html>