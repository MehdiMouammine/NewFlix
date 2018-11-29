<?php
require 'connbd.php';
$serie = $_GET['Ser'];
$a = $bd->prepare('select Count from Serie WHERE IdSr = ?');
$a->execute(array($serie));
$b=0;
while ($d = $a->fetch()){
$b=$d['Count'];
$b++;
$a = $bd->prepare('Update Serie SET Count = ? WHERE IdSr = ?');
$a->execute(array($b,$serie));
}
?>
