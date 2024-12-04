<?php 
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/LikeModel.php';

class LikeController extends Controller{

    function add_like() {
        $post_id = $_GET['post_id'];
        $user_id = $_SESSION['user']['id']; //Je recupere l'id de l'utilisateur connecté; 
        
        $likeModel = new LikeModel();
        $res = $likeModel->add_like($post_id, $user_id);

        header("Location: index.php?action=index&entity=home");

    }
}