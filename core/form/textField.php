<?php

/**
 * @author LEFEBVRE Julien
 */
class textField {
    
    private $id;
    private $name;
    private $value;
    private $text;
    private $class;
    private $rows;
    private $cols;
    private $miniTxt;
    
    public function __construct($miniTxt, $name, $value = null, $text = null, $class = null, $id = null,$rows = null, $cols = null) {
        $this->miniTxt = $miniTxt;
        $this->name = ' name="'.$name.'"';
        if($id != null){$this->id = ' id="'.$id.'"';}
        if($value != null){$this->value = ' value="'.$value.'"';}
        if($text != null){$this->text = $text;}
        if($class != null){$this->class = ' class="'.$class.'"';}
        if($rows != null){$this->rows = ' rows="'.$rows.'"';}
        if($cols != null){$this->cols = ' cols="'.$cols.'"';}
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

    public function getText() {
        return $this->text;
    }

    public function getClass() {
        return $this->class;
    }

    public function getRows() {
        return $this->rows;
    }

    public function getCols() {
        return $this->cols;
    }

    public function getMiniTxt() {
        return $this->miniTxt;
    }

    public function setMiniTxt($miniTxt) {
        $this->miniTxt = $miniTxt;
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

    public function setText($text) {
        $this->text = $text;
    }

    public function setClass($class) {
        $this->class = $class;
    }

    public function setRows($rows) {
        $this->rows = $rows;
    }

    public function setCols($cols) {
        $this->cols = $cols;
    }

    public function toString(){
        return "<textarea ".$this->id.$this->name.$this->value.$this->class.$this->rows.$this->cols.">".$this->text."</textarea>";
    }
}
