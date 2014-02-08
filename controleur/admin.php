<?php

/**
 * @author LEFEBVRE Julien
 */
class admin extends controleur {

    private $controller;
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
    
    private function createValueCategory(){
        if(isset($_POST['name'])){
            $this->value = new category($_POST['name']);
            if(isset($_POST['old'])){$this->value->setOldName($_POST['old']);}
        }
        else{$this->value = new category("");}
    }
    
    private function createValueProduct(){
        if(isset($_FILES['image'])){
            $this->image = new image($_FILES['image']['error'],$_FILES['image']['name'],$_FILES['image']['size'],$_FILES['image']['tmp_name']);
        }
        else{$this->image = new image();}
        if(isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['pu']) && isset($_POST['category']) && isset($_POST['pm'])){
            $this->value = new product($_POST['nom'], $_POST['description'], $_POST['pu'], $_POST['category'], $_POST['pm'], $this->image->getName());
            $this->value->setObjUploadImg($this->image);
            if(isset($_POST['old'])){$this->value->setOldName($_POST['old']);}
        }
        else{$this->value = new product("", "", "", "");}
    }
    
    public function category($opt, $opt2 = null){
        if($opt2 != null){$this->value = $opt2;}
        else{$this->createValueCategory();}
        if($this->value == "upd"){$this->select = (!isset($_POST['select']))? null : $_POST['select'];}
        $this->controller = new categoryController();
        $this->controller->$opt($this->value, $this->select);
    }
    
    public function product($opt, $opt2 = null){
        if($opt2 != null){$this->value = $opt2;}
        else{$this->createValueProduct();}
        if($this->value == "upd"){$this->select = (!isset($_POST['select']))? null : $_POST['select'];}
        $this->controller = new productController();
        $this->controller->$opt($this->value, $this->select);
    }
    
}
