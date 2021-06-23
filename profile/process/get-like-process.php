<?php
require("../../Class/Autoload.php");
session_start();
require("../../partials/sql_connect.php");
Autoloader::register();
    $userManager = new UserManager($bdd);
    $pictureManager = new PictureManager($bdd);
    $picture = new Picture($pictureManager->getPictureById($_POST['id']));
    $currentUser = $userManager->getUserByMail($_SESSION['userMail']);
    $currentUser = new User($currentUser);
    $likeManager = new LikeManager($bdd);
  
if( $likeManager->checkLike($currentUser, $picture) === false){
    echo '🖤' .  $likeManager->likeCounter($picture);
}else{
    echo '❤️' . $likeManager->likeCounter($picture);
}