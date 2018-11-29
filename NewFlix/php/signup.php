<?php
require 'connbd.php'; 
if (isset($_POST['Email'])) {
  $ex = 2;
  $reponse3 = $bd->query('SELECT email FROM User WHERE email=\'' . $_POST['Email'] . '\'');
  while ($donnees3 = $reponse3->fetch()){
    if (isset($donnees3)) {
      $ex = 0;
    }
  }
  if ($ex == 2) {
    $query = $bd->prepare("INSERT INTO User (email, pass, name) VALUES (?, ?, ?)");
      $query->execute(array($_POST['Email'], base64_encode(str_rot13($_POST['Pass'])), $_POST['Name']));
      $a = $bd->query('select Id from User WHERE email=\'' . $_POST['Email'] . '\' ');
      $d = $a->fetch();
      $fp = fopen("../json/users/".$d['Id'].".json", 'w');
      $list=array();
      $series=array();
      $movies=array();
      array_push($list,$series);
      array_push($list,$movies);
      $json = json_encode($list);
      fwrite($fp, $json);
      fclose($fp);
      $ex = 1;
  }
  echo $ex;
}
?>