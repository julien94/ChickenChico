<?php

/**
 * formHandler
 *
 * @author LEFEBVRE Julien
 */
class formHandler {
    
    private $Form;
    
    public function __construct() {
        
    }
    
    public function newCategory(){
        $this->Form = new form("POST", "/admin/addCategory", null, "ajouter une categorie");
        $this->Form->newStringField("text", "new", null, "form-control");
        $this->Form->newStringField("submit", "bt", null, "btn btn-default");
        
        return $this->Form;
    }
    
    public function updCategory(){
        $this->test = new form("POST", "/admin/addCategory", null, "ajouter une categorie");
        $this->test->newTextField("texta", null, null, "form-control");
        $this->cat = new categoryCsv();
        $this->test->newSelectField("testselect", $this->cat->getAllCategory(), "form-control");
    }
    
    public function delCategory(){
        $this->test = new form("POST", "/admin/delCategory", null, "ajouter une categorie");
        $this->cat = new categoryCsv();
        $this->test->newSelectField("testselect", $this->cat->getAllCategory(), "form-control");
    }
    
    public function selectCategory(){
        $this->test = new form("POST", "/admin/addCategory", null, "ajouter une categorie");
        $this->test->newTextField("texta", null, null, "form-control");
        $this->cat = new categoryCsv();
        $this->test->newSelectField("testselect", $this->cat->getAllCategory(), "form-control");
    }
    
    public function updProduct(){
        $this->test = new form("POST", "/admin/addCategory", null, "ajouter une categorie");
        $this->test->newTextField("texta", null, null, "form-control");
        $this->cat = new categoryCsv();
        $this->test->newSelectField("testselect", $this->cat->getAllCategory(), "form-control");
    }
}
