<div class="container">
    <div class="row">
        <br><br><br><br>
        <div class="col-sm-4 image-profil">
            <img class="image-profil" width="150" height="150" src="<?= empty($userVisited->getProfile_picture()) ? '/insta-projet/assets/img/default-avatar.jpg' : $userVisited->getProfile_picture() ?>">
        </div>
        <div class="col-sm-8">
            <div class="row">
                <div>
                    <b><?= $userVisited->getName() ?> <img src="https://img.icons8.com/ultraviolet/20/000000/approval.png"></b>
                </div>
                <div class="col-sm-4">
                    <?= empty($userManager->publicationCounter($userVisited)[0]) ? '0' : $userManager->publicationCounter($userVisited)[0];?> 
                    Publication
                </div>
                <div class="col-sm-4">
                    Follow
                </div>
                <div class="col-sm-4">
                    abonnement
                </div>
                <div class="col-12">
                <br>
                    <button class=" col-sm-12 btn btn-primary">Follow</button>
                </div>
            </div>
        </div>
    </div>
</div>