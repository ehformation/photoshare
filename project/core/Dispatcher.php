<?php 
class Dispatcher {
    function dispatch() {
        $entityName = $_GET['entity'] ?? 'auth';
        $actionName = $_GET['action'] ?? 'login';

        $entityClass = ucfirst($entityName) . 'Controller'; 
        $entityFile = __DIR__ .'/../controllers/' . $entityClass . '.php'; 
        
        if (file_exists($entityFile)) {
            require_once $entityFile;

            $entity = new $entityClass();
            if(method_exists($entity, $actionName)) {
                $entity->$actionName();
            }else{
                $this->error("La méthode '$actionName' n'existe pas sur la classe '$entityClass' .");
            }
        }else{
            $this->error("Le fichier $entityFile n'existe pas !! veillez verifier son existance.");
        }

    }

    function error($message) {
        echo "<h1>Erreur : $message </h1>";
        exit;
    }
}