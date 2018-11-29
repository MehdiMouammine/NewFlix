<?php
require 'Controleur.php';
require 'connbd.php';
$con = new Controleur($bd);
$ww="";
if (isset($_COOKIE['Email'])) {
$reponse = $bd->query('SELECT Id FROM User WHERE email=\'' . $_COOKIE['Email'] . '\'');
$id=0;
while ($donnees = $reponse->fetch()){$id =$donnees['Id']; }
$json = file_get_contents("../json/users/".$id.".json");
$list = json_decode($json, true);      
$series=$list[1];
}
else{
	$ww="display: none;";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div style="color: white; font-family: Impact; <?php echo $ww;?> font-size: 1.5em;">
	My List :
	</div>
	<div id="mly0" style="width: 100%; background-color: #000; <?php echo $ww;?> background-position: center; background-repeat: no-repeat; background-size: cover;">
		<?php
			$i=0;
			$gy=0;
			foreach ($series as $s) {
				$i++;
				if ($i%6==0) {
					echo '</div><div id="lx'.$gy.'" class="er"></div><div id="mly'.$gy.'" style="width: 100%; background-color: #000; background-position: center; background-repeat: no-repeat; background-size: cover;">';
				}
				$serie = $con->getMovie($s);
				$code="my".$serie->getIdMv();
				$attr="dark('".$code."')";
				$attr2="light('".$code."')";
				$gy= floor($i/6); 
				echo '<div style="width: 19.5%; margin-left: 0.5%; margin-top: 0.5%; margin-bottom: 0.5%; display: inline-block;">
						<a href="#mly'.$gy.'"><img src="'.$serie->getIcon().'" onmouseleave="'.$attr2.'" onmouseenter="'.$attr.'" id="'.$code.'"  onclick="chargerx('.$serie->getIdMv().','.$gy.')" style="width:100%"></a>
					 </div>';
				}
			if ($i%5!=0) {
				echo '</div><div id="lx'.$gy.'" class="er">';
			}
		?>
	</div>
</body>
</html>