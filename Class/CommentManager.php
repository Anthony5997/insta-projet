<?php
class CommentManager
{
  private $pdo;

  public function __construct(PDO $pdo)
  {
    $this->setPdo($pdo);
  }
  public function getPdo(){
      return $this->pdo; 
  }
  public function setPdo($pdo){
      $this->pdo = $pdo; 
  }

  /*******************************CREATE*********************************************************/

  public function createComment(Comment $comment)
 { 
   $insertPhotoLink = $this->pdo->prepare('INSERT INTO comments(content, id_picture, id_user_comment) 
  VALUES(:content, :id_picture, :id_user_comment)');
   $insertPhotoLink->bindValue(':content', $comment->getContent(),PDO::PARAM_STR);
   $insertPhotoLink->bindValue(':id_picture', $comment->getId_picture(), PDO::PARAM_INT);
   $insertPhotoLink->bindValue(':id_user_comment', $comment->getId_user_comment(), PDO::PARAM_INT);
   $insertPhotoLink->execute();
   }




     /*****************************DELETE************************************************************/
  public function deleteComment(Comment $id)
  { 
     
    $deletePhoto = $this->pdo->prepare('DELETE FROM comment WHERE id = :id');
    $deletePhoto->bindValue(':id', $id->getId(), PDO::PARAM_INT);
    $deletePhoto->execute();


  }
     /*****************************UPDATE************************************************************/
  public function updateProfilPhoto(Picture $picture)
  {
    $updatePhotoLink = $this->pdo->prepare('UPDATE photos SET photo_link = :photo_link WHERE id = :id');
    $updatePhotoLink->bindValue(':id', $picture->getId_user(), PDO::PARAM_INT); 
    $updatePhotoLink->bindValue(':photo_link', $picture->getPhoto_link(), PDO::PARAM_STR);       
    $updatePhotoLink->execute();
  }


     /*************************************** GET INFORMATIONS ************************************/ 
     // List comments by pictures // 
  public function getCommentByPicture($idPicture)
  {
    $commentsByPicture = [];
    
    $getAllCommentsBypicture = $this->pdo->prepare('SELECT * FROM  comments
    WHERE id_picture = :id_picture');
    $getAllCommentsBypicture->bindValue(':id_picture', $idPicture ,PDO::PARAM_INT);
    $getAllCommentsBypicture->execute();
    
    return $donneesCommentBypicture = $getAllCommentsBypicture->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getCommentByUser(User $user){
    $commentStatement = $this->pdo->prepare("SELECT comments.*, users.name 
    FROM comments 
    JOIN users 
    ON comments.id_user_comment = users.id 
    WHERE users.id = ?
    ORDER BY comments.comment_date 
    DESC");

      $commentStatement->execute([
          $user->getId()
      ]);
      return $commentsUser = $commentStatement->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getCommentById($id){
    $pictureStatement = $this->pdo->prepare("SELECT * FROM comments WHERE id =:id");
    $pictureStatement->bindValue("id", $id);
    $pictureStatement->execute();
    return $pictureStatement->fetch(PDO::FETCH_ASSOC);
  }

  public function getAllComments(){
    $pictureStatement = $this->pdo->prepare("SELECT * FROM comments  ORDER BY comments.comment_date 
    DESC");;
    $pictureStatement->execute();
    return $allPictureUser = $pictureStatement->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getCommentAndUserInfoByPicture($idPicture)
  {
    
    $getAllCommentsBypicture = $this->pdo->prepare('SELECT comments.*, users.name, users.email, users.profile_picture
    FROM comments 
    JOIN users 
    ON comments.id_user_comment = users.id 
    JOIN photos 
    ON photos.id_user = users.id 
    WHERE id_picture = :id_picture 
    GROUP BY comments.comment_date 
    DESC');
    $getAllCommentsBypicture->bindValue(':id_picture', $idPicture ,PDO::PARAM_INT);
    $getAllCommentsBypicture->execute();
    
    return $getAllCommentsBypicture->fetchAll(PDO::FETCH_ASSOC);
  }

}