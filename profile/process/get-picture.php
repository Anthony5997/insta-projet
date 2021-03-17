<?php
include("../../partials/sql_connect.php");
$queryGetPhotos = "SELECT * 
                    FROM photos 
                    WHERE photos.id = ?";

$getPhoto = $bdd->prepare($queryGetPhotos);
$getPhoto->execute([
    $_POST['id']
]);
$pictureUser = $getPhoto->fetch(PDO::FETCH_ASSOC);

echo json_encode($pictureUser);
