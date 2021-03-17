<?php
if (session_status() != 2) {
    
    session_start();
}

$queryGetPhotos = "SELECT photos.*, users.pseudo 
                    FROM photos 
                    JOIN users 
                    ON photos.idUsers = users.id 
                    WHERE users.id = ?
                    ORDER BY photos.add_date 
                    DESC";

$queryNbrPublication = "SELECT 
                        COUNT(`photo_link`) 
                        FROM photos 
                        JOIN users 
                        ON photos.idUsers = users.id 
                        WHERE users.id = ?";


$getPhotos = $bdd->prepare($queryGetPhotos);
$getPhotos->execute([
    $_SESSION['id']
]);
$picturesUser = $getPhotos->fetchAll(PDO::FETCH_ASSOC);



$nbrPubli = $bdd->prepare($queryNbrPublication);
$nbrPubli->execute([
    $_SESSION['id']
]);
$resultNbrPubli = $nbrPubli->fetch();
 
?>