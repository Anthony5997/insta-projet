<?php
include '../partials/header.php';
?>
        <div class="ajouter">
        <h6> Télécharger votre photo </h6>
<form action="process/upload-img.php" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-input" id="fileUpload">
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit"><img src="https://img.icons8.com/material-sharp/24/000000/download--v2.png"/></button>
                    </div>
                </div>
            
</div>
<div class="insta">
<img src="../assets/img/chiffres-instagram.jpg">
</div>
<div class="form-group">
    <a href="profile.php" ><button id="commentButton" class="btn btn-primary text-center" type="button">Retour</button></a>
</div>
<?php

include '../partials/footer.php';

?>