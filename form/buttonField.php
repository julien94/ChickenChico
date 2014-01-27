<?php

/**
 * Create a new form button Field
 *
 * @author LEFEBVRE Julien
 */
class buttonField {
    
    private $type;
    private $name;
    private $id;
    private $value;
    private $class;
        
    public function __construct() {
        $this->type = ' type="'.$type.'"';
        $this->name = ' name="'.$name.'"';
        if($id != null){$this->id = ' id="'.$id.'"';}
        if($value != null){$this->value = ' value="'.$value.'"';}
        if($class != null){$this->class = ' class="'.$class.'"';}
    }
    
}
