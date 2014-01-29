<?php

/**
 * @author JULIEN
 */
class connectCsv {
    
    public $connection;
    
    public function connectCsv($file, $openMode = null) {
        if($openMode == null){$openMode = "a+";}
        $this->connection = fopen(ROOT."support/".$file.".csv", $openMode);
        return $this->connection;
    }
    
    public function closeCsv(){
        fclose($this->connection);
    }
}
