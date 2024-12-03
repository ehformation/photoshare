<?php 

require_once __DIR__ . '/../core/Model.php';

class UserModel extends Model{

    function register($username, $email, $password) {
        $bdd = $this->$pdo;
        $req = $bdd->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");

        $res = $req->execute([$username, $email, $password]);
        if($res) {
            return true;
        } else {
            return "Erreur lors de l'inscription. Veuillez réessayer.";
        }
    }
}