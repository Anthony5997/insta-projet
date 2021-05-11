<?php
include 'partials/header.php';
?>
<div class="inscription">
    <form action="process/sign-in-process.php" method="POST" class="sign">
       <h4>Instapasgram</h4> 
        <h6>Inscrivez-vous pour voir les <br>
         photos et vidéos de vos amis.</h6>
        <div class="mb-3 inscription">
            <label for="exampleInputEmail1" class="form-label"></label>
            <input type="text" class="form-control" name="name" placeholder="name">
        </div>
        <div class="mb-3 email">
    <label for="exampleInputEmail1" class="form-label"></label>
    <input type="email" class="form-control" aria-describedby="emailHelp" name="email" placeholder="email">
        </div>
        <div class="mb-3 pwd">
            <label for="exampleInputPassword1" class="form-label"></label>
            <input type="password" class="form-control" name="pass" placeholder="password">
        </div>
        <button class="btn btn-info col-sm-12" name="create" type="submit">Suivant</button>
        <p>En vous inscrivant, vous acceptez nos<br>
        <b> Conditions générales.</b> Découvrez comment<br>
         nous recueillons, utilisons et partageons vos<br>
          données en lisant notre <b>Politique d’utilisation<br>
           des données</b> et comment nous utilisons les cookies <br> 
           et autres technologies similaires en <br> consultant notre
           <b> Politique d’utilisation des <br> cookies.</b></p>
</div>
<div class="connect">
    Vous avez un compte ?<a href="process/connexion-process.php" >Connectez-vous</a>
</div>

<?php
include 'partials/footer.php';
?>