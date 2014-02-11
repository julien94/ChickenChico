<?php

/**
 * @author boudha
 */
class product {
    
    private $name;
    private $oldName;
    private $description;
    private $prix;
    private $prixMenu;
    private $image;
    private $category;
    
    function __construct($nom, $description, $prix, $category, $prixMenu = null, $image = null) {
        $this->name = $nom;
        $this->description = $description;
        $this->prix = $prix;
        $this->prixMenu = $prixMenu;
        $this->image = $image;
        $this->category = $category;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return ucfirst(trim($this->description));
    }
    
    public function getPrix() {
        return trim($this->prix);
    }

    public function getPrixMenu() {
        if($this->prixMenu === 'null'){
            return '';
        }
        else{
            return trim($this->prixMenu);
        }
    }
    
    public function getImage(){
        return $this->image;
    }

    public function getImageName() {
        return $this->image->getName();
    }
    
    public function getImageTmpName() {
        return $this->image->getTmp_name();
    }

    public function getCategory() {
        return $this->category;
    }
    
    public function getAll(){
        if($this->image == null){$this->image = new image(null, "no-image.jpg");}
        return array($this->name, $this->description, $this->prix, $this->prixMenu, $this->getImageName(), $this->category);
    }

    public function getOldName() {
        return $this->oldName;
    }

    public function setOldName($oldName) {
        $this->oldName = $oldName;
    }
    
    public function setOldImage($name){
        $this->image = new image(null, $name);
    }

    public function setName($nom) {
        $this->name = $nom;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function setPrixMenu($prixMenu) {
        $this->prixMenu = $prixMenu;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function toString(){
        if($this->image == null){$this->image = new image(null, "no-image.jpg");}
        return $this->name.';'.$this->description.';'.$this->prix.';'.$this->prixMenu.';'.$this->getImageName().';'.$this->category;
    }
}
