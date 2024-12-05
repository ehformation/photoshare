<?php 
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/PostModel.php';

class PostController extends Controller{
    function add() {
        if(isset($_POST['poster']) && isset($_FILES['fieldImage'])){
            $user_id = $_SESSION['user']['id'];
            //image
            $imageName = $_FILES['fieldImage']['name']; //toto.jpg
            $imageTmpPath = $_FILES['fieldImage']['tmp_name']; // ../tmp/toto.jpg
            $imageSize = $_FILES['fieldImage']['size']; // 10000o
            $imageType = mime_content_type($imageTmpPath); // image/jpg

            $maxImageSize = 5 * 1024 * 1024;
            $allowedImageType = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];

            if($imageSize > $maxImageSize){
                exit("L'image est trop grande.");
            }
            if(!in_array($imageType, $allowedImageType)){
                exit("Le type de fichier n'est pas autorisé.");
            }

            $destinationPath = __DIR__ . '../assets/img/posts/' . $imageName;

            if(move_uploaded_file($imageTmpPath, $destinationPath)){
                //Envoie a la bdd
            }else{
                //Erreur
            }
        }
    }
}