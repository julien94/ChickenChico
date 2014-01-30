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
    
    public function selectCategory(){
        $this->Form = new form("POST", "/admin/viewCategory/upd", null, "Choisir la categorie a modifier");
        $this->cat = new categoryCsv();
        $this->Form->newSelectField("select", $this->cat->getAllCategory(), "form-control");
        $this->Form->newStringField("submit", "bt", null, "btn btn-default");
        return $this->Form;          
    }
    
    public function updCategory($nom){
        $this->Form = new form("POST", "/admin/updCategory", null, "Modifier une categorie");
        $this->Form->newStringField("text", "new", "Nouveau nom", "form-control");
        $this->Form->newStringField("submit", "btn", null, "btn btn-default");
        $this->Form->newStringField("hidden", "old", "$nom");
        return $this->Form;
    }
    
    public function delCategory(){
        $this->Form = new form("POST", "/admin/delCategory", null, "supprimer une categorie");
        $this->cat = new categoryCsv();
        $this->Form->newSelectField("name", $this->cat->getAllCategory(), "form-control");
        $this->Form->newStringField("submit", "bt", null, "btn btn-default");
        return $this->Form;        
    }
    
    public function newProduct(){
        $this->Form = new form("POST", "/admin/addProduct", null, "ajouter un Produit", "multipart/form-data");
        $this->Form->newStringField("text", "nom", "Nom", "form-control");
        $this->Form->newTextField("description", null, "Description", "form-control");
        $this->Form->newStringField("text", "pu", "Prix Unité (ex : 4.80)", "form-control");
        $this->Form->newStringField("text", "pm", "Prix Unité (ex : 5.50)", "form-control");
        $this->Form->newStringField("file", "image", null, "form-control");
        $this->cat = new categoryCsv();
        $this->Form->newSelectField("category", $this->cat->getAllCategory(), "form-control");
        $this->Form->newStringField("submit", "bt", null, "btn btn-default");
        return $this->Form;        
    }
    
    public function selectProduct(){
        
    }
    
    public function updProduct(){
        $this->test = new form("POST", "/admin/addCategory", null, "ajouter une categorie");
        $this->test->newTextField("texta", null, null, "form-control");
        $this->cat = new categoryCsv();
        $this->test->newSelectField("testselect", $this->cat->getAllCategory(), "form-control");
    }
    
    public function delProduct(){
        
    }
}
