<?php

/**
 * @author LEFEBVRE Julien
 */
class selectField {
    
    private $id;
    private $name;
    private $class;
    private $listOption = array();
    
    function __construct($name, $id = null, $class = null) {
        $this->name = $name;
        if($id != null){$this->id = 'id="'.$id.'"';}
        if($class != null){$this->class = 'class="'.$class.'"';}
    }
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getClass() {
        return $this->class;
    }

    public function getListOption() {
        return $this->listOption;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setClass($class) {
        $this->class = $class;
    }
    
    /**
     * Insert array list in the option list
     * @param array $listOption
     */
    public function setListOption($listOption) {
        $this->listOption = $listOption;
    }

    /**
     * Add a new option in the option list
     * @param array $option
     */
    public function pushToListOption($option) {
        $this->listOption = array_merge($this->listOption, $option);
    }

    public function toString(){
        return "<select".$this->name.$this->id.$this->class.">"
                ."<?php foreach($data->getListOption() as $option){echo '<option>'.$option.'</option>';} ?>"
                ."</select>";
    }

}
