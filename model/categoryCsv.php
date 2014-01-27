<?php

/**
 * @author LEFEBVRE Julien
 */
class categoryCsv extends connectCsv{
    
    private $category;
    private $list = array();
    
    public function __construct() {
        $this->connectCsv('category');
    }
    
    /**
     * @param String $nom
     */
    public function removeCategory($nom){
        
    }
    
    /**
     * @param Array $data
     */
    public function addCategory($data){
        fputcsv($this->connection, $data, ";", " ");
    }
    
    Public function getAllCategory(){
        while($this->category = fgetcsv($this->connection, 255, ";")){
            $this->list[] = $this->category;
        }
        $this->closeCsv();
        return $this->list;
    }
    
}
