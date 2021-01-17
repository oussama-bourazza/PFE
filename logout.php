<?php
require ('connexion/connect.php');
require ('loader.php');
session_start();

$_SESSION['status'] = "";
unset($_SESSION['login']);
unset($_SESSION['mdp']);

echo "<script type='text/javascript'>document.location.replace('index.php');</script>";


?>