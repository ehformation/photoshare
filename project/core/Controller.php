<?php 
class Controller {
    function render( $view, $data = array() ) {
        require_once __DIR__ . "/../views/" . $view ."View.php";
    }
}