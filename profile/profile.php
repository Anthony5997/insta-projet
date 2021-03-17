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
  <?php foreach($picturesUser as $picture){?>
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
        <span class="btn-close" data-dismiss-popup>&times;</span>
      </div>
      <div class="popup-body">
        <div class="row">
          <div class="col-sm-8">
                  <img class="img-modal" src="<?=$picture['photo_link']?>"> 
          </div> 
          <div class="col-sm-4 popup-body-comment"> 
                  COMMENTAIRES
          </div> 
        </div>
      </div>
      <div class="popup-footer">
      <button class="btn-close" data-dismiss-popup>Close</button>
      </div>
    </div>

</div>



<?php 
include("../partials/footer.php");
?>