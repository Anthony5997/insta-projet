<?php
require("../Class/Autoload.php");
session_start();
if(!isset($_SESSION['user'])){
  header("Location: /insta-projet/sign-up.php");
}
include("../partials/sql_connect.php");
Autoloader::register();
$visitedMail = $_GET['mail'];
$userManager = new UserManager($bdd);
$picturesManager = new PictureManager($bdd);
$followManager = new FollowManager($bdd);
$dataUser = $userManager->getUserByMail($_SESSION['userMail']);
$currentUser = new User($dataUser);
$_SESSION['user'] = $currentUser;
$userVisitedInfo = $userManager->getUserByMail($visitedMail);
$userVisited = new User($userVisitedInfo);
$allPictures = $picturesManager->getPictureByUser($userVisited);
$followStatus = $followManager->checkFollow($currentUser, $userVisited);
var_dump($followStatus);
if($currentUser->getEmail() === $visitedMail){
  header("Location: /insta-projet/profile/profile.php");
}
include("../partials/header.php");
include("top-profile-user.php");
?>
<div class="tableau">
  <h5> <img src="https://img.icons8.com/fluent-systems-regular/24/000000/rubiks-cube.png" /> PUBLICATIONS</h5>
</div>
<?php if($userVisited->getPrivate_account() === true && $followStatus === false){?>
  <p class="lead text-center mt-5">Cet utilisateur à un compte privé. Pour accéder à ces publications, vous devez le suivre.</p>
<?php }else{?>
<div class="container container-padding">
  <div class="row">
  <?php foreach($allPictures as $picture){?>
  <?php 
  $picture = new Picture($picture);?>
    <div class="col-md-6 col-sm-12 col-lg-4 d-flex divpictures">
            <a id="<?= $picture->getId()?>" data-popup-ref="imgPopup" class="a-img-txt modalCall">
              <img class="pictures" id="<?= $picture->getId()?>" src="<?=$picture->getPhoto_link()?>">
              <span id="<?= $picture->getId()?>" class="a-txt c1 icon-like-comment"><img id="<?= $picture->getId()?>"  src="https://img.icons8.com/metro/26/ffffff/like.png"><img id="<?= $picture->getId()?>" src="https://img.icons8.com/material-rounded/24/ffffff/speech-bubble-with-dots.png"></span>
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
              <div class="row">
                <div class="col-6">
                  <img class="profil-picture-modal"src="">
                  <p class="p-modal"></p>
                </div>
                <div class="col-6">
                  <div id="" class="like-heart">❤️</div>
                </div>
              </div>
              <h1></h1>
              <div class="d-flex flex-column">
              <div class="form-comment form-control">
              <div class="comment-list form-control">
            
              </div>
                <div class="form-comment d-flex ">
                  <div class="form-control align-self-end form-modal">
                    <input class="form-control" id="content"type="text" name="content" placeholder="Laissez un commentaire">
                    <input type="hidden" id="id_user_comment" name="id_user_comment" value="<?= $currentUser->getId();?>">
                    <input class="id-dynamique" id="id_picture" type="hidden" name="id_picture" value="">
                    <button class="btn btn-primary sendComment" onclick="SendMessage()">Posté</button>
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
</div>
<!-- FIN MODAL -->
<?php 
}
include("../partials/footer.php");
?>