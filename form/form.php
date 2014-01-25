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
    
    public function newStringField($type, $name, $value = null, $id = null, $class = null){
        $this->fieldList = array_push(new stringField($type, $name, $value, $id, $class));
    }
    
    public function newTextField($name, $id = null, $value = null, $text = null, $class = null, $rows = null, $cols = null){
        $this->fieldList = array_push(new textField($name, $id, $value, $text, $class, $rows, $cols));
    }
    
    public function newSelectField($name, $id = null, $class = null){
        $this->fieldList = array_push(new selectField($name, $id, $class));
    }
}
