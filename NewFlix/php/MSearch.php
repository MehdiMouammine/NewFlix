<?php
require 'Controleur.php';
require 'connbd.php';
$con = new Controleur($bd);
$series = $con->getMSearch($_GET['Search']);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div style="width: 100%; background-color: #000; background-position: center; background-repeat: no-repeat; background-size: cover;">
		<?php
			foreach ($series as $serie) {
				$code="sa".$serie->getIdMv();
				$attr="dark('".$code."')";
				$attr2="light('".$code."')";
				echo '<div style="width: 19.5%; margin-left: 0.5%; margin-top: 0.5%; margin-bottom: 0.5%; display: inline-block;">
						<a href="#list1"><img src="'.$serie->getIcon().'" onmouseleave="'.$attr2.'" onmouseenter="'.$attr.'" id="'.$code.'"  onclick="charger3('.$serie->getIdMv().')" style="width:100%"></a>
					 </div>';
			}
		?>
	</div>
</body>
</html>