<div class="container">
    <div class="row">
        <br><br><br><br>
        <div class="col-sm-4">
            <img class="image-profil" width="150" height="150" src="/insta-projet/assets/img/jacouille.jpeg">
        </div>
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-4">
                    <?=$resultNbrPubli[0]?> Publication
                </div>
                <div class="col-sm-4">
                    Follow
                </div>
                <div class="col-sm-4">
                    abonnement
                </div>
                <br><br><br><br>
                <form action="process/upload-img.php" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-input" id="fileUpload">
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Button</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <?php /*var_dump("RESULTAT QUERY DE LA PHOTO DE PROFIL =", $picturesUser["photo_link"]);
            var_dump("INFO DE SESSION =", $_SESSION);
            var_dump("RESULTAT QUERY NOMBRE DE PUBLICATION =", $resultNbrPubli);*/?>

</div>
</div>