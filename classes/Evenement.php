<?php

class Evenement{
	private $id;
	private $nom;
	private $Date;
	private $description;
	private $lieu;
	private $association;
    
    public function Evenement($id,$nom,$date,$description,$lieu){
        $this->id = $id;
        $this->nom = $nom;
        $this->Date = $date;
        $this->description = $description;
        $this->lieu = $lieu;
    }
    //Getters
    public function getid(){
        return $this->id;
    }
    public function getnom(){
        return $this->nom;
    }
    public function getDate(){
        return $this->Date;
    }
    public function getdescription(){
        return $this->description;
    }
    public function getlieu(){
        return $this->lieu;
    }
    
}




?>