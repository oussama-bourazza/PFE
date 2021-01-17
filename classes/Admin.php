<?php


class Admin extends Adherent{
	private $association;
    
    public function Admin($id,$username,$password,$nom,$prenom,$email,$adresse,$tel){
            parent::__construct($id,$username,$password,$nom,$prenom,$email,$adresse,$tel);
             
        
    }
    public function est_admin_de($id){
            include('connexion/connect.php');
            $result = $conn->query("select * from associations where id = $id")->fetch();
            $conn = null;
            if($result['id_admin']==$this->getid()) return true;
            return false;
        }
    public function getassociation(){
        include('connexion/connect.php');
        $result = $conn->query("select * from associations where id_admin = ".$this->getid())->fetch();
        $conn = null;
        $this->association = new Association($result['id'],$result['nom'],$result['adresse'],$result['email'],$result['description'],$result['tel']);
        return $this->association;
    }
    public function getdemandes(){
        include('connexion/connect.php');
        $demandes = array();
        $i = 0;
        $result = $conn->query("select * from demandes_adhesions where id_association = (select id from associations where id_admin = ".$this->getid().")");
        while($demande = $result->fetch()){
            $demandes[$i] = new Demande($demande['id_user'],$demande['id_association']);
            $i++;
        }
        $conn=null;
        return $demandes;
    }
}


?>