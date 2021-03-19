<div class="container">
    <div class="row">
        <br><br><br><br>
        <div class="col-sm-4">
            <img class="image-profil" width="150" height="150" src="<?= $picturesUser[0]['photo_link']?>">
        </div>
        <div class="col-sm-8">
            <div class="row">
                <div>
                    <b><?=$_SESSION["user"]?>  <img src="https://img.icons8.com/ultraviolet/20/000000/approval.png"></b>
                </div>
                <div class="col-sm-4">
                    <?=$resultNbrPubli[0]?> Publication
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