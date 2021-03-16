<?php
if (session_status() != 2) {
    
    session_start();
}

$queryGetPhotos = "SELECT * 
                    FROM photos 
                    JOIN users 
                    ON photos.idUsers = users.id 
                    WHERE users.id =".$_SESSION['id']."
                    ORDER BY photos.add_date 
                    DESC";

$queryNbrPublication = "SELECT 
                        COUNT(`photo_link`) 
                        FROM photos 
                        JOIN users 
                        ON photos.idUsers = users.id 
                        WHERE users.id =".$_SESSION['id'];


$getPhotos = $bdd->prepare($queryGetPhotos);
$getPhotos->execute();
$picturesUser = $getPhotos->fetchAll(PDO::FETCH_ASSOC);



$nbrPubli = $bdd->prepare($queryNbrPublication);
$nbrPubli->execute();
$resultNbrPubli = $nbrPubli->fetch();
 
?>