<?php
require("../../Class/Autoload.php");
session_start();
require("../../partials/sql_connect.php");
Autoloader::register();
$visitedMail = $_GET['mail'];
$userManager = new UserManager($bdd);
$dataUser = $userManager->getUserByMail($_SESSION['userMail']);
$currentUser = new User($dataUser);
$_SESSION['user'] = $currentUser;
$userVisitedInfo = $userManager->getUserByMail($visitedMail);
$userVisited = new User($userVisitedInfo);
$followManager = new FollowManager($bdd);

if( $followManager->checkFollow($currentUser, $userVisited) === false){

    //var_dump("DUMP DU CHECK SI FOLLOW", $followManager->checkFollow($currentUser, $userVisited));
    $followManager->follow($currentUser, $userVisited);
    header("Location: ../profile-user.php?message=Membre Follow&mail=".$visitedMail);
}else{
    //var_dump("DUMP DU CHECK SI UNFOLLOW", $followManager->checkFollow($currentUser, $userVisited));
    $followManager->unFollow($currentUser, $userVisited);
    header("Location: ../profile-user.php?message=Membre Unfollow&mail=".$visitedMail);
}
