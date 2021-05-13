<?php
session_start();
include("partials/sql_connect.php");
require("Class/Autoload.php");
Autoloader::register();
$userManager = new UserManager($bdd);
$picturesManager = new PictureManager($bdd);
$dataUser = $userManager->getUserByMail($_SESSION['userMail']);
$currentUser = new User($dataUser);
$allPictures = $picturesManager->getAllPictures();
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
      ?>
    <div class="col-sm-12 d-flex justify-content-center image-board-home">
                <a id="<?= $pic->getId()?>" data-popup-ref="imgPopup" class="a-img-txt modalCall">
                  <img id="<?= $pic->getId()?>" src="<?=$pic->getPhoto_link()?>">
                  <span id="<?= $pic->getId()?>" class="a-txt c1"><img width="15px" heigth="15px" id="<?= $pic->getId()?>"  src="https://img.icons8.com/metro/2/ffffff/like.png"></span>
                </a>
              </div>
    <?php } ?>
  </div>
</div>
<?php
include("partials/footer.php");
?>