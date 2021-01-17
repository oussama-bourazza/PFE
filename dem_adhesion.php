<?php

require ('connexion/connect.php');
require ('loader.php');
session_start();
include ('instance.php');

if(!isset($_SESSION['login']) || !isset($_SESSION['mdp'])) echo "<script type='text/javascript'>document.location.replace('index.php');</script>";

if(isset($_GET['id_association'])){
    $demande = new Demande($user->getid(),$_GET['id_association']);
    $req = $conn->prepare('insert into demandes_adhesions(id_user,id_association) values (:idu,:ida)');
    
    $req->execute(array(
        'idu' => $demande->getid_user(),
        'ida' => $demande->getid_association()
    ));
    echo "<script type='text/javascript'>document.location.replace('association.php?id=".$_GET['id_association']."');</script>";
}
else {
    echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
}



?>