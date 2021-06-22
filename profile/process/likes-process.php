<?php
require("../../Class/Autoload.php");
session_start();
require("../../partials/sql_connect.php");
Autoloader::register();
$visitedMail = $_GET['mail'];
$pictureCliked = $_POST['idPicture'];
$userManager = new UserManager($bdd);
$pictureManager = new pictureManager($bdd);
$likeManager = new LikeManager($bdd);

$dataUser = $userManager->getUserByMail($_SESSION['userMail']);
$currentUser = new User($dataUser);
$_SESSION['user'] = $currentUser;
$userVisitedInfo = $userManager->getUserByMail($visitedMail);
$pictureLike = new Picture($pictureCliked);

if( $likeManager->checkLike($currentUser, $pictureCliked) === false){

    var_dump("DUMP DU CHECK SI Like", $likeManager->checkLike($currentUser, $pictureCliked));
    $likeManager->like($currentUser, $pictureCliked);
    header("Location: ../profile-user.php?message=Photo Liker&mail=".$visitedMail);
}else{
    var_dump("DUMP DU CHECK SI unlike", $likeManager->checkLike($currentUser, $pictureCliked));
    $likeManager->unLike($currentUser, $pictureCliked);
    header("Location: ../profile-user.php?message=Photo Unliker&mail=".$visitedMail);
}
