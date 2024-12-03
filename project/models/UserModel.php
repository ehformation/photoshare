<?php 

require_once __DIR__ . '/../core/Model.php';

class UserModel extends Model{

    function register($username, $email, $password) {
        $req = $this->pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $res = $req->execute([$username, $email, $password]);

        if($res) {
            return true;
        } else {
            return "Erreur lors de l'inscription. Veuillez réessayer.";
        }
    }

    function login($username, $password){
        $this->pdo->prepare("SELECT * FROM users WHERE (username = ? OR email = ?) AND password = ?");
        $req->execute([$username, $username, $password]);

        $user = $req->fetch(PDO::FETCH_ASSOC);

        if($user){
            $_SESSION['user'] = $user;
            return true;
        }
        return false;
    }
}