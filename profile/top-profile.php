<div class="container">
    <div class="row">
        <br><br><br><br>
        <div class="col-sm-4 image-profil">
            <img class="image-profil" width="150" height="150" src="<?= empty($picturesUser[0]['photo_link']) ? '/insta-projet/assets/img/default-avatar.jpg' : $picturesUser[0]['photo_link'] ?>">
            <!-- TEST-->
            <div class="">
                <div class="upload-image">
                    <input type='file' class="imgInp" data-id='img1' />
                </div>
                <br>
                <img id="img1" src="https://i.imgur.com/zAyt4lX.jpg" alt="your image" height="120" />
            </div>
            <!-- TEST-->
        </div>
        <div class="col-sm-8">
            <div class="row">
                <div>
                    <b><?= $currentUser->getName() ?> <img src="https://img.icons8.com/ultraviolet/20/000000/approval.png"></b>
                </div>
                <div class="col-sm-4">
                    <?= empty($resultNbrPubli[0]) ? '0' : $resultNbrPubli[0] ?> Publication
                </div>
                <div class="col-sm-4">
                    Follow
                </div>
                <div class="col-sm-4">
                    abonnement
                </div>
            </div>
        </div>
    </div>
</div>