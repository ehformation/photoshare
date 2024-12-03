<?php
require_once __DIR__ . '/../core/Controller.php';

class HomeController extends Controller {
    function index() {
        $this->render('home');
    }
}