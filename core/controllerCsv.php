<?php

/**
 * @author LEFEBVRE Julien
 */
class controllerCsv extends controleur{
    
    public $connection;
    private $array = array();
    
    public function connectCsv($file, $openMode = null) {
        if($openMode == null){$openMode = "a+";}
        $this->connection = fopen(ROOT."support/".$file.".csv", $openMode);
    }
    
    public function closeCsv(){
        fclose($this->connection);
    }
    
    public function returnMsg($stringMsg){
        $this->setMsg($stringMsg);
        $this->render('admin');
    }
}
