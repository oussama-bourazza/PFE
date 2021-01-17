<?php


class Association{
	private $id;
	private $nom;
	private $adresse;
	private $email;
    private $description;
	private $tab_adherents = array();
    private $nbr_adherents = 0;
	private $tel;
	private $association_admin;
	private $evenements = array();
	private $region;
    
    public function Association($id,$nom,$adresse,$email,$description,$tel){
        $this->id = $id;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->email = $email;
        $this->description = $description;
        $this->tel = $tel;
        
        
        
    }
    /*public function Association($nom,$adresse,$email,$tel){
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->email = $email;
        $this->tel = $tel;
    }*/
    public function getid(){
        return $this->id;
    }
    public function getnom(){
        return $this->nom;
    }
    public function getadresse(){
        return $this->adresse;
    }
    public function getemail(){
        return $this->email;
    }
    public function getregion(){
        include('connexion/connect.php');
        $result = $conn->query("select nom from regions where id = (select id_region from associations where id = $this->id)")->fetch();
        $conn = null;
        return $result['nom'];
        
    }
    public function getdescription(){
        return $this->description;
    }
    public function getnbradherents(){
        include('connexion/connect.php');
        $result = $conn->query("select nbr_adherents from associations where id = $this->id")->fetch();
        $conn = null;
        return $result['nbr_adherents'];
    }
    public function gettel(){
        return $this->tel;
    }
    public function getadmin(){
        include('connexion/connect.php');
        $result = $conn->query("select * from users where id = (select id_admin from associations where id = $this->id)")->fetch();
        $conn = null;
        return $result['nom']." ".$result['prenom'];
    }
    
    public function gettabadherents(){
        include('connexion/connect.php');
        $result = $conn->query("select * from users where id in (select id_user from adhesions where id_association = $this->id)");
        while($adherent = $result->fetch()){
            $this->tab_adherents[$this->nbr_adherents] = new Adherent($adherent['id'],$adherent['username'],$adherent['password'],$adherent['nom'],$adherent['prenom'],$adherent['email'],$adherent['adresse'],$adherent['tel']);
            
            $this->nbr_adherents++;
            
        }
        $conn = null;
        return $this->tab_adherents;
        
    }
    public function getevenements(){
        $i = 0;
        include('connexion/connect.php');
        $result = $conn->query("select * from evenements where id_association = $this->id order by id desc limit 10");
        while($event = $result->fetch()){
            $this->evenements[$i] = new Evenement($event['id'],$event['nom'],$event['date'],$event['description'],$event['lieu']);
            $i++;
        }
        $conn=null;
        return $this->evenements;
    }
    public function est_en_attente($id){
        include('connexion/connect.php');
        $result = $conn->query("select * from demandes_adhesions where id_association = $this->id");
        while($demande = $result->fetch()){
            if($demande['id_user']==$id){
                $conn=null;
                return true;
            } 
        }
        $conn=null;
        return false;
    }
    
    
    
}

?>