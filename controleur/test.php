<?php

/**
 * Description of test
 *
 * @author stagiaire
 */
class test {
    
    private $test;
    private $cat;
    
    
    public function __construct() {
      
        $this->test = array("chat", "chien", "tigre", "lion");
        print_r($this->test);
        $this->cat = "chien";
        unset($this->test[$this->cat]);
        print_r($this->test);
        
        
    }
    
}
