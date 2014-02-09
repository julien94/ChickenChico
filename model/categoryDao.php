<?php

/**
 * @author LEFEBVRE Julien
 */
class categoryDao extends controllerDao{
    
    private $category;
    private $good = false;
    private $listGet = array();
    private $listSet = array();
    
    public function __construct() {
    }
    
    /**
     * @return array
     */
    Public function getAllCategory(){
        $this->connectCsv('category');
        while($this->category = fgetcsv($this->connection, 255, ";")){
            $this->listGet[] = $this->category;
        }
        $this->closeCsv();
        return $this->listGet;
    }
       
    /**
     * @param String $name
     */
    public function addCategory(category $category){
        $this->connectCsv("category", "a+");
        if(fputs($this->connection, $category->getNom()."\r\n")){$this->good = true;}
        $this->closeCsv();
        $this->returnMsg("Ajout");
    }
    
    /**
     * @param String $old
     * @param String $new
     */
    public function updCategory(category $category){
        foreach($this->getAllCategory() as $aCat){
            if($aCat[0] == $category->getOldName()){$this->listSet[] = $this->toArray($category->getNom());}
            else{$this->listSet[] = $aCat;}
        }
        if($this->updFile("category")){$this->returnMsg("Modification");}
    }
 
     /**
     * @param String $nom
     * @return String
     */
    public function delCategory(category $category){
        foreach($this->getAllCategory() as $aCat){
            if($aCat[0] != $category->getNom()){$this->listSet[] = $aCat;}
        }
        if($this->updFile("category")){$this->returnMsg("Suppression");}
    }
    
}
