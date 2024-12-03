<?php 
class Controller {
    function render( $view, $data = array() ) {
        extract($data);
        require_once __DIR__ . "/../views/" . $view ."View.php"; 
    }
}