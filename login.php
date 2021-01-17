<?php

require ('connexion/connect.php');
require ('loader.php');
session_start();

if(!isset($_POST['username'])) echo "<script type='text/javascript'>document.location.replace('index.php');</script>";

else{
    
    $login = $conn->query("select * from users where username = \"".$_POST['username']."\"")->fetch();

    if($login==false){
        $_SESSION['status'] = "Connexion non réussi";
    }
    else{
        if($_POST['password']==$login['password']){
            $_SESSION['login'] = $login['username'];
            $_SESSION['mdp'] = $login['password'];
            $_SESSION['id'] = $login['id'];
            unset($_SESSION['status']);
            
        }
        else{
            $_SESSION['status'] = "Connexion non réussi";
        }
    
    }

    echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
}

?>