<?php

/**
 * formHandler
 *
 * @author LEFEBVRE Julien
 */
class formHandler {
    
    private $Form;
    private $csv;
    private $product;
    
    public function __construct() {
        
    }
    
    public function newCategory(){
        $this->Form = new form("POST", "/admin/category/add", null, "ajouter une categorie");
        $this->Form->newStringField("text", "name", null, "form-control");
        $this->Form->newStringField("submit", "bt", null, "btn btn-default");
        return $this->Form;
    }
    
    public function selectCategory(){
        $this->Form = new form("POST", "/admin/category/view/upd", null, "Choisir la categorie a modifier");
        $this->csv = new categoryCsv();
        $this->Form->newSelectField("select", $this->csv->getAllCategory(), "form-control");
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
        $this->csv = new categoryCsv();
        $this->Form->newSelectField("name", $this->csv->getAllCategory(), "form-control");
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
        $this->csv = new categoryCsv();
        $this->Form->newSelectField("category", $this->csv->getAllCategory(), "form-control");
        $this->Form->newStringField("submit", "bt", null, "btn btn-default");
        return $this->Form;        
    }
    
    public function selectProduct(){
        $this->Form = new form("POST", "/admin/product/view/upd", null, "Choisir le produit a modifier");
        $this->csv = new productCsv();
        $this->Form->newSelectField("select", $this->csv->getAllProduct(), "form-control");
        $this->Form->newStringField("submit", "bt", null, "btn btn-default");
        return $this->Form;
    }
    
    public function updProduct($nom){
        $this->csv = new productCsv();
        $this->product = $this->csv->getProductByNom($nom);
        $this->Form = new form("POST", "/admin/updProduct", null, "Modifier un Produit", "multipart/form-data");
        $this->Form->newStringField("text", "nom", $this->product->getNom(), "form-control");
        $this->Form->newTextField("description", null, $this->product->getDescription(), "form-control");
        $this->Form->newStringField("text", "pu", $this->product->getPrix(), "form-control");
        $this->Form->newStringField("text", "pm", $this->product->getPrixMenu(), "form-control");
        $this->Form->newStringField("file", "image", null, "form-control");
        $this->csv = new categoryCsv();
        $this->Form->newSelectField("category", $this->csv->getAllCategory(), "form-control");
        $this->Form->newStringField("submit", "bt", null, "btn btn-default");
        $this->Form->newStringField("hidden", "old", "$nom");
        return $this->Form; 
    }
    
    public function delProduct(){
        $this->Form = new form("POST", "/admin/delProduct", null, "Supprimer un produit");
        $this->csv = new productCsv();
        $this->Form->newSelectField("name", $this->csv->getAllProduct(), "form-control");
        $this->Form->newStringField("submit", "bt", null, "btn btn-default");
        return $this->Form;
    }
}
