<?php 
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/UserModel.php';

class AuthController extends Controller{

    function login(){
        $this->render('login');
    }

    function register() {
        if(isset($_POST["inscription"])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['pass'];
            
            $userModel = new UserModel();
            $response = $userModel->register($username, $email, $password);
            if($response){
                header("Location: ?action=login&entity=auth");
                exit;
            }

        }
        $this->render('register'); 
    }
}