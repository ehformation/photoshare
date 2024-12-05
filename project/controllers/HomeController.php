<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../core/Helper.php';
require_once __DIR__ . '/../models/PostModel.php';
require_once __DIR__ . '/../models/LikeModel.php';

class HomeController extends Controller {
    function index() {
        if(isset($_SESSION['user'])){
            $postModel = new PostModel();
            $posts = $postModel->getAllPosts();

            $likeModel = new LikeModel();
            
            $helper = new Helper();

            foreach($posts as &$post){
                $post['last_updated'] = $helper->calculateLastUpdated($post['created']);

                $post['nbr_likes'] = $likeModel->countLikesByPostId($post['id']);

                $post['alreadyLike'] = $likeModel->userAlreadyLike($post['id'], $_SESSION['user']['id']);
                /**
                 * [
                 * 0=>[ 'username' => 'alice', 'nom_prenom' => 'Alice Galtier'], 
                 * 1=>[ 'username' => 'john_doe', 'nom_prenom' => '']
                 * ]
                 * 
                 */
                $post['userThatLiked'] = $likeModel->userThatLiked($post['id'], 3);
                
                $cleanUserList = [];
                foreach ($post['userThatLiked'] as $userLiked) {
                    $cleanUserList[] = !empty($userLiked['nom_prenom']) ? $userLiked['nom_prenom'] : $userLiked['username'];
                }
                $post['userThatLiked'] = $cleanUserList;
                
                
                /**
                 * [
                 * 0=>[ 'Alice Galtier'], 
                 * 1=>[ 'john_doe']
                 * ]
                 * 
                 */
            }
            
            $this->render('home', ['posts' => $posts]);
        }else{
            header("Location: index.php?action=login&entity=auth");
            exit;
        }
    }
}