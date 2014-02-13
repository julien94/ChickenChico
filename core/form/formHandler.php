<?php

/**
 * @author LEFEBVRE Julien
 */
class formHandler {
    
    private $Form;
    private $object;
    private $dataCategory;
    private $dataProduct;
    
    public function __construct($object, $dataCategory, $dataProduct) {
        $this->object = $object;
        $this->dataCategory = $dataCategory;
        $this->dataProduct = $dataProduct;
    }
    
    public function newCategory(){
        $this->Form = new form("POST", "/admin/category/add", null, "ajouter une categorie");
        $this->Form->newStringField("Saisir le nom de la nouvelle categorie :", "text", "name", null, "form-control");
        $this->Form->newStringField("", "submit", "bt", null, "btn btn-default");
        return $this->Form;
    }
    
    public function selectCategory(){
        $this->Form = new form("POST", "/admin/category/view/upd", null, "Choisir la categorie a modifier");
        $this->Form->newSelectField("select", $this->dataCategory, "form-control", "Choisir une categorie :");
        $this->Form->newStringField("", "submit", "bt", null, "btn btn-default");
        return $this->Form;          
    }
    
    public function updCategory(){
        $this->Form = new form("POST", "/admin/category/upd", null, "Modifier une categorie");
        $this->Form->newStringField("Ancien nom : ".$this->object->getName(), "text", "name", "Nouveau nom", "form-control");
        $this->Form->newStringField("", "submit", "btn", null, "btn btn-default");
        $this->Form->newStringField("", "hidden", "old", $this->object->getName());
        return $this->Form;
    }
    
    public function delCategory(){
        $this->Form = new form("POST", "/admin/category/del", null, "supprimer une categorie ?");
        $this->Form->newSelectField("name", $this->dataCategory, "form-control", "Choisir une categorie :");
        $this->Form->newStringField("", "submit", "bt", "Supprimer", "btn btn-danger");
        return $this->Form;        
    }
    
    public function newProduct(){
        $this->Form = new form("POST", "/admin/product/add", null, "ajouter un Produit", "multipart/form-data");
        $this->Form->newStringField("Nom du produit :", "text", "name", null, "form-control");
        $this->Form->newTextField("Description du produit :", "description", null, "Description", "form-control");
        $this->Form->newStringField("Prix produit a l'unité (ex: 4.30) :", "text", "pu", null, "form-control");
        $this->Form->newStringField("Prix produit menu (ex: 5.80) :", "text", "pm", null, "form-control");
        $this->Form->newStringField("Choisir une image (png ou jpg) :", "file", "image", null, "form-control");
        $this->Form->newSelectField("category", $this->dataCategory, "form-control", "Choisir la categorie associée :");
        $this->Form->newStringField("", "submit", "bt", null, "btn btn-default");
        return $this->Form;        
    }
    
    public function selectProduct(){
        $this->Form = new form("POST", "/admin/product/view/upd", null, "Choisir le produit a modifier");
        $this->Form->newSelectField("select", $this->dataProduct, "form-control", "Choisir un produit :");
        $this->Form->newStringField("", "submit", "bt", null, "btn btn-default");
        return $this->Form;
    }
    
    public function updProduct(){
        $this->Form = new form("POST", "/admin/product/upd", null, "Modifier un Produit", "multipart/form-data");
        $this->Form->newStringField("Nom :", "text", "name", $this->object->getName(), "form-control");
        $this->Form->newTextField("Description :", "description", null, $this->object->getDescription(), "form-control");
        $this->Form->newStringField("Prix a l'unité :", "text", "pu", $this->object->getPrix(), "form-control");
        $this->Form->newStringField("Prix menu :", "text", "pm", $this->object->getPrixMenu(), "form-control");
        $this->Form->newStringField("Image actuel : ".$this->object->getImage(), "file", "image", null, "form-control");
        $this->Form->newSelectField("category", $this->dataCategory, "form-control", "choisir la categorie :", $this->object->getCategory());
        $this->Form->newStringField("", "submit", "bt", null, "btn btn-default");
        $this->Form->newStringField("", "hidden", "old", $this->object->getName());
        return $this->Form; 
    }
    
    public function delProduct(){
        $this->Form = new form("POST", "/admin/product/del", null, "Supprimer un produit ?");
        $this->Form->newSelectField("name", $this->dataProduct, "form-control", "Choisir le produit :");
        $this->Form->newStringField("", "submit", "bt", "Supprimer", "btn btn-danger");
        return $this->Form;
    }
    
    public function user(){
        $this->Form = new form("POST", "/admin/user/connexion", null, "Saisir le Login et Mot de passe");
        $this->Form->newStringField("saisir le login :", "text", "mail", "", "form-control");
        $this->Form->newStringField("Saisir le mot de passe :", "password", "mdp", "", "form-control");
        $this->Form->newStringField(null, "submit", "bt", null, "btn btn-success");
        return $this->Form;
    }
}
