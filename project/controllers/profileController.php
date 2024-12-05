<?php 
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/UserModel.php';

class ProfileController extends Controller{
    function index() {
        $user_id = $_SESSION['user']['id'];

        $userModel = new UserModel();
        $user = $userModel->getUserById($user_id);

        $this->render('profile', ['user' => $user]);
    }
}