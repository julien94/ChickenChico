<?php

/**
 * Description of test
 *
 * @author stagiaire
 */
class test {
    
    private $test;
    
    public function __construct() {
        $this->test = new form("test formulaire");
        $this->test->newStringField("text", "champs1");
        $this->test->newStringField("text", "champs2");
        $this->test->newTextField("texta");
        $this->test->newStringField("submit", "bt");
        print_r($this->test->getTitre());
        foreach($this->test->getFieldList() as $field){
            print_r($field->toString());
        }
        
    }
    
}