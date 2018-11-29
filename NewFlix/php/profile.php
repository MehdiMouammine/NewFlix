<?php
require 'Controleur.php';
require 'connbd.php';
$ff="";
if (isset($_POST['del'])) {
  $reponse2 = $bd->query('SELECT id FROM User WHERE email=\'' . $_COOKIE['Email'] . '\'');
  $ii="";
  while ($donnees2 = $reponse2->fetch()){$ii=$donnees2['id'];}
  $reponsex = $bd->query('DELETE FROM User WHERE email=\'' . $_COOKIE['Email'] . '\'');
  unlink('../json/users/'.$ii.'.json');
  $link = 'logout.php';
  header('Location:' .$link);
}
if (isset($_POST['nname'])) {
  $reponsex = $bd->query('UPDATE User SET name = \'' . $_POST['nname'] . '\'  WHERE email=\'' . $_COOKIE['Email'] . '\'');
  $ff = '<a href="profile.php"><div class="alert alert-success"><strong>Success !</strong> Name changed</div></a>';
}
if (isset($_POST['npass'])) {
  $reponsex = $bd->query('UPDATE User SET pass = \'' . $_POST['npass'] . '\'  WHERE email=\'' . $_COOKIE['Email'] . '\'');
  $ff = '<a href="profile.php"><div class="alert alert-success"><strong>Success !</strong> Password changed</div></a>';
}
if (isset($_POST['nemail'])) {
  $reponse2 = $bd->query('SELECT email FROM User WHERE email=\'' . $_POST['nemail'] . '\'');
  $em="";
  while ($donnees2 = $reponse2->fetch()){$em=$donnees2['email'];}
  if ($em != $_POST['nemail']) {
      $reponsex = $bd->query('UPDATE User SET email = \'' . $_POST['nemail'] . '\'  WHERE email=\'' . $_COOKIE['Email'] . '\'');
      setcookie("Email", $_POST['nemail'] , time() + (86400 * 30), "/");
      $_COOKIE['Email']=$_POST['nemail'];
      $ff = '<a href="profile.php"><div class="alert alert-success"><strong>Success !</strong> Email changed</div></a>';
    }
    else{
      $ff = '<a href="profile.php"><div class="alert alert-danger"><strong>Sorry !</strong> Email already used</div></a>';
    }
}
$con = new Controleur($bd);
$all = $con->getSeries();
$content = 'content="streaming, series, serie, VOSTFR, VO, vo, vostfr, streaming series, streaming series vostfr, movies, movie, streaming website, online streaming, online, newflix, netflix, newflix.gq, NewFlix';
foreach ($all as $a) {
  $content = $content.", ".$a->getTitle();
}
$content = $content.'"';
?>
<?php
if (isset($_COOKIE['Email'])) {
  $reponse = $bd->query('SELECT name , pass FROM User WHERE email=\'' . $_COOKIE['Email'] . '\'');
  $name="";
  while ($donnees = $reponse->fetch()){$name =$donnees['name'];$pass = strlen($donnees['pass']); }
  $long = 71 - strlen($name);

  $user ='<div style="background-color: #CC0000; margin-left:'.$long.'%; font-size: 1.6em; color: white; padding-top: 1%; padding-left: 0.7%; padding-right: 0.7%; font-family: Impact;"><a href="profile.php" style="text-decoration: none;"><div style="color: white;"><i class="fa fa-user"></i> '.$name.'</div></a></div>
<a href="logout.php" id="out" onmouseenter="out()" onmouseleave="lout()"  style="margin-left: 0.6%;margin-top: 0.7%; text-decoration: none; color: white; font-size: 2em;"><i class="fa fa-power-off"></i></a>
';
}
else {
  $user ='<div onmouseenter="red(2)" id="movie2" onmouseleave="normal(2)" style="background-color: #000000; margin-left:38%; font-size: 1.6em; color: white; padding-top: 1%; padding-left: 0.7%; padding-right: 0.7%; font-family: Impact;"><a href="../index.php" style="text-decoration: none;"><div style="color: white;"><i class="fa fa-user"></i> Log in</div></a></div>
';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>NewFlix Profile</title>
  <meta name="keywords" <?php echo $content;?>>
  <meta name="description" content="online streaming series vostfr website">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body style="background-color: #DDD">
<div style="background-color: #000; width: 100%; margin: 0%; display: flex; position: fixed; z-index: 5;">
<div style="padding: 1%; flex-basis: 11%;"><a href="home.php"><img src="../img/logo.png" width="100%"></a></div> 
<div onmouseenter="red(2)" id="movie2" onmouseleave="normal(2)" style="background-color: #000; font-size: 1.6em; color: white; padding-top: 1%; padding-left: 0.7%; padding-right: 0.7%; font-family: Impact;"><a href="home.php" style="text-decoration: none;"><div style="color: white;"> Series</div></a></div>
<div onmouseenter="red(1)" id="movie1" onmouseleave="normal(1)" style="background-color: #000000; font-size: 1.6em; color: white; padding-top: 1%; padding-left: 0.7%; padding-right: 0.7%; font-family: Impact;"><a href="home2.php" style="text-decoration: none;"><div style="color: white;"> Movies</div></a></div>
<?php echo $user;?>
</div>
<br>
<div style="width: 60%;margin-left: 20%; margin-top: 4%; padding: 2%;">
  <span style="color: black; font-size: 2em; font-family: Impact;">Account :</span>
  <br><br><?php echo $ff; ?>
  <table width="100%"><tr><td width="11%">
  <span class="nns" style="margin-left: 1%; color: black; font-size: 1.5em;">Name : </span>
  </td><td width="64%">
  <span class="nns" style="margin-left: 1%; color: black; font-size: 1.5em;"><?php echo $name;?></span>
  </td><td width="25%" align="right">
  <a href="#" class="nns" onclick="nam()" style="color: #00BFFF;">Change your name</a><br>
  </td></tr></table>
  <form method="POST" action="profile.php">
      <div class="input-group" id="nn" style="width: 100%; display: none;">
        <div class="input-group-addon" style="background-color: #333; color: white;">
          <i class="fa fa-user"></i>
        </div>
        <input class="form-control" style="overflow:scroll; background: #333; color: white;" pattern=".{2,20}" id="nname" name="nname" type="text" required placeholder="New Name" />
        <span class="input-group-btn">
             <button value="submit" class="btn btn-danger"><i class="fa fa-refresh"></i></button>
        </span>
      </div>
  </form>
  <hr style="border-color: black;">
  <br>
  <table width="100%"><tr><td width="10.5%">
  <span class="ees" style="margin-left: 1%; color: black; font-size: 1.5em;">Email : </span>
  </td><td width="64.5%">
  <span class="ees" style="margin-left: 1%; color: black; font-size: 1.5em;"><?php echo $_COOKIE['Email'];?></span>
  </td><td width="25%" align="right">
  <a href="#" onclick="emai()" class="ees" style="color: #00BFFF;">Change your email</a><br>
  </td></tr></table>
  <form method="POST" action="profile.php">
      <div class="input-group" id="ee" style="width: 100%; display: none;">
        <div class="input-group-addon" style="background-color: #333; color: white;">
          <i class="fa fa-envelope"></i>
        </div>
        <input class="form-control" style="overflow:scroll; background: #333; color: white;" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="nemail" name="nemail" type="text" required placeholder="New Email" />
        <span class="input-group-btn">
             <button value="submit" class="btn btn-danger"><i class="fa fa-refresh"></i></button>
        </span>
      </div>
  </form>
  <hr style="border-color: black;">
  <br>
  <table width="100%"><tr><td width="17%">
  <span class="pps" style="margin-left: 1%; color: black; font-size: 1.5em;">Password : </span>
  </td><td width="58%">
  <span class="pps" style="margin-left: 1%; color: black; font-size: 1.5em;"><?php for ($i=0; $i < $pass; $i++) {echo "*";} ?></span>
  </td><td width="25%" align="right">
  <a href="#" onclick="pas()" class="pps" style="color: #00BFFF;">Change your password</a><br>
  </td></tr></table>
  <form method="POST" action="profile.php">
      <div class="input-group" id="pp" style="width: 100%; display: none;">
        <div class="input-group-addon" style="background-color: #333; color: white;">
          <i class="fa fa-key"></i>
        </div>
        <input class="form-control nname" style="overflow:scroll; background: #333; color: white;" pattern=".{8,20}"  id="npass" name="npass" type="password" required placeholder="New Password" />
        <span class="input-group-btn">
             <button value="submit" class="btn btn-danger"><i class="fa fa-refresh"></i></button>
        </span>
      </div>
  </form>
  <hr style="border-color: black;">
  <br><br><br><br><br>
  <form action="profile.php" method="POST">
    <input type="hidden" name="del" value="ok">
    <button value="submit" class="btn btn-danger" style="margin-left: 80%;"><span class="glyphicon glyphicon-trash"></span> Delete Account</button>
  </form>
</div>
<script type="text/javascript" src="../js/profile.js"></script>
</body>
</html>