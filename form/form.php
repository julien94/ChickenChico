<?php

/**
 * @author LEFEBVRE Julien
 */
class form {
    
    private $fieldList = array();
    private $titre;
    private $action;
    private $method;
    private $class;
    private $encType;
    
    /**
     * @param String $method
     * @param String $action
     * @param String $titre
     */
    public function __construct($method, $action, $class = null ,$titre = null, $enctype = null) {
        $this->method = ' method="'.$method.'"';
        $this->action = ' action="'.$action.'"';
        if($class != null){$this->class = ' class="'.$class.'"';}
        if($titre != null){$this->titre = $titre;}
        if($enctype != null){$this->encType = ' enctype="'.$enctype.'"';}
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
        return strtoupper($this->titre);
    }

    public function getAction() {
        return $this->action;
    }

    public function getMethod() {
        return $this->method;
    }

    public function getEncType() {
        return $this->encType;
    }

    public function getClass() {
        return $this->class;
    }

}
