<?php
require("../../Class/Autoload.php");
session_start();
require("../../partials/sql_connect.php");
Autoloader::register();
$commentManager = new CommentManager($bdd);
$arrayComment = $commentManager->getCommentAndUserInfoByPicture(intval($_POST['id']));

echo json_encode($arrayComment);