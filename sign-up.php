<?php
include("partials/header.php");
?>
<div class="container-style">
  <div class="container sign-form">
      <h1 class="text-center sign-h1">Instapasgram</h1>
      <div class="style-form">          
            <form method="post" action="process/sign-up-process.php">
            <div class="form-group">
                <input type="text" class="form-control sign-input" name="email" id="email" aria-describedby="emailHelp" placeholder="Adresse mail">
            </div>
            <div class="form-group">
                <input type="password" class="form-control sign-input" name="pass" id="pass" placeholder="Mot de passe">
            </div>
            <button type="submit" class="btn btn-primary col-sm-12 sign-input-button">Submit</button>
            </form>
      </div>
    </div>
    <div>
        <p class="container sign-form ">Vous n'avez pas de compte? <a href="/insta-projet/sign-in.php">Inscrivez-vous</a</p>
    </div>
</div>
<?php
include("partials/footer.php");
?>