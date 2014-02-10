<?php

/**
 * @author LEFEBVRE Julien
 */
class controllerDao {
    
    public $connection;
    private $array = array();
    
    public function connectCsv($file, $openMode = null) {
        if($openMode == null){$openMode = "r";}
        $this->connection = fopen(ROOT."support/".$file.".csv", $openMode);
    }
    
    public function closeCsv(){
        fclose($this->connection);
    }
    
}
