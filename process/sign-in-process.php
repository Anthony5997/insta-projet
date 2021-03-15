<?php
require_once '../partials/sql_connect.php';

if (empty($_POST["pseudo"])) {
    die("paramètres manquants.");
    }
    $salt = "gHk45=)-('$^ùmm";
    $pwd_crypte = sha1(sha1($_POST['pwd']).$salt);

$insertStatement =$bdd->prepare("
    INSERT INTO users
    (pseudo,email,pwd)
    VALUES
    (?,?,?)
");
$insertStatement->execute([
    $_POST["pseudo"],
    $_POST["email"],
    $pwd_crypte
]);

header('location:../sign-in.php?message=Your are connected');
?>