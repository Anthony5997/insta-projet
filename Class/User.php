<?php 

class User{


    private int $id;
    private string $name;
    private string $pass;
    private string $email;
    private string $created_at;
    private string $profile_picture;
    private bool $private_account;

    /*Methode*/

    public function __construct(array $data){
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
          $method = 'set'.ucfirst($key);

          if (method_exists($this, $method))
          {
            $this->$method($value);
          }
        }
      }

    /* GETTER */
    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getPass(){
        return $this->pass;
    }


    public function getEmail(){
        return $this->email;
    }

    public function getLink(){
        return $this->link;
    }

    public function getCreated_at(){
        return $this->created_at;
    }
    public function getProfile_picture(){
        return $this->profile_picture;
    }

    public function getPrivate_account(){
        return $this->private_account;
    }

    /*SETTER*/ 

    public function setId(int $id){
        $this->id = $id;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function setPass(string $pass){
        $this->pass = $pass;
    }

    public function setEmail( $email){
        $this->email = $email;
    }

    public function setLink($link){
        $this->link = $link;
    }

    public function setCreated_at($created_at){
        $this->created_at = $created_at;
    }

    public function setProfile_picture($profile_picture){
        $this->profile_picture = $profile_picture;
    }

    public function setPrivate_account($private_account){
        $this->private_account = $private_account;
    }
}
