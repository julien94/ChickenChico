<?php

/**
 * @author LEFEBVRE Julien
 */
class admin extends controleur {

    private $controller;
    private $formToObject;
    private $value;
    private $select = null;
    private $url;

    public function __construct() {
        session_start();
        if (!isset($_POST['mail']) && !isset($_POST['mdp'])) {$this->checkSession();}
        $this->url = explode('/', $_SERVER['REDIRECT_URL']);
        if($this->url[2] == ""){header('location:/admin/option');}
        
    }
    
    public function option(){
        $this->render('admin');
    }

    public function userConnect() {
        if (!isset($_POST['mail']) && !isset($_POST['mdp'])) {header('location:/accueil');}
        if ($this->checkUser($_POST['mail'], $_POST['mdp'])) {header('location:/admin/option');}
    }
    
    public function category($opt, $opt2 = null){
        $this->formToObject = new formToObject();
        if($opt2 != null){$this->value = $opt2;}
        else{$this->value = $this->formToObject->getFormToCategory();}
        if($opt2 == "upd"){$this->select = $this->formToObject->getSelect();}
        $this->controller = new categoryService();
        $this->controller->$opt($this->value, $this->select);
    }
    
    public function product($opt, $opt2 = null){
        $this->formToObject = new formToObject();
        if($opt2 != null){$this->value = $opt2;}
        else{$this->value = $this->formToObject->getFormToProduct();}
        if($opt2 == "upd"){$this->select = $this->formToObject->getSelect();}
        $this->controller = new productService();
        $this->controller->$opt($this->value, $this->select);
    }
    
}