<?php

class Region{
	private $id;
	private $nom;
	private $tab_associations = array();
    private $nbr_associations = 0;
    
    public function Region($id,$nom){
        $this->id = $id;
        $this->nom = $nom;
    
    }
    //Getters
    public function getid(){
        return $this->id;
    }
    public function getnom(){
        return $this->nom;
    }
    public function getnbr_associations(){
        return $this->nbr_associations;
    }
    public function gettabassociations(){
        include('connexion/connect.php');
        $associations = $conn->query("SELECT * FROM associations where id_region = $this->id");
        while($association = $associations->fetch()){
            $this->tab_associations[$this->nbr_associations] = new Association($association['id'],$association['nom'],$association['adresse'],$association['email'],$association['description'],$association['tel']);
            $this->nbr_associations++;
        }
        $conn = null;
        return $this->tab_associations;
        
    }
}

?>