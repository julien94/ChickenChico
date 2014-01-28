<?php

class controleur {
    
    private $data = array();
    private $msg = array();
    private $userCsv;
    
    public function set($value){
        $this->data = array_merge($this->data, $value);
    }
    
    public function add($value){
        $this->data[] = $value;
    }
    
    public function setMsg($message){
        $this->msg[] = $message;
    }
    
    public function render($way){
        extract($this->msg);
        extract($this->data);
        require (ROOT.'vue/'.$way.'.php');
        
    }
    
    public function checkField($string){
        return true;
    }
    
    public function checkUser($email, $pwd){
        $this->userCsv = new userCsv();
        if($this->userCsv->getPseudo() !== $email || $this->userCsv->getPwd() !== $pwd){return FALSE;}
        else{return true;}
    }
    
    
}

