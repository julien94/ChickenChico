<?php

/**
 * @author boudha
 */
class category {
    
    private $listProduit = array();
    private $produitCsv;
    private $produits;
    private $nom;
    private $oldName;
    
    public function __construct($nom) {
        $this->nom = $nom;
    }
    
    public function attachProduct(){
        $this->produitCsv = new productCsv();
        foreach($this->produitCsv->getProductBy($this->nom) as $this->produits){
            $this->listProduit[] = new product($this->produits[0], $this->produits[1], $this->produits[2], $this->produits[5], $this->produits[3], $this->produits[4]);
        }
    }
    
    public function getNom() {
        return strtoupper($this->nom);
    }

    public function setNom($nom) {
        $this->nom = $nom;
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
