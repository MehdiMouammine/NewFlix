<?php
require 'connbd.php';
require 'Controleur.php';
$con = new Controleur($bd);
$serie = $_GET['Ser'];
$a = $bd->query('select IdSr, Title from Serie WHERE Title Like "%'.$serie.'%"');
echo '<table width="90%" align="center">';
while ($d = $a->fetch()){
$serie = $con->getSerie($d['IdSr']);
echo "<tr><td>".$d['Title']." : Id(".$d['IdSr'].") / Nb Seasons(".$serie->getNbSeasons().") / ";
for ($i=0; $i < $serie->getNbSeasons(); $i++) { 
	$n = $serie->getSeason($i+1)->getNbEpisodes();
	echo "S".($i+1)."(".$n.") ";
}
echo "</td></tr>";
}
echo "</table>";
?>
