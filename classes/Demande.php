<?php

class Demande{
    private $id_user;
    private $id_association;
    
    public function Demande($id_user,$id_association){
        $this->id_user = $id_user;
        $this->id_association = $id_association;
    }
    //Getters
    public function getid_user(){
        return $this->id_user;
    }
    public function getid_association(){
        return $this->id_association;
    }
    public function getuser(){
        include('connexion/connect.php');
        $result = $conn->query("select * from users where id = $this->id_user")->fetch();
        $user1 = new Adherent($result['id'],$result['username'],$result['password'],$result['nom'],$result['prenom'],$result['email'],$result['adresse'],$result['tel']);
        $conn=null;
        return $user1;
    }
    public static function existe($id_user,$id_association){
        include('connexion/connect.php');;
        $result = $conn->query("select * from demandes_adhesions where id_user = $id_user AND id_association = $id_association")->fetch();
        $conn=null;
        if($result==false) return false;
        return true;
        
    }
    public function addadhesion(){
        include('connexion/connect.php');
        $req = $conn->prepare('insert into adhesions(id_user,id_association) values (:idu,:ida)');
        $req->execute(array(
        'idu' => $this->id_user,
        'ida' => $this->id_association
        ));
        $result1 = $conn->query("select * from associations where id = $this->id_association")->fetch();
        $nombre = $result1['nbr_adherents'] + 1;
        $req1 = $conn->prepare("update associations set nbr_adherents = :nombre where id = :idad");
        $req1->execute(array(
            "nombre" => $nombre,
            "idad" => $this->id_association
        ));
        $conn=null;
    }
    public function supprimer_demande(){
        include('connexion/connect.php');
        $req = $conn->prepare("delete from demandes_adhesions where id_user = :idu AND id_association = :ida");
        $req->execute(array(
            "idu" => $this->id_user,
            "ida" => $this->id_association,
        ));
        $conn=null;
    }
}






?>