<?php
require 'Controleur.php';
require 'connbd.php';
$con = new Controleur($bd);
$serie = $con->getSerie($_GET['Ser']);
?>
<?php
$blist="";
if (isset($_COOKIE['Email'])) {
  $reponse = $bd->query('SELECT Id FROM User WHERE email=\'' . $_COOKIE['Email'] . '\'');
  $id=0;
  while ($donnees = $reponse->fetch()){$id =$donnees['Id']; }
  $json = file_get_contents("../json/users/".$id.".json");
  $list = json_decode($json, true);      
  $series=$list[0];
  $param=$_GET["Ser"].','.$id;
  $blist ='<a class="btn btn-default" onclick="slist('.$param.')" id="list"><span class="glyphicon glyphicon-plus"></span> My List</a>';
  foreach ($series as $value) {
  	if ($_GET['Ser'] == $value) {
  		$blist ='<a class="btn btn-success" onclick="noslist('.$param.')"  id="inlist"><span class="glyphicon glyphicon-ok"></span> My List</a>';break;
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
			<span style="font-family: Tahoma;font-size: 1em; margin-left: 3%; margin-top: 3%; color: green;"><?php echo $serie->getNbSeasons();?> Seasons&nbsp;&nbsp;<?php echo $serie->getPeriod();?></span><br>
			<div style="width: 30%; font-size: 1.25em; margin-left: 3%; margin-top: 1%; color: #666;"><?php echo $serie->getSynopsis();?></div>
			<div style="margin-left: 3%; margin-top: 2%; margin-bottom: 7%;"><a class="btn btn-warning" style="margin-right: 1%;" onclick="play(<?php echo $_GET['Ser'];?>)" id="play"><span class="glyphicon glyphicon-play"></span> Play</a><?php echo $blist;?></div>
			</div>
			<div <?php echo 'id="'.$_GET['Ser'].'bar2"';?> style="display: none;">
			<div style="font-family: Tahoma;font-size: 1em; margin-left: 3%; margin-top: 1%;">
				<select id="seasons" onchange="season()" style="color: white; background-color: #333; border: none; font-size: 1.25em;">
					<?php $s=$serie->getSeasons();
					foreach ($s as $season) {
						echo '<option value="'.$season->getIdSe().'">Season '.$season->getIdSe().' ('.$season->getYear().')</option>';
					}
					?>
				</select>
			</div><br>
			<div>
				<?php $s=$serie->getSeasons();
					foreach ($s as $season) {
						echo '<div id="s'.$season->getIdSe().'" class="s" style="font-family: Tahoma;font-size: 1em; margin-left: 2%; margin-top: 1%; margin-right 0.75%; margin-bottom: 8%; ';
						if ($season->getIdSe() != 1) {
							echo 'display: none;';
						}
						echo '">';
						$e=$season->getEpisodes();
						foreach ($e as $episode) {
							if ($episode->getIdEp()<10) {
								$epi = "0".$episode->getIdEp();
							}
							else{
								$epi = $episode->getIdEp();
							}
							echo '<a href="'.$episode->getLink().'" onclick="modal4()" target="TV" class="btn btn-danger" style="margin-left: 0.75%; margin-bottom: 0.75%;"><i class="fa fa-film"></i> Episode '.$epi.'</a>';
						}
						echo "</div>";
					}
					?>
			</div>
			</div>
	</div>
</body>
</html>