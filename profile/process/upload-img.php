<?php
session_start();
require("../../partials/sql_connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){

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

            if(file_exists("../../assets/img/" . $_FILES["photo"]["name"])){
                header("Location: ../profile.php?message=".$_FILES["photo"]["name"] . " existe déjà.");
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "../../assets/img/" . $_FILES["photo"]["name"]);
                $path = "/insta-projet/assets/img/". $_FILES['photo']['name'];
                $addImg = $bdd->prepare("INSERT INTO photos(photo_link, idUsers)
                VALUE(?, ?)");
                $addImg->execute([
                    $path,
                    $_SESSION['id']
                    ]);
                } 
                header("Location: ../profile.php?message=Votre fichier a été téléchargé avec succès.");
        } else{
            header("Location: ../profile.php?message=Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."); 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
}
?>