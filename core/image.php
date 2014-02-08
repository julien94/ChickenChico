<?php

/**
 * @author LEFEBVRE Julien
 */
class image {
    
    private $error;
    private $name;
    private $size;
    private $tmp_name;
    
    public function __construct($error = null, $name = null, $size = null, $tmp_name = null) {
        $this->error = $error;
        $this->name = $name;
        $this->size = $size;
        $this->tmp_name = $tmp_name;
    }
    
    public function getError() {
        return $this->error;
    }

    public function getName() {
        return $this->name;
    }

    public function getSize() {
        return $this->size;
    }

    public function getTmp_name() {
        return $this->tmp_name;
    }

    public function setError($error) {
        $this->error = $error;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setSize($size) {
        $this->size = $size;
    }

    public function setTmp_name($tmp_name) {
        $this->tmp_name = $tmp_name;
    }


    
}
