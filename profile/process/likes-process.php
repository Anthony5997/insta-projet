<?php
require("../../Class/Autoload.php");
session_start();
require("../../partials/sql_connect.php");
Autoloader::register();
if(isset($_POST['idPicture'])){
    var_dump('$currentUser');

    $pictureCliked = $_POST['idPicture'];

    $userManager = new UserManager($bdd);
    $likeManager = new LikeManager($bdd);
    $pictureManager = new PictureManager($bdd);
    $picture = new Picture($pictureManager->getPictureById($pictureCliked));

    $dataUser = $userManager->getUserByMail($_SESSION['userMail']);

    $currentUser = new User($dataUser);
    $_SESSION['user'] = $currentUser;    
    if( $likeManager->checkLike($currentUser, $picture) === false){
        $likeManager->like($currentUser, $picture);
    }else{
        $likeManager->unLike($currentUser, $picture);
    }
}
