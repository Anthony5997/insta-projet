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