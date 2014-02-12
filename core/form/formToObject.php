<?php

/**
 * @author LEFEBVRE Julien
 */
class formToObject {
    
    private $value = null;
    private $name = "";
    private $description = "";
    private $pu = "";
    private $pm = "";
    private $image = null;
    private $category = "";
    private $select = "";
    private $old = null;
    private $mail;
    private $pwd;
    
    
    public function __construct() {
        if(isset($_POST['name'])){$this->name = $_POST['name'];}
        if(isset($_POST['description'])){$this->description = $_POST['description'];}
        if(isset($_POST['pu'])){$this->pu = $_POST['pu'];}
        if(isset($_POST['pm'])){$this->pm = $_POST['pm'];}
        if(isset($_FILES['image'])){
            if($_FILES['image']['size'] > 0){$this->image = new image($_FILES['image']['error'],$_FILES['image']['name'],$_FILES['image']['size'],$_FILES['image']['tmp_name']);}
            else{$this->image = null;}
        }
        if(isset($_POST['category'])){$this->category = $_POST['category'];}
        if(isset($_POST['select'])){$this->select = $_POST['select'];}
        if(isset($_POST['old'])){$this->old = $_POST['old'];}
        if(isset($_POST['mail'])){$this->mail = $_POST['mail'];}
        if(isset($_POST['mdp'])){$this->pwd = $_POST['mdp'];}
    }
    
    public function getSelect(){
        return $this->select;
    }
    
    public function getSelectProduct(){
        $send = explode("-", $this->select);
        return trim($send[0]);
    }
    
    public function getFormToCategory(){
        $this->value = new category($this->name);
        if($this->old != null){$this->value->setOldName($this->old);}
        return $this->value;
    }
    
    public function getFormToProduct(){
        $this->value = new product($this->name, $this->description, $this->pu, $this->category, $this->pm, $this->image);
        if($this->old != null){$this->value->setOldName($this->old);}
        return $this->value;
    }
    
    public function getFormToUser(){
        return $this->value = new user($this->mail, $this->pwd);
    }
}
