<?php
session_start();
include("../partials/sql_connect.php");
require("../Class/Autoload.php");
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
    <div class="col-sm-4 d-flex justify-content-around image-board">
            <a id="<?= $picture->getId()?>" data-popup-ref="imgPopup" class="a-img-txt modalCall">
              <img id="<?= $picture->getId()?>" src="<?=$picture->getPhoto_link()?>">
              <span id="<?= $picture->getId()?>" class="a-txt c1 icon-like-comment"><img id="<?= $picture->getId()?>"  src="https://img.icons8.com/metro/26/ffffff/like.png"><img id="<?= $picture->getId()?>" src="https://img.icons8.com/material-rounded/24/ffffff/speech-bubble-with-dots.png"></span>
            </a>
          </div> 
      <?php } ?>
  </div>
</div>
<?php 
include("../partials/footer.php");
?>