<?php

/**
 * @author LEFEBVRE Julien
 */
class controllerDao extends controleur{
    
    public $connection;
    private $array = array();
    
    public function connectCsv($file, $openMode = null) {
        if($openMode == null){$openMode = "r";}
        $this->connection = fopen(ROOT."support/".$file.".csv", $openMode);
    }
    
    public function closeCsv(){
        fclose($this->connection);
    }
    
    /**
     * @param String $subject
     */
    public function returnMsg($subject){
        if($this->good == false){$this->setMsg('Echec "'.$subject.'", contacter l\'administrateur');}
        else{$this->setMsg($subject.' réussie');}
        $this->render("admin");
    }
}
