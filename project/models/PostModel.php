<?php 

require_once __DIR__ . '/../core/Model.php';

class PostModel extends Model{

    function getAllPosts() {
        $bdd = $this->pdo;
        $req = $bdd->query("SELECT * FROM posts ORDER BY created DESC ");
        $posts = $req->fetchAll(PDO::FETCH_ASSOC);

        return $posts;
    }
    function add_post($imageName, $legende, $user_id){
        $bdd = $this->pdo;
        $req = $bdd->prepare("INSERT INTO posts (image, legende, user_id) VALUES(?, ?, ?)");
        $res = $req-> execute([$imageName, $legende, $user_id]);

        return $res;
    }
}