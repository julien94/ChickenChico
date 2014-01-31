<?php

/**
 * @author boudha
 */
class product {
    
    private $nom;
    private $description;
    private $prix;
    private $prixMenu;
    private $image;
    private $category;
    private $imgHeight;
    
    
    function __construct($nom, $description, $prix, $category, $prixMenu = null, $image = null) {
        $this->nom = $nom;
        $this->description = $description;
        $this->prix = $prix;
        $this->prixMenu = $prixMenu;
        $this->image = $image;
        $this->category = $category;
    }

    public function getNom() {
        return ucfirst(trim($this->nom));
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

    public function getImage() {
        if(file_exists("image/menu/sandwich/".$this->image)){return $this->image;}
        else{return $this->image = "no-image.jpg";}
    }

    public function getCategory() {
        return $this->category;
    }
    
    public function getAll(){
        return array($this->nom, $this->description, $this->prix, $this->prixMenu, $this->image, $this->category);
    }

    public function setNom($nom) {
        $this->nom = $nom;
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

}
