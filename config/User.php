<?php 
 class User{
     private $conn;
     public function __construct($db){
        $this->conn=$db;
     }

     public function register($nom, $email, $password){
        $sql="INSERT into utilisateur (nom,email,password) VALUES(:nom,:email,:password)";
        $stmt=$this->conn->prepare($sql);
         $stmt->bindParam(":nom",$nom);
         $stmt->bindParam(":email",$email);
         $stmt->bindParam(":password",$password);
         if($stmt->execute()){
            return true;
         }else{
            return false;
         }
     }
    public function login($email,$password){
      $sql="SELECT id,nom, password FROM utilisateur WHERE email=:email";
      $stmt=$this->conn->prepare($sql);
      $stmt->execute(["email"=>$email]); 
      if ($stmt->rowCount()>0) {
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
         if(password_verify($password,$row['password'])){
            return $row;
         }

        
      }    
   }
   
     
 } 

?>