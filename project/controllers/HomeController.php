<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../core/Helper.php';
require_once __DIR__ . '/../models/PostModel.php';

class HomeController extends Controller {
    function index() {
        if(isset($_SESSION['user'])){
            $postModel = new PostModel();
            $posts = $postModel->getAllPosts();
            $helper = new Helper();

            foreach($posts as &$post){
                $post['last_updated'] = $helper->calculateLastUpdated($post['created']);
            }
            
            $this->render('home', ['posts' => $posts]);
        }else{
            header("Location: index.php?action=login&entity=auth");
            exit;
        }
    }
}