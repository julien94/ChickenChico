<?php

/**
 * @author LEFEBVRE Julien
 */
class form {
    
    private $fieldList = array();
    private $field;
    private $titre;
    
    public function __construct($titre) {
        $this->titre = $titre;
    }
    
    public function newField($genre, $type = null, $value = null){
        $this->fieldList = new field.$genre($type = null, $value = null);
    }
    
    
}
