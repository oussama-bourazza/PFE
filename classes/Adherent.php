<?php


class Adherent{
    private $id;
	private $username;
	private $password;
	private $nom;
	private $prenom;
	private $email;
	private $adresse;
	private $tel;
    private $tab_association = array();
    private $nbr_associations = 0;
    
    public function Adherent($id,$username,$password,$nom,$prenom,$email,$adresse,$tel){
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->adresse = $adresse;
        $this->tel = $tel;
    
    }
    /*public function Adherent($username,$password,$nom,$prenom,$email,$adresse,$tel){
        $this->username = $username;
        $this->password = $password;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->adresse = $adresse;
        $this->tel = $tel;
        //$this->tab_association = new array();
        $this->nbr_associations = 0;
    }*/
    //Getters
    public function getid(){
        return $this->id;
    }
     public function getusername(){
        return $this->username;
    }
     public function getpassword(){
        return $this->password;
    }
     public function getnom(){
        return $this->nom;
    }
     public function getprenom(){
        return $this->prenom;
    }
     public function getemail(){
        return $this->email;
    }
     public function getadresse(){
        return $this->adresse;
    }
     public function gettel(){
        return $this->tel;
    }
    //Setters
    public function setid($id){
        $this->id = $id;
    }
    public function setusername($username){
        $this->username = $username;
    }
    public function setpassword($password){
        $this->password = $password;
    }
    public function setnom($nom){
        $this->nom = $nom;
    }
    public function setprenom($prenom){
        $this->prenom = $prenom;
    }
    public function setemail($email){
        $this->email = $email;
    }
    public function setadresse($adresse){
        $this->adresse = $adresse;
    }
    public function settel($tel){
        $this->tel = $tel;
    }
    
    public function est_adherent($id){
        include('connexion/connect.php');
        $result = $conn->query("select * from adhesions where id_user = ".$this->id);
        while($adhesion = $result->fetch()){
            if($adhesion['id_association']==$id){
                $conn = null;
                return true;
            } 
        }
        $conn = null;
        return false;
    }
}



?>