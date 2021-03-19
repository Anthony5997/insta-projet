<?php
if (session_status() != 2) {
    
    session_start();
}
require("../../partials/sql_connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $comment = htmlentities($_POST['comment-area']); 
    $idPhoto = $_POST['idPhoto'];
    $idUser = $_POST['idUser'];

    $newComment = $bdd->prepare('INSERT INTO comments(content, idPhoto, idUser)
                                VALUES(?, ?, ?)');
    $newComment->execute(array(
        $comment,
        $idPhoto,
        $idUser
    ));
}
header("Location: ../profile.php?message=Commentaire posté");