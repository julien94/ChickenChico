<?php

/**
 * @author LEFEBVRE Julien
 */
class stringField extends field{
    
    private $type;
    private $id;
    private $name;
    private $value;
    private $class;
    
    function __construct($type, $name, $value = null, $class = null, $id = null) {
        $this->type = ' type="'.$type.'"';
        $this->name = ' name="'.$name.'"';
        if($value != null){$this->value = ' value="'.$value.'"';}
        if($class != null){$this->class = ' class="'.$class.'"';}
        if($id != null){$this->id = ' id="'.$id.'"';}
    }

    public function getType() {
        return $this->type;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getValue() {
        return $this->value;
    }

    public function getClass() {
        return $this->class;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setValue($value) {
        $this->value = $value;
    }

    public function setClass($class) {
        $this->class = $class;
    }

    public function toString(){
        return '<input'.$this->type.$this->id.$this->name.$this->value.$this->class.'>';
    }
}
