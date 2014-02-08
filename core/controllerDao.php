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
     * @return boolean
     */
    private function updFile($nomEntity){
        $this->connectCsv($nomEntity, 'w+');
        if($nomEntity == category){
            foreach($this->listSet as $d){if(fputs($this->connection, $d[0]."\r\n")){$this->good = true;}}
        }
        else{
            for($i=0; $i<count($this->listSet); $i++){
                if(fputs($this->connection, $this->listSet[$i][0].";".$this->listSet[$i][1].";".$this->listSet[$i][2].";".$this->listSet[$i][3].";".$this->listSet[$i][4].";".$this->listSet[$i][5]."\r\n")){$this->good = true;}
            }
        }
        $this->closeCsv();
        return true;
    }
    
    /**
     * @param String $subject
     */
    private function returnMsg($subject){
        if($this->good == false){$this->setMsg('Echec "'.$subject.'", contacter l\'administrateur');}
        else{$this->setMsg($subject.' réussie');}
        $this->render("admin");
    }
}
