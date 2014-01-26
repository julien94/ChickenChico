<?php

/**
 * @author LEFEBVRE Julien
 */
class form {
    
    private $fieldList = array();
    private $titre;
    
    /**
     * @param String $titre
     */
    public function __construct($titre) {
        $this->titre = $titre;
    }
    
    public function newStringField($type, $name, $value = null, $id = null, $class = null){
        $this->fieldList[] = new stringField($type, $name, $value, $id, $class);
    }
    
    public function newTextField($name, $id = null, $value = null, $text = null, $class = null, $rows = null, $cols = null){
        $this->fieldList[] = new textField($name, $id, $value, $text, $class, $rows, $cols);
    }
    
    public function newSelectField($name, $id = null, $class = null){
        $this->fieldList[] = new selectField($name, $id, $class);
    }
    
    public function getFieldList() {
        return $this->fieldList;
    }

    public function getTitre() {
        return $this->titre;
    }


}
