<?php

/**
 * @author LEFEBVRE Julien
 */
class factoryDao {
    
    private $dao;
    
    public function __construct($nameDao) {
        $this->dao = $nameDao."Dao";
        $this->dao = new $this->dao();
    }
    
    public function getDao(){
        return $this->dao;
    }
}
