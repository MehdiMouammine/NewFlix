<?php
require 'connbd.php';
$serie = $_GET['Ser'];
$a = $bd->prepare('select Count from Movie WHERE IdMv = ?');
$a->execute(array($serie));
$b=0;
while ($d = $a->fetch()){
$b=$d['Count'];
$b++;
$a = $bd->prepare('Update Movie SET Count = ? WHERE IdMv = ?');
$a->execute(array($b,$serie));
}
?>
