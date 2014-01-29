<?php

/**
 * @author LEFEBVRE Julien
 */
class categoryCsv extends connectCsv{
    
    private $category;
    private $message;
    private $list = array();
    
    public function __construct() {
        $this->connectCsv('category');
    }
    
    /**
     * @param String $nom
     */
    public function delCategory($nom){
        while($this->category = fgetcsv($this->connection, 255, ";")){
            if($this->category[0] != $nom){$this->list[] = $this->category;}
        }
        $this->closeCsv();
        $this->connectCsv('category', 'w+');
        foreach($this->list as $d){
            if(fputcsv($this->connection, $d, ",", " ")){$this->message = 'la categorie "'.$nom.'" à bien été supprimé';}
            else{$this->message = 'Probleme de suppression de categorie, contacter le developpeur';}
        }
        $this->closeCsv();
        return $this->message;
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
