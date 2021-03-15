<?php   session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Norican&family=Playball&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/main.css">
    <title>instaCouille</title>
</head>
<nav class="nav-style">
    <div class="container">
        <div class="row">
            <div class="topnav col-sm-4">
                <a class="" href="index.php">INSTAGRAM</a>
            </div>
            <div class=" col-sm-4">
            </div>
            <?php  if(empty($_SESSION["connect"])){
            echo '<div class="d-flex justify-content-end col-sm-4">
                  <a href="sign-up.php"><button type="button" class="btn btn-primary">Connexion</button></a>
                  <a href="sign-in.php"><button type="button" class="btn btn-light"">inscription</button></a>
                </div>';
            }else{
                echo"<div class='col-sm-4 topnav'>
                        <p class="."button-perso".">Salut ". $_SESSION["user"]."</p> 
                        <a href="."process/deco.php".">Déconnexion</a>
                    </div>
        </div>"; 
            } 
            if(isset($_GET["message"])){
                echo'<div style="padding: 10px; width:25vw; background:green; color:#fff;">
                        '.$_GET["message"].'
                    </div>';
            }?>
        </div>
    </div>
</nav>
<body>
