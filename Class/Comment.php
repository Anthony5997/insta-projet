<?php 

class Comment{


    private int $id;
    private string $content;
    private string $comment_date;
    private int $id_picture;
    private int $id_user_comment;

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
    
    public function getContent(){
        return $this->content;
    }

    public function getComment_date(){
        return $this->comment_date;
    }

    public function getId_picture(){
        return $this->id_picture;
    }

    public function getId_user_comment(){
        return $this->id_user_comment;
    }




    /*SETTER*/ 

    public function setId(int $id){
        $this->id = $id;
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function setComment_date($comment_date){
        $this->comment_date = $comment_date;
    }

    public function setId_picture($id_picture){
        $this->id_picture = $id_picture;
    }

    public function setId_user_comment($id_user_comment){
        $this->id_user_comment = $id_user_comment;
    }

}
