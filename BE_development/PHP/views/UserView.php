<?php

class UserView implements ConexiuneFactory{
    protected $id;
    protected $pass;   
    protected $nume;
    protected $email;
  
    //log4Debug.debug("------ UserView enter ------");
    function __construct($User) {
        //log4Debug.debug("constructor UserView");
    }
    function getId() {
       return $this->id;
    }
    function setId($id) {
       $this->id = $id;
    }
}