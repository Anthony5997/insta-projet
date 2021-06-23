<?php

require("../../partials/sql_connect.php");
require("../../Class/Autoload.php");
Autoloader::register();
$comment = new Comment($_POST);
$commentManager = new CommentManager($bdd);
$commentManager->createComment($comment);
