<?php

class controleur {
    
    private $data = array();
    private $userCsv;
    
    public function set($value){
        $this->data = array_merge($this->data, $value);
    }
    
    public function render($way){
        extract($this->data);
        require (ROOT.'vue/'.$way.'.php');
        
    }
    
    public function checkUser($email, $pwd){
        $this->userCsv = new userCsv();
        if($this->userCsv->getPseudo() !== $email || $this->userCsv->getPwd() !== $pwd){return FALSE;}
        else{
            $_SESSION['admin'] = $email;
            session_start();
            return true;}
    }
    
    
}

