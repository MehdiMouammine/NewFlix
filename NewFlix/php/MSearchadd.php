<?php
require 'connbd.php';
require 'Controleur.php';
$con = new Controleur($bd);
$serie = $_GET['Ser'];
$a = $bd->query('select IdMv, Title, Year, Duration from Movie WHERE Title Like "%'.$serie.'%"');
echo '<table width="90%" align="center">';
while ($d = $a->fetch()){
echo "<tr><td>".$d['Title']." : Id(".$d['IdMv'].") Year(".$d['Year'].") Duration(".$d['Duration']." min) </td></tr>";
}
echo "</table>";
?>
