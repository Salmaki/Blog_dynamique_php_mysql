<?php
require_once "Database.php";

class Article{
    private $conn;
    public $id;
    public $titre;
    public $contenu;
    public $image;

    public function __construct($db){
        $this->conn = $db;
    }

    public function readAll(){
        $sql = "SELECT * FROM articles";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readById($id){
        $sql = "SELECT * FROM articles WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            "id"=>$id
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($titre, $contenu, $image){
        $sql = "INSERT INTO articles (titre, contenu, image) 
                VALUES (:titre, :contenu, :image)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            "titre"=>$titre,
            "contenu"=>$contenu,
            "image"=>$image
        ]);
    }

    public function update($id, $titre, $contenu, $image){
        $sql = "UPDATE articles 
                SET titre=:titre, contenu=:contenu, image=:image 
                WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            "id"=>$id,
            "titre"=>$titre,
            "contenu"=>$contenu,
            "image"=>$image
        ]);
    }

    public function delete($id){
        $sql = "DELETE FROM articles WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(["id"=>$id]);
    }
}
?>