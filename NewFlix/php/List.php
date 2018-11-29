<?php
if (isset($_GET['Usr'])) {
      $json = file_get_contents("../json/users/".$_GET['Usr'].".json");
      $list = json_decode($json, true);      
      $series=$list[0];
      $movies=$list[1];
      array_push($series,$_GET['Ser']);
      $list2=array();
      array_push($list2,$series);
      array_push($list2,$movies);
      $json2 = json_encode($list2);
      $fp = fopen("../json/users/".$_GET['Usr'].".json", 'w');
      fwrite($fp, $json2);
      fclose($fp);
}
?>