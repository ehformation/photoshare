<?php 
    session_start();
    
    require_once __DIR__ . "/../core/Dispatcher.php";
    
    $dispatcher = new Dispatcher();
    $dispatcher->dispatch();
?>