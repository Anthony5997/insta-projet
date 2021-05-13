<?php
  require("../../partials/sql_connect.php");
  require("../../Class/Autoload.php");
  Autoloader::register();
    $pictureManager = new PictureManager($bdd);
    $userManager = new UserManager($bdd);
    $currentUser = $userManager->getUserById(intval($_POST['id_user']));
    $currentUser = new User($currentUser);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["add-picture"])){

        if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filename = $_FILES["photo"]["name"];
                $filetype = $_FILES["photo"]["type"];
                $filesize = $_FILES["photo"]["size"];
                
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

                $maxsize = 5 * 1024 * 1024;
                if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");
                
                if(in_array($filetype, $allowed)){

                    if(file_exists("/insta-projet/assets/img/" . $_FILES["photo"]["name"])){
                        header("Location: /insta-projet/profile/ajouter-photos.php?message=".$_FILES["photo"]["name"] . " existe déjà.");
                    } else{
                        move_uploaded_file($_FILES["photo"]["tmp_name"], "../../assets/img/" . $_FILES["photo"]["name"]);
                        $path = "/insta-projet/assets/img/". $_FILES['photo']['name'];
                        $picture = new Picture(["photo_link" => $path, "id_user"=>$currentUser->getid()]);
                        $pictureManager->createPhotoLink($picture);
                        } 
                        header("Location: /insta-projet/profile/profile.php?message=Votre fichier a été téléchargé avec succès.");
                } else{
                    header("Location: /insta-projet/profile/ajouter-photos.php?message=Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."); 
                }
        }else{
            echo "Error: " . $_FILES["photo"]["error"];
        }

    }else{

        if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = $_FILES["photo"]["name"];
            $filetype = $_FILES["photo"]["type"];
            $filesize = $_FILES["photo"]["size"];
            
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

            $maxsize = 5 * 1024 * 1024;
            if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");
            
            if(in_array($filetype, $allowed)){

                if(file_exists("/insta-projet/assets/img/" . $_FILES["photo"]["name"])){
                    header("Location: /insta-projet/profile/ajouter-photos.php?message=".$_FILES["photo"]["name"] . " existe déjà.");
                } else{
                    move_uploaded_file($_FILES["photo"]["tmp_name"], "../../assets/img/" . $_FILES["photo"]["name"]);
                    $path = "/insta-projet/assets/img/". $_FILES['photo']['name'];
                    $picture = new Picture(["photo_link" => $path, "id_user"=>$currentUser->getid()]);
                    
                    $currentUser->hydrate(["profile_picture"=>$picture->getPhoto_link()]);
                    $userManager->updateUser($currentUser);

                    } 
                    header("Location: /insta-projet/profile/profile.php?message=Votre fichier a été téléchargé avec succès.");
            } else{
                header("Location: /insta-projet/profile/ajouter-photos.php?message=Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."); 
            }
    }else{
        echo "Error: " . $_FILES["photo"]["error"];
    }

}
}
?>