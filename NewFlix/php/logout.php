<?php  
session_start();
session_destroy();
unset($_COOKIE['Email']);
setcookie('Email', '', time() - 3600, '/');
$link = '../index.php';
header('Location:' .$link);
?>