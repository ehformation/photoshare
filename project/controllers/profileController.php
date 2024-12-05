<?php 
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/UserModel.php';

class ProfileController extends Controller{
    function index() {
        $user_id = $_SESSION['user']['id'];

        $userModel = new UserModel();
        $user = $userModel->getUserById($user_id);

        if(isset($_POST["edit"])){
            $nompre = $_POST["nompre"];
            $email = $_POST["email"];
            $tel = $_POST["tel"];

            $editUser = $userModel->editUserById($nompre, $tel, $email, $user_id);

        }
        
        $user = $userModel->getUserById($user_id);
        
        $this->render('profile', ['user' => $user]);
    }
}