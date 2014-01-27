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
        $this->test = new form("POST", "/user", null, "test formulaire");
        $this->test->newStringField("hidden", "old", "coca,c'est de la merde,5.3");
        $this->test->newStringField("text", "new", null, "form-controle");
        $this->test->newTextField("texta");
        $this->cat = new categoryCsv();
        $this->test->newSelectField("testselect", $this->cat->getAllCategory());
        $this->test->newStringField("submit", "bt", null, "btn btn-default");
        print_r($this->test->getTitre());
        
        $this->set($this->test);
        $this->render('admin');
        
        
    }
    
}
