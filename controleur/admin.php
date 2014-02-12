<?php

/**
 * @author LEFEBVRE Julien
 */
class admin extends controleur {

    private $service;
    private $formToObject;
    private $value;
    private $select = null;
    private $url;

    public function __construct() {
        session_start();
        $this->url = explode('/', $_SERVER['REDIRECT_URL']);
        if($this->url[2] == ""){header('location:/admin/option');}
        $this->service = new userService();
        $this->service->checkSession();
    }
    
    public function option(){
        $this->render('admin');
    }
    
    public function user($opt) {
        $this->formToObject = new formToObject();
        $this->value = $this->formToObject->getFormToUser();
        $this->service = new userService();
        $this->service->$opt($this->value);
    }
    
    public function category($opt, $opt2 = null){
        $this->formToObject = new formToObject();
        if($opt2 != null){$this->value = $opt2;}
        else{$this->value = $this->formToObject->getFormToCategory();}
        if($opt2 == "upd"){$this->select = $this->formToObject->getSelect();}
        $this->service = new categoryService();
        $this->service->$opt($this->value, $this->select);
    }
    
    public function product($opt, $opt2 = null){
        $this->formToObject = new formToObject();
        if($opt2 != null){$this->value = $opt2;}
        else{$this->value = $this->formToObject->getFormToProduct();}
        if($opt2 == "upd"){$this->select = $this->formToObject->getSelect();}
        $this->service = new productService();
        $this->service->$opt($this->value, $this->select);
    }
    
}