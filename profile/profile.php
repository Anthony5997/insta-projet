<?php
require("../Class/Autoload.php");
session_start();
include("../partials/sql_connect.php");
Autoloader::register();
$userManager = new UserManager($bdd);
$picturesManager = new PictureManager($bdd);
$dataUser = $userManager->getUserByMail($_SESSION['userMail']);
$currentUser = new User($dataUser);
$allPictures = $picturesManager->getPictureByUser($currentUser);
$_SESSION['user'] = $currentUser;
include("../partials/header.php");
include("top-profile.php");
?>
<div class="tableau">
  <h5> <img src="https://img.icons8.com/fluent-systems-regular/24/000000/rubiks-cube.png" /> PUBLICATIONS</h5>
</div>
<div class="container container-padding">
  <div class="row">
  <?php foreach($allPictures as $picture){?>
  <?php 
  $picture = new Picture($picture);?>
    <div class="col-sm-4 d-flex image-board">
            <a id="<?= $picture->getId()?>" data-popup-ref="imgPopup" class="a-img-txt modalCall">
              <img id="<?= $picture->getId()?>" src="<?=$picture->getPhoto_link()?>">
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
              <img class="profil-picture-modal"src="/insta-projet/assets/img/jacouille.jpeg">
              <p>Name</p>
              <h1></h1>

            </div>
          </div> 
        </div>
        </div>
      </div>
    </div>
</div>
<!-- FIN MODAL -->
<?php 
include("../partials/footer.php");
?>