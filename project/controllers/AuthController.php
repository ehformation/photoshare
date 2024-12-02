<?php 
require_once __DIR__ . '/../core/Controller.php';

class AuthController extends Controller{

    function login(){
        $this->render('login');
    }
}