<?php 
 class User{
     private $conn;
     public function __construct($db){
        $this->conn=$db;
     }

     public function registre($nom, $email, $password){
        $sql="INSERT into table utilisateur (nom,email,password) VALUES(:nom,:email,:password)";
        $stmt=$this->conn->prepare($sql);
        return $stmt->execute([
            "nom"=>$nom,
            "email"=>$email,
            "password"=>$password
        ]);
     }
    public function login($email,$password){
        
    }

     
 } 













?>