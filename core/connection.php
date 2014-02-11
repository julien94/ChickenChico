<?php

/**
 * @author LEFEBVRE Julien
 */
class connection{
    
    private $stat = false;
    private $connection;

    public function __construct() {
    }
    
    public function connectCsv($file, $openMode = null) {
        if($this->stat == false){
            if($openMode == null){$openMode = "r";}
            $this->connection = fopen(ROOT."support/".$file.".csv", $openMode);
            $this->stat = true;
            return $this->connection;
        }
    }
    
    public function closeCsv(){
        fclose($this->connection);
        $this->stat = false;
    }
    
}
