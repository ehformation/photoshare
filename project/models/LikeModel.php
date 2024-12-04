<?php 

require_once __DIR__ . '/../core/Model.php';

class LikeModel extends Model{

    function countLikesByPostId($post_id) {
        $bdd = $this->pdo;
        $req = $bdd->prepare("SELECT COUNT(*) as nbr_likes FROM likes WHERE post_id = ? ");
        $res = $req->execute([$post_id]);

        $nbrLikes = $req->fetch(PDO::FETCH_ASSOC);

        return $nbrLikes['nbr_likes'] ?? 0;
    }

    function add_like($post_id, $user_id){
        $bdd = $this->pdo;

        if(!$this->userAlreadyLike($post_id, $user_id)){
            $req = $bdd->prepare("INSERT INTO likes(user_id, post_id) VALUES(?,?)");
            $res = $req->execute([$user_id, $post_id]);
    
            return $res;
        }
        return false;
    }

    function delete_like($post_id, $user_id){
        $bdd = $this->pdo;

        if($this->userAlreadyLike($post_id, $user_id)){
            $req = $bdd->prepare("DELETE FROM likes WHERE user_id = ? AND post_id= ? ");
            $res = $req->execute([$user_id, $post_id]);
    
            return $res;
        }
        return false;
    }

    function userAlreadyLike($post_id, $user_id){
        $bdd = $this->pdo;

        $req = $bdd->prepare("SELECT COUNT(*) as like_user_count FROM likes WHERE user_id = ? AND post_id = ?");
        $res = $req->execute([$user_id, $post_id]);

        $like_user_count = $req->fetch(PDO::FETCH_ASSOC);
        
        if($like_user_count['like_user_count'] > 0){
            return true;
        }
        return false;
    }
}