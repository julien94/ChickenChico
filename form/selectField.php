<?php

/**
 * Creat select Field
 * 
 * @author LEFEBVRE Julien
 */
class selectField {
    
    private $id;
    private $name;
    private $class;
    private $options;
    private $listOption = array();
    
    /**
     * @param String $name
     * @param ArrayList $tabOption
     * @param String $id
     * @param String $class
     */
    function __construct($name, $tabOption = null, $class = null, $id = null) {
        $this->name = ' name="'.$name.'"';
        if($tabOption != null){
            foreach($tabOption as $opt){
            $this->listOption[] = '<option>'.$opt[0].'</option>';
        }
        }
        if($id != null){$this->id = ' id="'.$id.'"';}
        if($class != null){$this->class = ' class="'.$class.'"';}
    }
    
    /**
     * @return String
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return String
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return String
     */
    public function getClass() {
        return $this->class;
    }

    /**
     * @return Array
     */
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
    public function setListOption($tabOption) {
        foreach($tabOption as $opt){
            $this->listOption[] = '<option>'.$opt.'</option>';
        }
    }

    /**
     * Add a new option in the option list
     * @param array $option
     */
    public function pushToListOption($option) {
        $this->listOption = array_merge($this->listOption, $option);
    }

    public function toString(){
        foreach($this->listOption as $option){
            $this->options .= $option;
        }
        return "<select".$this->name.$this->id.$this->class.">".$this->options."</select>";
    }

}
