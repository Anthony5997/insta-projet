<?php
include("../../partials/sql_connect.php");
$queryGetPhotos = "SELECT * 
                    FROM photos 
                    JOIN comments 
                    ON photos.id = comments.idPhoto
                    JOIN users
                    ON photos.idUsers = users.id
                    WHERE photos.id = ?
                    ORDER BY comments.comment_date ASC";

$getPhoto = $bdd->prepare($queryGetPhotos);
$getPhoto->execute([
    $_POST['id']
]);
$pictureUser = $getPhoto->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($pictureUser);
