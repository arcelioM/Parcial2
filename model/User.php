<?php

namespace model;

class User{

    private  int $id;
    private String $user;
    private int $edad;
    private int $numImg;

    public function __construct(int $id,String $user, int $edad,int $numImg){
        $this->id=$id;
        $this->user=$user;
        $this->edad=$edad;
        $this->numImg=$numImg;
    }

    public function __get($property){

        if(property_exists($this,$property)){
            return $this->$property;
        }
    }

    public function __Set($property,$value){
        
        if(property_exists($this,$property)){
            $this->$property=$value;
        }
    }
}
