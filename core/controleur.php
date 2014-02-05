<?php

class controleur {
    
    private $data = array();
    private $msg = array();
    private $array;
    private $userCsv;
    private $testUser;
    private $admin;
    
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
    
    public function toArray($string){
        return $this->array = array($string);
    }
    
    public function checkField($field){
        $this->testField = new checkField($field);
        if(!$this->testField->test()){
            $this->setMsg("Au moin un des champs est vide ou contient des caracteres non autorisé !");
            $this->render('admin');
        }
        else{return true;}
    }
    
    public function checkImg($image){
        
    }
    
    public function checkUser($email, $pwd){
        $this->userCsv = new userCsv();
        if($this->userCsv->getPseudo() !== $email || $this->userCsv->getPwd() !== $pwd){
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

