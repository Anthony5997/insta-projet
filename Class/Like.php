<?php 

class Follow{


    private int $id_user_like;
    private int $id_picture_liked;

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

      public function getId_user_like(){
        return $this->id_user_like;
    }
    
    public function getId_picture_liked(){
        return $this->id_picture_liked;
    }

        /*SETTER*/ 

    public function setId_user_like(int $id_user_like){
        $this->id_user_like = $id_user_like;
    }

    public function setId_picture_liked(int $id_picture_liked){
        $this->id_picture_liked = $id_picture_liked;
    }

}