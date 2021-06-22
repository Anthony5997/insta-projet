<?php 
session_start();
include("../partials/sql_connect.php");
require("../Class/Autoload.php");
Autoloader::register();
if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['pass']) && !empty($_POST['pass'])){
    $user = new User($_POST);
    $userManager = new UserManager($bdd);
    if($userManager->userExist($user) === true){
        $userManager->createUser($user);
        $_SESSION['userMail'] = $user->getEmail();
            header("Location: ../profile/profile.php?id=".$user->getId()."&message=Compte crée.");
        }else{
            header("Location: ../sign-up.php?message=L'utilisateur existe déjà.");
        }
}else{
    header("Location: ../sign-up.php?message=Veuiller remplir les champs pour vous.");
}
?>