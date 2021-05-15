<?php 

class UserManager{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

     /*******************************CREATE************************************/
     
    public function createUser($user){

        $CharacterStatement = $this->pdo->prepare("INSERT INTO users (name, pass, email) VALUE (:name, :pass, :email)");
        $CharacterStatement->bindValue("name", $user->getName(), PDO::PARAM_STR);
        $CharacterStatement->bindValue("pass", password_hash($user->getPass(),PASSWORD_DEFAULT), PDO::PARAM_STR);
        $CharacterStatement->bindValue("email", $user->getEmail(), PDO::PARAM_STR);
        $CharacterStatement->execute();

        $idUserCreated = (int)$this->pdo->lastInsertId();
        $user->hydrate([
            'id'=> $idUserCreated
        ]);
    }

    public function createProfilPicture(Picture $picture)
    { 
      $insertPhotoLink = $this->pdo->prepare('INSERT INTO users(profile_picture) 
     VALUES(:photo_link)');
      $insertPhotoLink->bindValue(':photo_link', $picture->getPhoto_Link(),PDO::PARAM_STR);
      $insertPhotoLink->execute();
      }

      
      /*****************************UPDATE********************************/
      
      
      public function updateUser(User $user){
          $CharacterStatement = $this->pdo->prepare('UPDATE users SET name= :name, pass=:pass, email=:email, created_at=:created_at, profile_picture =:profile_picture, private_account = :private_account WHERE id=:id');
        $CharacterStatement->bindValue("name", $user->getName(), PDO::PARAM_STR);
        $CharacterStatement->bindValue("pass", $user->getPass(), PDO::PARAM_STR);
        $CharacterStatement->bindValue("email", $user->getEmail(), PDO::PARAM_STR);
        $CharacterStatement->bindValue("created_at", $user->getCreated_at(), PDO::PARAM_STR);
        $CharacterStatement->bindValue("profile_picture", $user->getProfile_picture(), PDO::PARAM_STR);
        $CharacterStatement->bindValue("private_account", $user->getPrivate_account(), PDO::PARAM_BOOL);
        $CharacterStatement->bindValue("id", $user->getId(), PDO::PARAM_INT);
        $CharacterStatement->execute();
    }

    /*****************************DELETE**********************************/

    public function deleteUser(User $user){
        $locationStatement = $this->pdo->prepare("DELETE FROM users WHERE id= :id");
        $locationStatement->bindValue(":id", $user->getId(), PDO::PARAM_INT);
        $locationStatement->execute();
    }
    
    /*************************USER EXIST CHECK *****************************/

    public function userExist(User $user){
        $CharacterStatement = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $CharacterStatement->execute([
            $user->getEmail()
            ]);
            $result = empty($CharacterStatement->fetchColumn());
            return (bool) $result;
        }

    /*************************** GET INFORMATIONS ****************************/ 
    
    public function getUserById($param){
        if (is_int($param)) {
                $CharacterStatement = $this->pdo->prepare('SELECT * FROM users WHERE id = :id');
                $CharacterStatement->bindValue(':id', $param, PDO::PARAM_STR);  
                $CharacterStatement->execute();
                return $CharacterStatement->fetch(PDO::FETCH_ASSOC);
            }
        }
    
    public function getUserByMail($param){
        $CharacterStatement = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
        $CharacterStatement->bindValue(':email', $param, PDO::PARAM_STR);  
        $CharacterStatement->execute();
        return $CharacterStatement->fetch(PDO::FETCH_ASSOC);
    
        }
    
    public function getAllUser(){
        $CharacterStatement = $this->pdo->prepare('SELECT * FROM users');
        $CharacterStatement->execute();
        return $listUser = $CharacterStatement->fetchAll(PDO::FETCH_ASSOC);
    
        }
    
    public function publicationCounter(User $user){
        $CharacterStatement = $this->pdo->prepare("SELECT 
        COUNT(`photo_link`) 
        FROM photos 
        JOIN users 
        ON photos.id_user = users.id 
        WHERE users.id = ?");

        $CharacterStatement->execute([
        $user->getId()
        ]);
        return $publicationNumber= $CharacterStatement->fetch();

}




}