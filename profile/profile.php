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
            <a class="a-img-txt" href="">
            <img src="<?=$picture['photo_link']?>">
             <span class="a-txt c1 icon-like-comment"><img src="https://img.icons8.com/metro/26/ffffff/like.png"><img src="https://img.icons8.com/material-rounded/24/ffffff/speech-bubble-with-dots.png"></span>
            </a>
      </div> 
      <?php } ?>
  </div>
</div>

<button data-popup-ref="imgPopup">Active modale</button>
<div class="popup" data-popup-id="imgPopup" >
    <div class="popup-content">
      <div class="popup-header">
      <div class="title">Titre</div>
        <span class="btn-close" data-dismiss-popup>&times; </span>
      </div>
      <div class="popup-body">
        <h1>OKOKOK MODAL</h1>
    <div class="col-sm-4 d-flex justify-content-around image-board">
              <img src="<?=$picture['photo_link']?>"> 
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