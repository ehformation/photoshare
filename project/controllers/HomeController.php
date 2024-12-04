<?php
require_once __DIR__ . '/../core/Controller.php';

class HomeController extends Controller {
    function index() {
        if(isset($_SESSION['user'])){
            //Utiliser le modele PostModel pour recuperer les photo et les envoyée a la vue
            $this->render('home');
        }else{
            header("Location: index.php?action=login&entity=auth");
            exit;
        }
    }
}