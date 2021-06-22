<?php 

class FollowManager{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /********CREATE  *******/

    public function follow(User $userFollower, User $userFollowed){
        $followStatement = $this->pdo->prepare("INSERT INTO follow(id_user_follower,id_user_followed) 
        VALUES(:id_user_follower, :id_user_followed)");
         $followStatement->bindValue(':id_user_follower', $userFollower->getId(),PDO::PARAM_INT);
         $followStatement->bindValue(':id_user_followed', $userFollowed->getId(), PDO::PARAM_INT);
         $followStatement->execute();
         //return $followStatement->fetch();
    }

    /********DELETE *******/

    public function unFollow(User $userFollower, User $userFollowed){
        $followStatement = $this->pdo->prepare("DELETE FROM follow  WHERE id_user_follower = :id_user_follower AND id_user_followed = :id_user_followed");
         $followStatement->bindValue(':id_user_follower', $userFollower->getId(),PDO::PARAM_INT);
         $followStatement->bindValue(':id_user_followed', $userFollowed->getId(),PDO::PARAM_INT);
         $followStatement->execute();
         //return $followStatement->fetch();
    }

    /*********CHECKFOLLOW **********/

    public function checkFollow(User $userFollower, User $userFollowed){
         $followStatement = $this->pdo->prepare("SELECT follow.id_user_follower, follow.id_user_followed FROM follow WHERE id_user_follower = :id_user_follower AND id_user_followed = :id_user_followed");
         $followStatement->bindValue(':id_user_follower', $userFollower->getId(),PDO::PARAM_INT);
         $followStatement->bindValue(':id_user_followed', $userFollowed->getId(),PDO::PARAM_INT);
         $followStatement->execute();
        return $followStatement->fetch(PDO::FETCH_ASSOC);
    }

    /**********GET INFO  **********/
    public function followingCounter(User $user){
        $followStatement = $this->pdo->prepare("SELECT COUNT(id_user_followed) FROM follow WHERE id_user_follower = :id_user_follower");
         $followStatement->bindValue(':id_user_follower', $user->getId(),PDO::PARAM_INT);
         $followStatement->execute();
        return $followStatement->fetch(PDO::FETCH_ASSOC);
    }

    public function followerCounter(User $user){
        $followStatement = $this->pdo->prepare("SELECT COUNT(id_user_follower) FROM follow WHERE id_user_followed = :id_user_followed");
         $followStatement->bindValue(':id_user_followed', $user->getId(),PDO::PARAM_INT);
         $followStatement->execute();
        return $followStatement->fetch(PDO::FETCH_ASSOC);
    }
}