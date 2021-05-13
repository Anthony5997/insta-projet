<div class="container">
    <div class="row">
        <br><br><br><br>
        <div class="col-sm-4 image-profil">
            <img class="image-profil" width="150" height="150" src="<?= empty($currentUser->getProfile_picture()) ? '/insta-projet/assets/img/default-avatar.jpg' : $currentUser->getProfile_picture() ?>">
        </div>
        <div class="col-sm-8">
            <div class="row">
                <div>
                    <b><?= $currentUser->getName() ?> <img src="https://img.icons8.com/ultraviolet/20/000000/approval.png"></b>
                </div>
                <div class="col-sm-4">
                    <?= empty($userManager->publicationCounter($currentUser)[0]) ? '0' : $userManager->publicationCounter($currentUser)[0] ?> Publication
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