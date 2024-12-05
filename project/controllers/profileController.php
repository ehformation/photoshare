<?php 
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/UserModel.php';

class ProfileController extends Controller{
    function index() {
        $this->render('profile');
    }
}