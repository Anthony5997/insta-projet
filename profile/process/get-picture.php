<?php
include("../../partials/sql_connect.php");
$queryGetPhotos = "SELECT * 
                    FROM photos 
                    WHERE id = ?";

$queryGetComments= "SELECT * 
                    FROM comments 
                    JOIN users
                    ON comments.idUser = users.id
                    WHERE comments.idPhoto = ?
                    ORDER BY comments.comment_date ASC";

$getPhoto = $bdd->prepare($queryGetPhotos);
$getPhoto->execute([
    $_POST['id']
]);
$pictureUser = $getPhoto->fetch(PDO::FETCH_ASSOC);


$getComments = $bdd->prepare($queryGetComments);
$getComments->execute([
    $pictureUser['id']
]);
$comments = $getComments->fetchAll(PDO::FETCH_ASSOC);


$array = [$pictureUser,$comments];


echo json_encode($array);