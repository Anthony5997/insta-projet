<?php

require("../../partials/sql_connect.php");
require("../../Class/Autoload.php");
Autoloader::register();
$visitedMail = $_GET['mail'];
$comment = new Comment($_POST);
$commentManager = new CommentManager($bdd);
$commentManager->createComment($comment);

header("Location: ../profile-user.php?message=Commentaire posté&mail=".$visitedMail);