<?php 

class LikeManager{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /********CREATE  *******/

    public function like(User $userLike, Picture $pictureLiked){
        $followStatement = $this->pdo->prepare("INSERT INTO likes(id_user_liked, id_picture_liked) 
        VALUES(:id_user_like, :id_picture_liked)");
         $followStatement->bindValue(':id_user_like', $userLike->getId(),PDO::PARAM_INT);
         $followStatement->bindValue(':id_picture_liked', $pictureLiked->getId(), PDO::PARAM_INT);
         $followStatement->execute();
         //return $followStatement->fetch();
    }

    /********DELETE *******/

    public function unLike(User $userLike, Picture $pictureLiked){
        $followStatement = $this->pdo->prepare("DELETE FROM likes  WHERE id_user_liked = :id_user_like AND id_picture_liked = :id_picture_liked");
         $followStatement->bindValue(':id_user_like', $userLike->getId(),PDO::PARAM_INT);
         $followStatement->bindValue(':id_picture_liked', $pictureLiked->getId(),PDO::PARAM_INT);
         $followStatement->execute();
         //return $followStatement->fetch();
    }

    /*********CHECKFOLLOW **********/

    public function checkLike(User $userLike, Picture $pictureLiked){
         $followStatement = $this->pdo->prepare("SELECT * FROM likes WHERE id_user_liked = :id_user_like AND id_picture_liked = :id_picture_liked");
         $followStatement->bindValue(':id_user_like', $userLike->getId(),PDO::PARAM_INT);
         $followStatement->bindValue(':id_picture_liked', $pictureLiked->getId(),PDO::PARAM_INT);
         $followStatement->execute();
        return $followStatement->fetch(PDO::FETCH_ASSOC);
    }

    /**********GET INFO  **********/
    public function likedCounter(User $user){
        $followStatement = $this->pdo->prepare("SELECT COUNT(id_picture_liked) FROM likes WHERE id_user_like = :id_user_like");
         $followStatement->bindValue(':id_user_like', $user->getId(),PDO::PARAM_INT);
         $followStatement->execute();
        return $followStatement->fetch(PDO::FETCH_ASSOC);
    }

    public function likeCounter(User $user){
        $followStatement = $this->pdo->prepare("SELECT COUNT(id_user_liked) FROM likes WHERE id_picture_liked = :id_picture_liked");
         $followStatement->bindValue(':id_picture_liked', $user->getId(),PDO::PARAM_INT);
         $followStatement->execute();
        return $followStatement->fetch(PDO::FETCH_ASSOC);
    }
}