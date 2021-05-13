<?php
session_start();
include("../partials/sql_connect.php");
require("../Class/Autoload.php");
Autoloader::register();
$userManager = new UserManager($bdd);
$picturesManager = new PictureManager($bdd);
$dataUser = $userManager->getUserByMail($_SESSION['userMail']);
$currentUser = new User($dataUser);
$allPictures = $picturesManager->getAllPictures();
$_SESSION['user'] = $currentUser;
include("../partials/header.php");
?>
        <div class="ajouter">
        <h6> Télécharger votre photo </h6>
<form action="process/upload-img.php" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-input" id="fileUpload">
                    </div>
                    <div class="custom-file">
                        <input type="hidden" name="id_user" value="<?=$currentUser->getId()?>" id="id_user">
                    </div>
                    <div class="custom-file">
                        <input type="hidden" name="profil-picture" value="<?=$currentUser->getId()?>" id="id_user">
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit"><img src="https://img.icons8.com/material-sharp/24/000000/download--v2.png"/></button>
                    </div>
                </div>
</form>          
</div>
<div class="form-group">
    <a href="profile.php" ><button id="commentButton" class="btn btn-primary text-center" type="button">Retour</button></a>
</div>
<?php

include '../partials/footer.php';

?>