<?php
require 'connbd.php'; 
if (isset($_POST['Email'])) {
  $ex = 0;
  $reponse3 = $bd->query('SELECT email FROM User WHERE email=\'' . $_POST['Email'] . '\'');
  while ($donnees3 = $reponse3->fetch()){
    if (isset($donnees3)) {
      $ex = 1;
    }
  }
  if ($ex == 1) {
    $reponse4 = $bd->query('SELECT pass FROM User WHERE email=\'' . $_POST['Email'] . '\' AND pass=\'' . base64_encode(str_rot13($_POST['Pass'])) . '\'');
    while ($donnees4 = $reponse4->fetch()){
      if (isset($donnees4)){
        $ex=2;
      }
    }
  }
  if ($ex == 2 && $_POST['Email'] != "admin") {
    session_start();
    $_SESSION['Email'] = $_POST['Email'];
    setcookie("Email", $_POST['Email'] , time() + (86400 * 30), "/");
  }
  if ($ex == 2 && $_POST['Email'] == "admin") {
    $ex=3;
  }
  echo $ex;
}
?>