<?php

/**
 * @author JULIEN
 */
class connectCsv {
    
    public $connection;
    
    public function connectCsv($file) {
        $this->connection = fopen(ROOT."support/".$file.".csv", "a+");
        return $this->connection;
    }
    
    public function closeCsv(){
        fclose($this->connection);
    }
}
