<?php
if(isset($_POST['id'])):
    require(__DIR__."/../Class/Autoload.php");
    Autoloader::register();
    include(__DIR__."/../partials/sql_connect.php");
    $manager = new PictureManager($bdd);
    $commentManager = new CommentManager($bdd);
    $arrayPicture = $manager->getPictureById($_POST['id']);
    $arrayComment = $commentManager->getCommentByPicture($_POST['id']);
    $userManager = new UserManager($bdd);
    $arrayUser = $userManager->getUserById(intval($arrayPicture['id_user']));
    if ($arrayPicture) {
        echo json_encode(["user"=>$arrayUser, "picture"=>$arrayPicture, "comment"=>$arrayComment]);
    }else{

    }
    ?>
<?php endif;?>