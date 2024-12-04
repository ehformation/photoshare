<?php 

require_once __DIR__ . '/../core/Model.php';

class PostModel extends Model{

    function getAllPosts() {
        $bdd = $this->pdo;
        $req = $bdd->query("SELECT * FROM posts ORDER BY created DESC ");
        $posts = $req->fetchAll(PDO::FETCH_ASSOC);

        return $posts;
    }
}