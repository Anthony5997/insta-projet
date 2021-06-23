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
    var_dump("check like after");
    
    if( $likeManager->checkLike($currentUser, $picture) === false){
        
        var_dump("like pas");
        $likeManager->like($currentUser, $picture);
    }else{
        var_dump("déjà like delete");
        $likeManager->unLike($currentUser, $picture);
    }

}
