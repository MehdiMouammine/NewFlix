<?php
require 'Controleur.php';
require 'connbd.php';
$con = new Controleur($bd);
$alert ="";
if(isset($_POST["titlemv"])){
$uploadOk = 1;
$check = getimagesize($_FILES["iconmv"]["tmp_name"]);
$image_width = $check[0];
$image_height = $check[1];
$check2 = getimagesize($_FILES["backgroundmv"]["tmp_name"]);
$image_width2 = $check2[0];
$image_height2 = $check2[1];
if($check !== false) {
  $uploadOk = 1;
} 
else if ($check == false){
  $alert = '<a href="admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> Icon file is not an image</div></a>';
  $uploadOk = 0;
}
if($check2 !== false) {
  $uploadOk = 1;
} 
else if ($check2 == false){
  $alert = '<a href="admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> Background file is not an image</div></a>';
  $uploadOk = 0;
}
if (($image_width != 709) || ($image_height != 473)) {
        $uploadOk = 0;
        $alert = '<a href="admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> Icon image size is different than 709 × 473</div></a>';
      }
if (($image_width2 != 1000) || ($image_height2 != 563)) {
        $uploadOk = 0;
        $alert = '<a href="admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> Background image size is different than 1000 × 563</div></a>';
      }
if ($uploadOk == 1) {
  $con->newMovie($_POST["titlemv"],$_POST["synopsismv"],$_POST["yearmv"],$_POST["durationmv"],$_POST["linkmv"]);
$a = $bd->query('select Max(IdMv) from Movie');
$idsr=0;
while ($d = $a->fetch()){$idsr = $d['Max(IdMv)'];}
$target_dir = "../img/movies/icon/";
$target_name = $idsr.".jpg";
$target_file = $target_dir . $target_name;
$target_dir2 = "../img/movies/background/";
$target_name2 = $idsr.".jpg";
$target_file2 = $target_dir2 . $target_name2;
  move_uploaded_file($_FILES["iconmv"]["tmp_name"], $target_file);
  move_uploaded_file($_FILES["backgroundmv"]["tmp_name"], $target_file2);
  $alert = '<a href="admin.php"><div class="alert alert-success"><strong>Success !</strong> Movie was added</div></a>';
}
}
if(isset($_POST["title"])){
$uploadOk = 1;
$check = getimagesize($_FILES["icon"]["tmp_name"]);
$image_width = $check[0];
$image_height = $check[1];
$check2 = getimagesize($_FILES["background"]["tmp_name"]);
$image_width2 = $check2[0];
$image_height2 = $check2[1];
if($check !== false) {
  $uploadOk = 1;
} 
else if ($check == false){
  $alert = '<a href="admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> Icon file is not an image</div></a>';
  $uploadOk = 0;
}
if($check2 !== false) {
  $uploadOk = 1;
} 
else if ($check2 == false){
  $alert = '<a href="admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> Background file is not an image</div></a>';
  $uploadOk = 0;
}
if (($image_width != 709) || ($image_height != 473)) {
        $uploadOk = 0;
        $alert = '<a href="admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> Icon image size is different than 709 × 473</div></a>';
      }
if (($image_width2 != 1000) || ($image_height2 != 563)) {
        $uploadOk = 0;
        $alert = '<a href="admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> Background image size is different than 1000 × 563</div></a>';
      }
if ($uploadOk == 1) {
  $con->newSerie($_POST["title"],$_POST["synopsis"],$_POST["period"]);
$a = $bd->query('select Max(IdSr) from Serie');
$idsr=0;
while ($d = $a->fetch()){$idsr = $d['Max(IdSr)'];}
$target_dir = "../img/series/icon/";
$target_name = $idsr.".jpg";
$target_file = $target_dir . $target_name;
$target_dir2 = "../img/series/background/";
$target_name2 = $idsr.".jpg";
$target_file2 = $target_dir2 . $target_name2;
  move_uploaded_file($_FILES["icon"]["tmp_name"], $target_file);
  move_uploaded_file($_FILES["background"]["tmp_name"], $target_file2);
  $alert = '<a href="admin.php"><div class="alert alert-success"><strong>Success !</strong> Serie was added</div></a>';
}
}
if(isset($_POST["idsr"])){
	$con->newSeason($_POST["year"],$_POST["number"],$_POST["idsr"]);
	$alert = '<a href="admin.php"><div class="alert alert-success"><strong>Success !</strong> Season was added</div></a>';
}
if(isset($_POST["idsr2"])){
	$con->newEpisode($_POST["number2"],$_POST["link"],$_POST["idsr2"],$_POST["idse"]);
	$alert = '<a href="admin.php"><div class="alert alert-success"><strong>Success !</strong> Episode was added</div></a>';
}
if(isset($_POST["edidsr2"])){
  $con->editSeason($_POST["edyear"],$_POST["ednumber"],$_POST["edidsr2"],$_POST["ednumber2"]);
  $alert = '<a href="admin.php"><div class="alert alert-success"><strong>Success !</strong> Season was edited</div></a>';
}
if(isset($_POST["edidmv"])){
  $con->editMovie($_POST["edidmv"],$_POST["edtitlemv"],$_POST["edsynopsismv"],$_POST["edyearmv"],$_POST["eddurationmv"],$_POST["edlinkmv"]);
  $alert = '<a href="admin.php"><div class="alert alert-success"><strong>Success !</strong> Movie was edited</div></a>';
}
if(isset($_POST["idsr3"])){
  $con->editEpisode($_POST["ednumber22"],$_POST["edlink"],$_POST["idsr3"],$_POST["edidse2"],$_POST["ednumber23"]);
  $alert = '<a href="admin.php"><div class="alert alert-success"><strong>Success !</strong> Episode was edited</div></a>';
}
if(isset($_POST["edidsr"])){
$uploadOk = 1;
$check = getimagesize($_FILES["edicon"]["tmp_name"]);
$image_width = $check[0];
$image_height = $check[1];
$check2 = getimagesize($_FILES["edbackground"]["tmp_name"]);
$image_width2 = $check2[0];
$image_height2 = $check2[1];
if($check !== false) {
  $uploadOk = 1;
} 
else if ($check == false){
  $alert = '<a href="admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> Icon file is not an image</div></a>';
  $uploadOk = 0;
}
if($check2 !== false) {
  $uploadOk = 1;
} 
else if ($check2 == false){
  $alert = '<a href="admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> Background file is not an image</div></a>';
  $uploadOk = 0;
}
if (($image_width != 709) || ($image_height != 473)) {
        $uploadOk = 0;
        $alert = '<a href="admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> Icon image size is different than 709 × 473</div></a>';
      }
if (($image_width2 != 1000) || ($image_height2 != 563)) {
        $uploadOk = 0;
        $alert = '<a href="admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> Background image size is different than 1000 × 563</div></a>';
      }
if ($uploadOk == 1) {
$con->editSerie($_POST["edidsr"],$_POST["edtitle"],$_POST["edsynopsis"],$_POST["edperiod"]);
$idsr=$_POST["edidsr"];
$target_dir = "../img/series/icon/";
$target_name = $idsr.".jpg";
$target_file = $target_dir . $target_name;
$target_dir2 = "../img/series/background/";
$target_name2 = $idsr.".jpg";
$target_file2 = $target_dir2 . $target_name2;
  move_uploaded_file($_FILES["edicon"]["tmp_name"], $target_file);
  move_uploaded_file($_FILES["edbackground"]["tmp_name"], $target_file2);
  $alert = '<a href="admin.php"><div class="alert alert-success"><strong>Success !</strong> Series was edited</div></a>';
}
}
if(isset($_POST["delidsr"])){
  $con->deleteSerie($_POST["delidsr"]);
  $alert = '<a href="admin.php"><div class="alert alert-danger"><strong>Success !</strong> Serie was deleted</div></a>';
}
if(isset($_POST["delidmv"])){
  $con->deleteMovie($_POST["delidmv"]);
  $alert = '<a href="admin.php"><div class="alert alert-danger"><strong>Success !</strong> Movie was deleted</div></a>';
}
if(isset($_POST["delidsr2"])){
  $con->deleteSeason($_POST["delidse"],$_POST["delidsr2"]);
  $alert = '<a href="admin.php"><div class="alert alert-danger"><strong>Success !</strong> Season was deleted</div></a>';
}
if(isset($_POST["delidsr3"])){
  $con->deleteEpisode($_POST["delidep"],$_POST["delidsr3"],$_POST["delidse2"]);
  $alert = '<a href="admin.php"><div class="alert alert-danger"><strong>Success !</strong> Episode was deleted</div></a>';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>NewFlix Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body style="background-color: #222;">
<div style="background-color: #000; width: 100%; margin: 0%; display: flex; position: fixed; z-index: 5;">
<div style="padding: 1%; flex-basis: 11%;"><a href="admin.php"><img src="../img/logo.png" width="100%"></a></div><span style="margin-top: 1.55%; color: white; font-size: 1.3em; font-family: Impact;">Admin</span>
<a href="logout.php" id="out" onmouseenter="out()" onmouseleave="lout()" style="margin-left: 82%;margin-top: 0.7%; text-decoration: none; color: white; font-size: 2em;"><i class="fa fa-power-off"></i></a>
</div>
<br><br><br><br><br><br>
<table width="95%" align="center">
  <tr>
    <td colspan="5">
      <?php echo $alert;?>
    </td>
  </tr>
  <tr>
      <td colspan="5">
        <div class="panel" style="border: none;">
      <div class="panel-heading" id="hseamv" style="background-color: #333; color: #818181; width: 100%;">
        <span class="panel-title"><i class="fa fa-ticket"></i> Search Movie Infos</span>
      </div>
      <div id="seamv" style=" background: #666; color: black; display: none;">
        <table width="90%" align="center">
          <tr>
            <td>
                    <div class="input-group" style="margin-top: 2%; margin-bottom: 1%; width: 100%">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-font"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" onkeyup="search2()" id="mov" required name="searchmo" placeholder="Movie's Title" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr><td id="result2"></td></tr>
                <tr><td><br></td></tr>
          </tr>
        </table>
      </div>
    </div>
      </td>
  </tr>
  <tr>
    <td width="31%" valign="top">
      <div class="panel" style="border: none;">
      <div class="panel-heading" id="haddmv" style="background-color: #333; color: #818181; width: 100%;">
        <span class="panel-title"><i class="fa fa-plus"></i> Add New Movie</span>
      </div>
      <div id="addmv" style=" background: #666; color: black; display: none;">
      <table width="95%" align="center">
                <form action="admin.php" id="formnmv" method="post" enctype="multipart/form-data">
                <tr>
                    <td>
                      <br>
                        <div class="input-group" style="margin: 2%;">
                        <div class=" input-group-addon" style="background-color: #333; color: white;">
                            <i class="fa fa-image"></i>
                          </div> 
                        <input type="file" class="form-control" style="overflow:scroll; background: #333; color: white;" placeholder="Movie's Icon" required name="iconmv" id="iconmv">
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input-group" style="margin: 2%;">
                        <div class=" input-group-addon" style="background-color: #333; color: white;">
                            <i class="fa fa-file-image-o"></i>
                          </div> 
                        <input type="file" class="form-control" style="overflow:scroll; background: #333; color: white;" placeholder="Movie's Background" required name="backgroundmv" id="backgroundmv">
                    </div>
                    </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-font"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="titlemv" required name="titlemv" placeholder="Movie's Title" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-info-circle"></i>
                      </div>
                      <textarea name="synopsismv" style="overflow:scroll; background: #333; color: white; width: 100%;" required form="formnmv"></textarea>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="yearmv" required name="yearmv" placeholder="Movie's Year" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-clock-o"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="durationmv" required name="durationmv" placeholder="Movie's Duration" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-link"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="linkmv" required name="linkmv" placeholder="Movie's Link" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td align="center">
                    <button value="submit" style="margin: 2%;" class="btn btn-danger btn-default"><i class="fa fa-plus"></i> Add new movie</button>
                    <br><br>
                  </td>
                </tr>
              </form>
              </table>
            </div>
      </div>
      </td>
    <td width="3.5%"><br></td>
    <td width="31%" valign="top">
      <div class="panel" style="border: none;">
      <div class="panel-heading" id="hedmv" style="background-color: #333; color: #818181; width: 100%;">
        <span class="panel-title"><i class="fa fa-repeat"></i> Edit Movie</span>
      </div>
      <div id="edmv" style=" background: #666; color: black; display: none;">
      <table width="95%" align="center">
                <form action="admin.php" id="edformnmv" method="post" enctype="multipart/form-data">
                <tr>
                  <td>
                    <br>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-slack"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="edidmv" required name="edidmv" placeholder="Movie's Id" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-font"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="edtitlemv" required name="edtitlemv" placeholder="Movie's Title" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-info-circle"></i>
                      </div>
                      <textarea name="edsynopsismv" style="overflow:scroll; background: #333; color: white; width: 100%;" required form="edformnmv"></textarea>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="edyearmv" required name="edyearmv" placeholder="Movie's Year" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-clock-o"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="eddurationmv" required name="eddurationmv" placeholder="Movie's Duration" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-link"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="edlinkmv" required name="edlinkmv" placeholder="Movie's Link" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td align="center">
                    <button value="submit" style="margin: 2%;" class="btn btn-danger btn-default"><i class="fa fa-repeat"></i> Edit movie</button>
                    <br><br>
                  </td>
                </tr>
              </form>
              </table>
            </div>
      </div>
    </td>
    <td width="3.5%"><br></td>
    <td width="31%" valign="top">
      <div class="panel" style="border: none;">
      <div class="panel-heading" id="hdelmv" style="background-color: #333; color: #818181; width: 100%;">
        <span class="panel-title"><i class="fa fa-times"></i> Delete Movie</span>
      </div>
      <div id="delmv" style=" background: #666; color: black; display: none;">
      <table width="95%" align="center">
                <form action="admin.php" id="delformnsr" method="post">
                <tr>
                  <td>
                    <br>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-slack"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="delidmv" required name="delidmv" placeholder="Movie's Id" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td align="center">
                    <button value="submit" style="margin: 2%;" class="btn btn-danger btn-default"><i class="fa fa-times"></i> Delete movie</button>
                    <br><br>
                  </td>
                </tr>
              </form>
              </table>
            </div>
      </div>
    </td>
  </tr>
  <tr>
      <td colspan="5">
        <div class="panel" style="border: none;">
      <div class="panel-heading" id="hseasr" style="background-color: #333; color: #818181; width: 100%;">
        <span class="panel-title"><i class="fa fa-film"></i> Search Serie Infos</span>
      </div>
      <div id="seasr" style=" background: #666; color: black; display: none;">
        <table width="90%" align="center">
          <tr>
            <td>
                    <div class="input-group" style="margin-top: 2%; margin-bottom: 1%; width: 100%">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-font"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" onkeyup="search1()" id="ser" required name="searchse" placeholder="Serie's Title" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr><td id="result1"></td></tr>
                <tr><td><br></td></tr>
          </tr>
        </table>
      </div>
    </div>
      </td>
  </tr>
	<tr>
		<td width="31%" valign="top">
			<div class="panel" style="border: none;">
      <div class="panel-heading" id="haddsr" style="background-color: #333; color: #818181; width: 100%;">
        <span class="panel-title"><i class="fa fa-plus"></i> Add New Serie</span>
      </div>
      <div id="addsr" style=" background: #666; color: black; display: none;">
      <table width="95%" align="center">
                <form action="admin.php" id="formnsr" method="post" enctype="multipart/form-data">
                <tr>
                    <td>
                      <br>
                        <div class="input-group" style="margin: 2%;">
                        <div class=" input-group-addon" style="background-color: #333; color: white;">
                            <i class="fa fa-image"></i>
                          </div> 
                        <input type="file" class="form-control" style="overflow:scroll; background: #333; color: white;" placeholder="Serie's Icon" required name="icon" id="icon">
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input-group" style="margin: 2%;">
                        <div class=" input-group-addon" style="background-color: #333; color: white;">
                            <i class="fa fa-file-image-o"></i>
                          </div> 
                        <input type="file" class="form-control" style="overflow:scroll; background: #333; color: white;" placeholder="Serie's Background" required name="background" id="background">
                    </div>
                    </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-font"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="title" required name="title" placeholder="Serie's Title" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-info-circle"></i>
                      </div>
                      <textarea name="synopsis" style="overflow:scroll; background: #333; color: white; width: 100%;" required form="formnsr"></textarea>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-clock-o"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="period" required name="period" placeholder="Serie's Period" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                <tr>
                  <td align="center">
                    <button value="submit" style="margin: 2%;" class="btn btn-danger btn-default"><i class="fa fa-plus"></i> Add new serie</button>
                    <br><br>
                  </td>
                </tr>
              </form>
              </table>
            </div>
      </div>
      </td>
      <td width="3.5%"><br></td>
		<td width="31%" valign="top">
      <div class="panel" style="border: none;">
      <div class="panel-heading" id="haddse" style="background-color: #333; color: #818181; width: 100%;">
        <span class="panel-title"><i class="fa fa-plus"></i> Add New Season</span>
      </div>
			<div id="addse" style=" background: #666; color: black; display: none;">
      <table width="95%" align="center">
                <form action="admin.php" id="formnse" method="post">
                <tr>
                  <td>
                    <br>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-slack"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="idsr" required name="idsr" placeholder="Serie's Id" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-list-ol"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="number" required name="number" placeholder="Season's Number" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="year" required name="year" placeholder="Season's Year" type="text"/>
                    </div>
                  </td>
                </tr>      	
                <tr>
                  <td align="center">
                    <button value="submit" style="margin: 2%;" class="btn btn-danger btn-default"><i class="fa fa-plus"></i> Add new season</button>
                    <br><br>
                  </td>
                </tr>
              </form>
              </table>
            </div>
      </div>
		</td>
		<td width="3.5%"><br></td>
		<td width="31%" valign="top">      <div class="panel" style="border: none;">
      <div class="panel-heading" id="haddep" style="background-color: #333; color: #818181; width: 100%;">
        <span class="panel-title"><i class="fa fa-plus"></i> Add New Episode</span>
      </div>
			<div id="addep" style=" background: #666; color: black; display: none;">
      <table width="95%" align="center">
                <form action="admin.php" id="formnep" method="post">
                <tr>
                  <td>
                    <br>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-slack"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="idsr2" required name="idsr2" placeholder="Serie's Id" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-slack"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="idse" required name="idse" placeholder="Season's Number" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-list-ol"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="number2" required name="number2" placeholder="Episode's Number" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-link"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="link" required name="link" placeholder="Episode's Link" type="text"/>
                    </div>
                  </td>
                </tr>      	
                <tr>
                  <td align="center">
                    <button value="submit" style="margin: 2%;" class="btn btn-danger btn-default"><i class="fa fa-plus"></i> Add new episode</button>
                    <br><br>
                  </td>
                </tr>
              </form>
              </table>
            </div>
      </div></td>
	</tr>
  <tr>
    <td width="31%" valign="top">
      <div class="panel" style="border: none;">
      <div class="panel-heading" id="hedsr" style="background-color: #333; color: #818181; width: 100%;">
        <span class="panel-title"><i class="fa fa-repeat"></i> Edit Serie</span>
      </div>
      <div id="edsr" style=" background: #666; color: black; display: none;">
      <table width="95%" align="center">
                <form action="admin.php" id="edformnsr" method="post" enctype="multipart/form-data">
                <tr>
                  <td>
                    <br>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-slack"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="edidsr" required name="edidsr" placeholder="Serie's Id" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                    <td>
                        <div class="input-group" style="margin: 2%;">
                        <div class=" input-group-addon" style="background-color: #333; color: white;">
                            <i class="fa fa-image"></i>
                          </div> 
                        <input type="file" class="form-control" style="overflow:scroll; background: #333; color: white;" placeholder="Serie's Icon" required name="edicon" id="edicon">
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input-group" style="margin: 2%;">
                        <div class=" input-group-addon" style="background-color: #333; color: white;">
                            <i class="fa fa-file-image-o"></i>
                          </div> 
                        <input type="file" class="form-control" style="overflow:scroll; background: #333; color: white;" placeholder="Serie's Background" required name="edbackground" id="edbackground">
                    </div>
                    </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-font"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="edtitle" required name="edtitle" placeholder="Serie's Title" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-info-circle"></i>
                      </div>
                      <textarea name="edsynopsis" style="overflow:scroll; background: #333; color: white; width: 100%;" required form="edformnsr"></textarea>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-clock-o"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="edperiod" required name="edperiod" placeholder="Serie's Period" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                <tr>
                  <td align="center">
                    <button value="submit" style="margin: 2%;" class="btn btn-danger btn-default"><i class="fa fa-repeat"></i> Edit serie</button>
                    <br><br>
                  </td>
                </tr>
              </form>
              </table>
            </div>
      </div>
      </td>
      <td width="3.5%"><br></td>
    <td width="31%" valign="top">
      <div class="panel" style="border: none;">
      <div class="panel-heading" id="hedse" style="background-color: #333; color: #818181; width: 100%;">
        <span class="panel-title"><i class="fa fa-repeat"></i> Edit Season</span>
      </div>
      <div id="edse" style=" background: #666; color: black; display: none;">
      <table width="95%" align="center">
                <form action="admin.php" id="edformnse" method="post">
                  <tr>
                  <td>
                    <br>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-slack"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="edidsr2" required name="edidsr2" placeholder="Serie's Id" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-list-ol"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="ednumber" required name="ednumber" placeholder="Season's Position" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-list-ol"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="ednumber2" required name="ednumber2" placeholder="Season's Number" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="edyear" required name="edyear" placeholder="Season's Year" type="text"/>
                    </div>
                  </td>
                </tr>       
                <tr>
                  <td align="center">
                    <button value="submit" style="margin: 2%;" class="btn btn-danger btn-default"><i class="fa fa-repeat"></i> Edit season</button>
                    <br><br>
                  </td>
                </tr>
              </form>
              </table>
            </div>
      </div>
    </td>
    <td width="3.5%"><br></td>
    <td width="31%" valign="top">      <div class="panel" style="border: none;">
      <div class="panel-heading" id="hedep" style="background-color: #333; color: #818181; width: 100%;">
        <span class="panel-title"><i class="fa fa-repeat"></i> Edit Episode</span>
      </div>
      <div id="edep" style=" background: #666; color: black; display: none;">
      <table width="95%" align="center">
                <form action="admin.php" id="edformnep" method="post">
                <tr>
                  <td>
                    <br>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-slack"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="idsr3" required name="idsr3" placeholder="Serie's Id" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-slack"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="edidse2" required name="edidse2" placeholder="Season's Number" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-list-ol"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="ednumber22" required name="ednumber22" placeholder="Episode's Position" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-list-ol"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="ednumber23" required name="ednumber23" placeholder="Episode's Number" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-link"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="edlink" required name="edlink" placeholder="Episode's Link" type="text"/>
                    </div>
                  </td>
                </tr>       
                <tr>
                  <td align="center">
                    <button value="submit" style="margin: 2%;" class="btn btn-danger btn-default"><i class="fa fa-plus"></i></i> Edit episode</button>
                    <br><br>
                  </td>
                </tr>
              </form>
              </table>
            </div>
      </div></td>
  </tr>
  <tr>
    <td width="31%" valign="top">
      <div class="panel" style="border: none;">
      <div class="panel-heading" id="hdelsr" style="background-color: #333; color: #818181; width: 100%;">
        <span class="panel-title"><i class="fa fa-times"></i> Delete Serie</span>
      </div>
      <div id="delsr" style=" background: #666; color: black; display: none;">
      <table width="95%" align="center">
                <form action="admin.php" id="delformnsr" method="post">
                <tr>
                  <td>
                    <br>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-slack"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="delidsr" required name="delidsr" placeholder="Serie's Id" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td align="center">
                    <button value="submit" style="margin: 2%;" class="btn btn-danger btn-default"><i class="fa fa-times"></i> Delete serie</button>
                    <br><br>
                  </td>
                </tr>
              </form>
              </table>
            </div>
      </div>
      </td>
      <td width="3.5%"><br></td>
    <td width="31%" valign="top">
      <div class="panel" style="border: none;">
      <div class="panel-heading" id="hdelse" style="background-color: #333; color: #818181; width: 100%;">
        <span class="panel-title"><i class="fa fa-times"></i> Delete Season</span>
      </div>
      <div id="delse" style=" background: #666; color: black; display: none;">
      <table width="95%" align="center">
                <form action="admin.php" id="delformnse" method="post">
                  <tr>
                  <td>
                    <br>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-slack"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="delidsr2" required name="delidsr2" placeholder="Serie's Id" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-list-ol"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="delidse" required name="delidse" placeholder="Season's Number" type="text"/>
                    </div>
                  </td>
                </tr>      
                <tr>
                  <td align="center">
                    <button value="submit" style="margin: 2%;" class="btn btn-danger btn-default"><i class="fa fa-times"></i> Delete season</button>
                    <br><br>
                  </td>
                </tr>
              </form>
              </table>
            </div>
      </div>
    </td>
    <td width="3.5%"><br></td>
    <td width="31%" valign="top">      <div class="panel" style="border: none;">
      <div class="panel-heading" id="hdelep" style="background-color: #333; color: #818181; width: 100%;">
        <span class="panel-title"><i class="fa fa-times"></i> Delete Episode</span>
      </div>
      <div id="delep" style=" background: #666; color: black; display: none;">
      <table width="95%" align="center">
                <form action="admin.php" id="delformnep" method="post">
                <tr>
                  <td>
                    <br>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-slack"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="delidsr3" required name="delidsr3" placeholder="Serie's Id" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-slack"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="delidse2" required name="delidse2" placeholder="Season's Number" type="text"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group" style="margin: 2%;">
                      <div class="input-group-addon" style="background-color: #333; color: white;">
                        <i class="fa fa-list-ol"></i>
                      </div>
                      <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="delidep" required name="delidep" placeholder="Episode's Number" type="text"/>
                    </div>
                  </td>
                </tr>     
                <tr>
                  <td align="center">
                    <button value="submit" style="margin: 2%;" class="btn btn-danger btn-default"><i class="fa fa-times"></i></i> Delete episode</button>
                    <br><br>
                  </td>
                </tr>
              </form>
              </table>
            </div>
      </div></td>
  </tr>
</table>
<script type="text/javascript" src="../js/admin.js"></script>
</body>
</html>