<?php
require("../../partials/sql_connect.php");
require("../../Class/Autoload.php");
Autoloader::register();
  session_start();
    $userManager = new UserManager($bdd);
    $currentUser = $userManager->getUserByMail($_GET['mail']);
    $currentUser = new User($currentUser);
    $currentUser->setPrivate_account(!$currentUser->getPrivate_account());
    $userManager->updateUser($currentUser);
header("Location: /insta-projet/profile/profile.php?message=Privé update!");