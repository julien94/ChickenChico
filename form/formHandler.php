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
    
    public function updCategory($nom){
        $this->Form = new form("POST", "/admin/updCategory", null, "Modifier une categorie");
        $this->Form->newStringField("text", "new", $nom, "form-control");
        $this->Form->newStringField("submit", "btn", null, "btn btn-default");
        $this->Form->newStringField("hidden", "old", $nom);
        return $this->Form;
    }
    
    public function delCategory(){
        $this->Form = new form("POST", "/admin/delCategory", null, "supprimer une categorie");
        $this->cat = new categoryCsv();
        $this->Form->newSelectField("name", $this->cat->getAllCategory(), "form-control");
        $this->Form->newStringField("submit", "bt", null, "btn btn-default");
        return $this->Form;        
    }
    
    public function selectCategory(){
        $this->Form = new form("POST", "/admin/viewCategory/upd", null, "Choisir la categorie à modifier");
        $this->cat = new categoryCsv();
        $this->Form->newSelectField("select", $this->cat->getAllCategory(), "form-control");
        $this->Form->newStringField("submit", "bt", null, "btn btn-default");
        return $this->Form;          
    }
    
    public function updProduct(){
        $this->test = new form("POST", "/admin/addCategory", null, "ajouter une categorie");
        $this->test->newTextField("texta", null, null, "form-control");
        $this->cat = new categoryCsv();
        $this->test->newSelectField("testselect", $this->cat->getAllCategory(), "form-control");
    }
}
