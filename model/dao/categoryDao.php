<?php

/**
 * @author LEFEBVRE Julien
 */
class categoryDao extends controleur{
    
    private $category;
    private $connection;
    private $fileConnect;
    protected $good = false;
    private $listGet = array();
    private $listSet = array();
    
    /**
     * @return array
     */
    Public function getAllCategory(){
        $this->connection = new connection();
        $this->fileConnect = $this->connection->connectCsv("category");
        while($this->category = fgetcsv($this->fileConnect, 255, ";")){
            $this->listGet[] = $this->category;
        }
        $this->connection->closeCsv();
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
        $this->connection = new connection();
        $this->fileConnect = $this->connection->connectCsv("category", "a+");
        if(fputs($this->fileConnect, $category->getName()."\r\n")){$this->good = true;}
        $this->connection->closeCsv();
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
        $this->connection = new connection();
        $this->fileConnect = $this->connection->connectCsv("category", "w+");
        foreach($this->listSet as $d){if(fputs($this->fileConnect, $d[0]."\r\n")){$this->good = true;}}
        $this->connection->closeCsv();
    }
    
}
