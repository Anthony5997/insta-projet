<?php
include("partials/header.php");
include("partials/sql_connect.php");
include("profile/process/user-infos.php");
include("profile/top-profile.php");

$queryGetAllpic = "SELECT * FROM photos ORDER BY add_date DESC";

$getAllPics = $bdd->prepare($queryGetAllpic);
$getAllPics->execute();
$fetchAllPics = $getAllPics->fetchAll(PDO::FETCH_ASSOC);?>
<div class="container">
  <div class="row">
    <?php foreach ($fetchAllPics as $pic) { ?>
      
    <div class="col-sm-12 d-flex justify-content-center image-board-home">
                <a id="<?= $pic['id']?>" data-popup-ref="imgPopup" class="a-img-txt modalCall">
                  <img id="<?= $pic['id']?>" src="<?=$pic['photo_link']?>">
                  <span id="<?= $pic['id']?>" class="a-txt c1"><img width="15px" heigth="15px" id="<?= $pic['id']?>"  src="https://img.icons8.com/metro/2/ffffff/like.png"></span>
                </a>
              </div>
    <?php } ?>
  </div>
</div>
<div class="popup" data-popup-id="imgPopup" >
    <div class="popup-content">
      <div class="popup-header">
      <div class="title">Photos</div>
        <span class="btn-close" data-dismiss-popup></span>
      </div>
      <div class="popup-body" id="modalRefresh">
        <div class="row">
        <div class="name">
         <b><?=$_SESSION["user"]?></b>
         </div>
          <div class="col-sm-8 image-modal">
            <img class="img-modal" src="<?=$pic['photo_link']?>"> 
            <?php $timeStamp = $pic["add_date"];
            $timeStamp = date( "m/d/Y", strtotime($timeStamp));?>
            <p>posté le: <?=$timeStamp?></p>
          </div>
        
          <div class="col-sm-4 popup-body-comment"> 
                  
                 <h3 class="text-center">💬</h3>
            <div id="display-comments" class="display-comments"><br>
              
            </div>
          
            <div class="comments-area">
              <form class="form-group" method="post" action="process/insert-comments.php">
                <input class="form-group" type="text" id="comment-area" name="comment-area" required>
                <input type="hidden" name="idPhoto" id="modalFormIdPhoto" >
                 <input type="hidden" name="idUser" value="<?=$pic['idUsers']?>">
                <div class="form-group">
                  <button id="commentButton" class="btn btn-primary text-center" type="submit">Envoyer</button>
                </div>
              </form>
            </div>

          </div> 
        </div>
      </div>
      <div class="popup-footer">
      <button class="btn-info" data-dismiss-popup>Close</button>
      </div>
    </div>

</div>


<?php
include("partials/footer.php");
?>