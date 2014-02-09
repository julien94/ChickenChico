<?php

class controleur {
    
    private $data = array();
    private $msg = array();
    private $array;
    private $image;
    private $userDao;
    private $testUser;
    private $admin;
    
    public function set($value){
        $this->data = array_merge($this->data, $value);
    }
    
    public function addData($value){
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
    
    public function toArray($string){
        return $this->array = array($string);
    }
    
    public function checkField($type, $object){
        $this->testField = new checkField.$type();
        if($this->testField->start($object)){return true;}
    }
    
    public function checkUser($email, $pwd){
        $this->userDao = new userDao();
        if($this->userDao->getPseudo() !== $email || $this->userDao->getPwd() !== $pwd){
            $this->setMsg('Email / Password Error');
            $this->render('accueil');
        }
        else{
            $this->admin = new user($email, $pwd);
            $_SESSION['admin'] = serialize($this->admin);
            return true;
        }
    }
    
    public function checkSession(){
        if (isset($_SESSION['admin'])) {
            $this->testUser = unserialize($_SESSION['admin']);
            if (!$this->checkUser($this->testUser->getEmail(), $this->testUser->getPassword())) {header('location:/accueil');} 
            else {return null;}
        } 
        else {header('location:/accueil');}
    }
 
}

