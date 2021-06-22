<?php
session_start();
if(!isset($_SESSION['user'])){
  header("Location: sign-up.php");
}
include("partials/sql_connect.php");
require("Class/Autoload.php");
Autoloader::register();
$userManager = new UserManager($bdd);
$picturesManager = new PictureManager($bdd);
$dataUser = $userManager->getUserByMail($_SESSION['userMail']);
$currentUser = new User($dataUser);
$allPictures = $picturesManager->getAllPicturesFollowed($currentUser->getId());
$_SESSION['user'] = $currentUser;
include("partials/header.php");
var_dump($_SESSION);
?>
<div class="container">
  <div class="row">
    <div class="col-12 sm- button">
      <h6>Suggestion pour vous
        <button id="togg1"><img src="https://img.icons8.com/officexs/16/000000/expand-arrow.png" /></button>
      </h6>
      <div class="container cardprofile" id="d1">
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="card">
              <div class="img">
                <img src="/insta-projet/assets/img/paysage-montagne-photographe-en-herbe-1024x576.jpg">
              </div>
              <div class="info">
                <span class="name"> <?= $_SESSION["user"]->getName() ?></span>
                <span class="id">@<?= $_SESSION["user"]->getName() ?></span>
                <button class="button2">Follow</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="card">
              <div class="img">
                <img src="/insta-projet/assets/img/paysage-montagne-photographe-en-herbe-1024x576.jpg">
              </div>
              <div class="info">
                <span class="name"> <?= $_SESSION["user"]->getName() ?></span>
                <span class="id">@<?= $_SESSION["user"]->getName() ?></span>
                <button class="button2">Follow</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <?php foreach ($allPictures as $pic) { 
      $pic = new Picture($pic);
      $dataUserPics = $userManager->getUserById($pic->getId_user());
      $userPic = new User($dataUserPics);
      ?>
    <div class="col-sm-12 d-flex flex-column align-items-center image-board-home">
                <div class="row">
                  <img class=" col-6 profil-picture-modal" src="<?= $userPic->getProfile_picture();?>" alt="">
                  <a href="/insta-projet/profile/profile-user.php?mail=<?=$userPic->getEmail();?>"class="col-6 mt-3"><?= $userPic->getName();?></a>
                </div>
                <a id="<?= $pic->getId()?>" data-popup-ref="imgPopup" class="a-img-txt modalCall">
                  <img id="<?= $pic->getId()?>" class="pictures" src="<?=$pic->getPhoto_link()?>">
                  <span id="<?= $pic->getId()?>" class="a-txt c1"><img width="15px" heigth="15px" id="<?= $pic->getId()?>"  src="https://img.icons8.com/metro/2/ffffff/like.png"></span>
                </a>
              </div>
    <?php } ?>
  </div>
</div>


<!-- MODAL -->
<div class="popup" data-popup-id="imgPopup" >
    <div class="popup-content">
      <div class="popup-body" id="modalRefresh">
        <div class="d-flex flex-row-reverse">
            <span class="btn-close" data-dismiss-popup></span>
        </div>
        <div class="row">
          <div class="col-7">
            <div class="modal-picture">
              <img  class="inner-picture" src="/insta-projet/assets/img/pic1.png">


            </div>
          </div>
          <div class="col-4"> 
            <div class="modal-comment">
              <img class="profil-picture-modal"src="">
              <p class="p-modal"></p>
              <h1></h1>
              <div class="d-flex flex-column">
              <div class="form-comment form-control">
              <div class="comment-list form-control">
            
              </div>
                <div class="form-comment d-flex ">
                  <form class="form-control align-self-end form-modal" method="post" action="/insta-projet/profile/process/insert-comments.php?">
                    <input class="form-control" id="content"type="text" name="content" placeholder="Laissez un commentaire">
                    <input type="hidden" id="id_user_comment" name="id_user_comment" value="<?= $currentUser->getId();?>">
                    <input class="id-dynamique" id="id_picture" type="hidden" name="id_picture" value="">
                    <button class="btn btn-primary sendComment" >Posté</button>
                  </form>
                </div>
                </div>
              </div>
            </div>
          </div> 
        </div>
        </div>
      </div>
    </div>
</div>
<!-- FIN MODAL -->
<?php
include("partials/footer.php");
?>
