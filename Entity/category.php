<?php

/**
 * @author boudha
 */
class category {
    
    private $listProduit = array();
    private $produitCsv;
    private $produits;
    private $name;
    private $oldName;
    
    public function __construct($nom) {
        $this->name = $nom;
    }
    
    public function attachProduct(){
        $this->produitCsv = new productCsv();
        foreach($this->produitCsv->getProductBy($this->name) as $this->produits){
            $this->listProduit[] = new product($this->produits[0], $this->produits[1], $this->produits[2], $this->produits[5], $this->produits[3], $this->produits[4]);
        }
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setName($nom) {
        $this->name = $nom;
    }

    public function getListProduit(){
        return $this->listProduit;
    }
    
    public function getOldName() {
        return $this->oldName;
    }

    public function setOldName($oldName) {
        $this->oldName = $oldName;
    }


}
