<?php 

class Picture{


    private int $id;
    private string $photo_link;
    private string $add_date;
    private int $id_user;

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

    public function getAdd_date(){
        return $this->add_date;
    }

    public function getPhoto_link(){
        return $this->photo_link;
    }

    public function getId_user(){
        return $this->id_user;
    }




    /*SETTER*/ 

    public function setId(int $id){
        $this->id = $id;
    }

    public function setPhoto_link($photo_link){
        $this->photo_link = $photo_link;
    }

    public function setAdd_date($add_date){
        $this->add_date = $add_date;
    }

    public function setId_user($id_user){
        $this->id_user = $id_user;
    }
}
