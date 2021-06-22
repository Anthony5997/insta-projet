<?php
class PictureManager
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

  public function createPhotoLink(Picture $picture)
 { 
   $insertPhotoLink = $this->pdo->prepare('INSERT INTO photos(photo_link,id_user) 
  VALUES(:photo_link, :id_user)');
   $insertPhotoLink->bindValue(':photo_link', $picture->getPhoto_Link(),PDO::PARAM_STR);
   $insertPhotoLink->bindValue(':id_user', $picture->getId_user(), PDO::PARAM_INT);
   $insertPhotoLink->execute();
   }




     /*****************************DELETE************************************************************/
  public function deleteImage($id)
  { 
     
    $deletePhoto = $this->pdo->prepare('DELETE FROM photos WHERE id = :id');
    $deletePhoto->bindValue(':id', $id, PDO::PARAM_INT);
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
     // List image by destination // 
  public function getImageByDestination($idDestination)
  {
    $ImageByDestination = [];
    
    $allgetImageByDestination = $this->pdo->prepare('SELECT * FROM  photos
    WHERE id_destination = :id_destination ');
    $allgetImageByDestination->bindValue(':id_destination', $idDestination ,PDO::PARAM_INT);
    $allgetImageByDestination->execute();
    
    while ($donneesImageByDestination = $allgetImageByDestination->fetch(PDO::FETCH_ASSOC))
    {
      array_push($ImageByDestination, new Picture ($donneesImageByDestination)); 
  
    }

    return $ImageByDestination;
  }

  public function getPictureByUser(User $user){
    $pictureStatement = $this->pdo->prepare("SELECT photos.*, users.name 
    FROM photos 
    JOIN users 
    ON photos.id_user = users.id 
    WHERE users.id = ?
    ORDER BY photos.add_date 
    DESC");

      $pictureStatement->execute([
          $user->getId()
      ]);
      return $picturesUser = $pictureStatement->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getPictureById($id){
    $pictureStatement = $this->pdo->prepare("SELECT * FROM photos WHERE id =:id");
    $pictureStatement->bindValue("id", $id);
    $pictureStatement->execute();
    return $pictureStatement->fetch(PDO::FETCH_ASSOC);
  }

  public function getAllPictures(){
    $pictureStatement = $this->pdo->prepare("SELECT * FROM photos ORDER BY photos.add_date 
    DESC");;
    $pictureStatement->execute();
    return $allPictureUser = $pictureStatement->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getAllPicturesFollowed($id){
    $pictureStatement = $this->pdo->prepare(
      "SELECT photos.*, follow.id_user_followed
      FROM photos 
      JOIN users
      JOIN follow
      ON id_user_follower = users.id
      WHERE follow.id_user_follower = :id  AND photos.id_user = follow.id_user_followed
      ORDER BY photos.add_date DESC");
    $pictureStatement->bindValue("id" , $id);
    $pictureStatement->execute();
    return $pictureStatement->fetchAll(PDO::FETCH_ASSOC);
  }
}