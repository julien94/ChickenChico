<?php

/**
 * @author LEFEBVRE Julien
 */
class factoryDao {
    
    private $dao;
    
    public function __construct($nom) {
        return new $nom."Dao()";
    }
    
}
