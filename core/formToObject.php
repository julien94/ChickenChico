<?php

/**
 * @author LEFEBVRE Julien
 */
class formToObject {
    
    private $value;
    private $image;
    
    public function getFormToCategory(){
        if(isset($_POST['name'])){
            $this->value = new category($_POST['name']);
            if(isset($_POST['old'])){$this->value->setOldName($_POST['old']);}
        }
        else{$this->value = new category("");}
        return $this->value;
    }
    
    public function getSelect(){
        if(isset($_POST['select'])){$this->value = new category($_POST['select']);}
        return $this->value;
    }
    
    public function getFormToProduct(){
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
        return $this->value;
    }
}
