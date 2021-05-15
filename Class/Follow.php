<?php 

class Follow{


    private int $id_user_follower;
    private int $id_user_followed;

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

      /****GETTER ********/

      public function getId_user_follower(){
        return $this->id_user_follower;
    }
    
    public function getId_user_followed(){
        return $this->id_user_followed;
    }

        /*SETTER*/ 

    public function setId_user_follower(int $id_user_follower){
        $this->id_user_follower = $id_user_follower;
    }

    public function setId_user_followed(int $id_user_followed){
        $this->id_user_followed = $id_user_followed;
    }

}