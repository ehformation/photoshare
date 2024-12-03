<?php 
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/UserModel.php';

class AuthController extends Controller{

    function login(){
        $this->render('login');
    }

    function register() {
        if(isset($_POST["inscription"])){
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = trim($_POST['pass']);
            
            $errors = [];
            $errors = $this->validateInput($username, $email, $password);

            if($errors === true){
                $userModel = new UserModel();
                $response = $userModel->register($username, $email, $password);
                if($response){
                    header("Location: ?action=login&entity=auth");
                    exit;
                }
            }
        }

        $data = [];
        if (!empty($errors)) {
            $data['errors'] = $errors; 
        }

        $this->render('register', $data);
    }

    private function validateInput($username, $email, $password) {
        $errors = [];

        if(empty($username)) {
            $errors[] = "Le nom d'utilisateur est requis.";   
        }
        if(empty($email)) {
            $errors[] = "L'email est requis.";   
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'email n'est pas valide.";
        }
        if(empty($password)) {
            $errors[] = "Le mot de passe est requis.";   
        }

        if(!empty($errors)){
            return $errors;
        }

        return true;

    }
}