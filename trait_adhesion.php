<?php

require ('connexion/connect.php');
require ('loader.php');
session_start();
include ('instance.php');

if(!isset($_SESSION['login']) || !isset($_SESSION['mdp']) || !($user instanceof Admin) || !isset($_GET['op']) || !isset($_GET['id_user']))
    echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
    
else{
    $association = $user->getassociation();
    if($_GET['op']==1){
        if(Demande::existe($_GET['id_user'],$association->getid())==true){
            $demande = new Demande($_GET['id_user'],$association->getid());
            $demande->addadhesion();
            $demande->supprimer_demande();
            echo "<script type='text/javascript'>document.location.replace('consulter.php?op=1');</script>";
        }
        else{
            echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
        }
    }
    else if($_GET['op']==2){
        if(Demande::existe($_GET['id_user'],$association->getid())==true){
            $demande = new Demande($_GET['id_user'],$association->getid());
             $demande->supprimer_demande();
            echo "<script type='text/javascript'>document.location.replace('consulter.php?op=1');</script>";
        }
        else{
            echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
        }
    }
    else{
            echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
    }
}




?>