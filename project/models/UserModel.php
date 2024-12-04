<?php 

require_once __DIR__ . '/../core/Model.php';

class UserModel extends Model{

    function register($username, $email, $password) {
        $bdd = $this->pdo;
        $req = $bdd->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");

        $res = $req->execute([$username, $email, $password]);
        if($res) {
            return true;
        } else {
            return "Erreur lors de l'inscription. Veuillez réessayer.";
        }
    }

    function login($username, $password){
        $bdd = $this->pdo;
        $req = $bdd->prepare("SELECT * FROM users WHERE (username = ? OR email = ?)");
        $res = $req->execute([$username, $username]);

        $user = $req->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password, $user['password']  )){
            $_SESSION['user'] = $user;
            return true;
        }
        return false;
    }
}