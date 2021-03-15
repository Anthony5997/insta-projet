<?php   session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" />
                    <span class="input-group-text" id="search-addon">
                        <button type="button" class="btn btn-outline-primary">🔍</button>
                    </span>
                </div>
            </div>
            <?php  if(empty($_SESSION["connect"])){
            echo '<div class="d-flex justify-content-end col-sm-4">
                    <button type="button" class="btn btn-primary">Connexion</button>
                    <button type="button" class="btn btn-light"">inscription</button>
                </div>';
            }else{
                echo"<div class='session-align col-sm-4 topnav'>
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
