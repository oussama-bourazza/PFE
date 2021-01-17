<?php 

if(isset($_SESSION['login']) && isset($_SESSION['mdp'])){
        $login = $conn->query("select * from users where username = \"".$_SESSION['login']."\"")->fetch();
        $role = "adherent";
        $result = $conn->query("select id_admin from associations");
        while($association = $result->fetch()){
            if($_SESSION['id']==$association['id_admin']){
                $role = "admin";
                break;
            }
        }
        
        if($role=="adherent") $user = new Adherent($login['id'],$login['username'],$login['password'],$login['nom'],$login['prenom'],$login['email'],$login['adresse'],$login['tel']);
        else $user = new Admin($login['id'],$login['username'],$login['password'],$login['nom'],$login['prenom'],$login['email'],$login['adresse'],$login['tel']);
            
       
}

?>