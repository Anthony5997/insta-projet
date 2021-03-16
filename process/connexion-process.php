<?php 
session_start();
include("../partials/sql_connect.php");
if (isset($_POST['mailVerif']) && !empty($_POST['mailVerif']) && isset($_POST['passVerif']) && !empty($_POST['passVerif'])){
    $pseudoVerif = $_POST['mailVerif'];
    $passVerif = $_POST['passVerif'];
    $salt = "gHk45=)-('$^ùmm";
    $passCrypt = sha1(sha1($passVerif).$salt); 
    $result = $bdd->prepare('SELECT id, pseudo, pwd, email FROM users WHERE pseudo= :pseudo');
    $result->bindValue(':pseudo', $pseudoVerif, PDO::PARAM_STR);  
    $result->execute();

    $users = $result->fetchAll(PDO::FETCH_ASSOC);
    if ($users) {
        foreach($users as $user){
            $pseudoBdd = $user['pseudo'];
            $passBdd = $user['pwd']; 
            $idUser = $user['id'];
            $emailUser = $user['email'];
        }   
        if( strtolower($pseudoVerif) == strtolower($pseudoBdd) && $passCrypt == $passBdd) {
            $_SESSION['user'] = $pseudoVerif;
            $_SESSION['pwd'] = $passCrypt;
            $_SESSION['id'] = $idUser;
            $_SESSION['email'] = $emailUser;
            $_SESSION['connect'] = 1;
            header("Location: ../profile/profile.php?id=".$_SESSION['id']."&message=Connexion réussis.");
        }else{
            header("Location: ../index.php?message=Identifiants ou mot de passe incorrecte.");
        }
    }else{
        header("Location: ../index.php?message=L'utilisateur est inconnue");
    }
}else{
    header("Location: ../index.php?message=Veuiller remplir les champs pour vous.");
}