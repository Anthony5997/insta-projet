<?php 
session_start();
include("../partials/sql_connect.php");
require("../Class/Autoload.php");
Autoloader::register();
if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pass']) && !empty($_POST['pass'])){
    $userManager = new UserManager($bdd);
    $userData = $userManager->getUserByMail($_POST['email']);
    if($userData != false){
        $user = new User($userData);
        
        if(password_verify($_POST["pass"], $user->getPass()) === true){
            $_SESSION['userMail'] = $user->getEmail();

            header("Location: ../profile/profile.php?email=".$user->getEmail()."&message=Connexion réussis.");
        }else{
            header("Location: ../sign-up.php?message=Identifiants ou mot de passe incorrecte.");
        }
    }else{
        header("Location: ../sign-up.php?message=Utilisateur inconnu.");
    }

}else{
    header("Location: ../sign-up.php?message=Veuillez remplir les champs.");
}