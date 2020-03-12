<?php

namespace App\Model;

class Comment
{
    //ATTRIBUTES CLASS

    private $com_id;
    private $post_id;
    private $us_id;
    private $com_date;
    private $publish; //boolean

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }         
      


    //GETTERS

    public function com_id() {
       return $this->$com_id;
    }

    public function blog_id() {
        return $this->$blog_id;
    }

    public function us_id() {
        return $this->$us_id;
     }
 
    public function com_date() {
        return $this->$com_date;
    }
    public function publish() {
        return $this->$publish;
    }

    //SETTERS

    public function setCom_id() {
        $this->com_id = $com_id;
    }

    public function setBlog_id() {
        $this->blog_id = $blog_id;
    }

    public function setUs_id() {
        $this->us_id = $us_id;
     }

    public function setCom_date() {
        $this->com_date = $com_date;
    }
    public function setPublish() {
        $this->publish = $publish;
    }
  
}