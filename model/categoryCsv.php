<?php

/**
 * @author LEFEBVRE Julien
 */
class categoryCsv extends controllerCsv{
    
    private $category;
    private $good = false;
    private $bad = false;
    private $list = array();
    
    public function __construct() {
        $this->connectCsv('category', 'a+');
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
       
    /**
     * @param String $data
     * @return String
     */
    public function addCategory($data){
        if(fputs($this->connection, $data."\r\n")){$this->returnMsg('La categorie "'.$data.'" à bien été ajouté');}
        else{$this->returnMsg('Probleme d\'ajout de categorie, contacter le developpeur');}
        $this->closeCsv();
    }
    
    /**
     * 
     * @param String $old
     * @param String $new
     * @return String
     */
    public function updCategory($old, $new){
        while($this->category = fgetcsv($this->connection, 255, ";")){
            if($this->category[0] == $old){$this->list[] = array_replace($this->category, $this->toArray($new));}
            else{$this->list[] = $this->category;}
        }
        $this->closeCsv();
        $this->connectCsv('category', 'w+');
        foreach($this->list as $d){
            if(fputs($this->connection, $d[0]."\r\n")){$this->good = true;}
            else{$this->bad = true;}
        }
        $this->closeCsv();
        if($this->bad == true){$this->returnMsg('Probleme de modification de categorie, contacter le developpeur');}
        else{if($this->good == true){$this->returnMsg('la categorie "'.$old.'" à bien été remplacé par "'.$new.'"');}}
    }
 
     /**
     * @param String $nom
     * @return String
     */
    public function delCategory($nom){
        while($this->category = fgetcsv($this->connection, 255, ";")){
            if($this->category[0] != $nom){$this->list[] = $this->category;}
        }
        $this->closeCsv();
        $this->connectCsv('category', 'w+');
        foreach($this->list as $d){
            if(fputs($this->connection, $d[0]."\r\n")){$this->good = true;}
            else{$this->bad = true;}
        }
        $this->closeCsv();
        if($this->bad == true){$this->returnMsg('Probleme de modification de categorie, contacter le developpeur');}
        else{if($this->good == true){$this->returnMsg('la categorie "'.$nom.'" à bien été supprimé');}}
    }
    
}
