<?php 
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/UserModel.php';

class AuthController extends Controller{

    function login(){
        if(isset($_POST["connexion"])){
            $username = trim($_POST['username']);
            $password = trim($_POST['pass']);

            $errors = [];
            $errors = $this->validateInput([
                'username' => $username,
                'password' => $password
            ]);


            $userModel = new UserModel();
            $response = $userModel->login($username, $password);
            
            if($response){
                header("Location: index.php?action=index&entity=home");
                exit;
            }else{
                if($errors == true)
                    $errors = array("Username/Email ou mot de passe invalide");
                else 
                    $errors[] = "Username/Email ou mot de passe invalide";
            }

        }

        $data = [];
        if (!empty($errors)) {
            $data['errors'] = $errors; 
        } 

        $this->render('login', $data);
    }

    function register() {
        if(isset($_POST["inscription"])){
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = password_hash( trim($_POST['pass']), PASSWORD_BCRYPT);
            
            $errors = [];
            $errors = $this->validateInput([
                'username' => $username,
                'email' => $email,
                'pass' => $password
            ]);

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

    private function validateInput($fields) {
        $errors = [];
    
        foreach ($fields as $field => $value) {
            switch ($field) {
                case 'username':
                    if (empty($value)) {
                        $errors['username'] = "Le nom d'utilisateur est requis.";
                    } 
                    break;
    
                case 'email':
                    if (empty($value)) {
                        $errors['email'] = "L'email est requis.";
                    } elseif (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $errors['email'] = "L'email n'est pas valide.";
                    }
                    break;
    
                case 'pass':
                    if (empty($value)) {
                        $errors['password'] = "Le mot de passe est requis.";
                    }
                    break;

                default:
                    break;
            }
        }
    
        return !empty($errors) ? $errors : true;
    }

    function logout(){
        session_destroy();
        header('Location: ?action=login&entity=auth');
        exit;
    }
    
}