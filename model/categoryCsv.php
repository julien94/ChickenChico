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
    public function delCategory($nom){
        while($this->category = fgetcsv($this->connection, 255, ";")){
            if($this->category != $nom){$this->list[] = $this->category;}
        }
        foreach($this->list as $d){
            if(fputs($this->connection, $d."\r\n")){return 'la categorie "'.$nom.'" à bien été supprimé';}
            else{return 'Probleme de suppression de categorie, contacter le developpeur';}
        }
    }
    
    /**
     * @param Array $data
     */
    public function addCategory($data){
        if(fputs($this->connection, $data."\r\n")){return 'La categorie "'.$data.'" à bien été ajouté';}
        else{return 'Probleme d\'ajout de categorie, contacter le developpeur';}
    }
    
    /**
     * @return array
     */
    Public function getAllCategory(){
        while($this->category = fgetcsv($this->connection, 255, ";")){
            $this->list[] = $this->category;
        }
        $this->closeCsv();
        return $this->list;
    }
    
}
