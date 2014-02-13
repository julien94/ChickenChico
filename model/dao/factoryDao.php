<?php

/**
 * @author LEFEBVRE Julien
 */
class factoryDao {
    
    private $dao;
    
    public function __construct($nom) {
        $this->dao = new $nom.'Dao()';
        return $this->dao;
    }
    
}
