<?php

/**
 * @author LEFEBVRE Julien
 */
class categoryDao extends controllerDao{
    
    private $category;
    protected $good = false;
    private $listGet = array();
    private $listSet = array();
    
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
    
    public function getCategoryByName($name){
        foreach($this->getAllCategory() as $aCat){
            if($aCat[0] == $name){return new category($aCat[0]);}
        }
    }
       
    /**
     * @param String $name
     */
    public function addCategory(category $category){
        $this->connectCsv("category", "a+");
        if(fputs($this->connection, $category->getName()."\r\n")){$this->good = true;}
        $this->closeCsv();
        return $this->good;
    }
    
    /**
     * @param String $old
     * @param String $new
     */
    public function updCategory(category $category){
        foreach($this->getAllCategory() as $aCat){
            if($aCat[0] == $category->getOldName()){$this->listSet[] = $this->toArray($category->getName());}
            else{$this->listSet[] = $aCat;}
        }
        $this->updFile();
        return $this->good;
    }
 
     /**
     * @param String $nom
     * @return String
     */
    public function delCategory(category $category){
        foreach($this->getAllCategory() as $aCat){
            if($aCat[0] != $category->getName()){$this->listSet[] = $aCat;}
        }
        $this->updFile();
        return $this->good;
    }
    
    
    public function updFile(){
        $this->connectCsv("category", 'w+');
        foreach($this->listSet as $d){if(fputs($this->connection, $d[0]."\r\n")){$this->good = true;}}
        $this->closeCsv();
    }
    
}
