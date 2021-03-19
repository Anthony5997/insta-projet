<?php
  include("../partials/header.php");
  require("../partials/sql_connect.php");
  include("process/user-infos.php");
  include("top-profile.php");
?>
<div class="tableau">
  <h5> <img src="https://img.icons8.com/fluent-systems-regular/24/000000/rubiks-cube.png" /> PUBLICATIONS</h5>
</div>
<div class="container container-padding">
  <div class="row">
  <?php foreach($picturesUser as $key =>$picture){?>
    <div class="col-sm-4 d-flex justify-content-around image-board">
            <a id="<?= $picture['id']?>" data-popup-ref="imgPopup" class="a-img-txt modalCall">
              <img id="<?= $picture['id']?>" src="<?=$picture['photo_link']?>">
              <span id="<?= $picture['id']?>" class="a-txt c1 icon-like-comment"><img id="<?= $picture['id']?>"  src="https://img.icons8.com/metro/26/ffffff/like.png"><img id="<?= $picture['id']?>" src="https://img.icons8.com/material-rounded/24/ffffff/speech-bubble-with-dots.png"></span>
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
          <div class="col-sm-8">
            <img class="img-modal" src="<?=$picture['photo_link']?>"> 
            <?php $timeStamp = $picture["add_date"];
            $timeStamp = date( "m/d/Y", strtotime($timeStamp));?>
            <p>Posté le <?=$timeStamp?></p>
          </div>
          <div class="col-sm-4 popup-body-comment"> 
                 <h3 class="text-center">COMMENTAIRES</h3>
            <div id="display-comments" class="display-comments"><br>
              
            </div>
            <div class="comments-area">
              <form class="form-group" method="post" action="process/insert-comments.php">
                <input class="form-group" type="text" id="comment-area" name="comment-area" required>
                <input type="hidden" name="idPhoto" id="modalFormIdPhoto" >
                <input type="hidden" name="idUser" value="<?=$picture['idUsers']?>">
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
include("../partials/footer.php");
?>