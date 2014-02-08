<?php

/**
 * @author LEFEBVRE Julien
 */
class checkField extends controleur{
    
    private $message;
    private $specialCaract = array("/</","/>/","/\(/","/\)/","/'/",'/"/',"/\[/","/\]/","/{/","/}/");
    
    public function __construct($type) {
        $this->isEmptyField();
        $this->badCaract();
        $this->{test.$nameField}($dataField);
    }
    
    private function isEmptyField($data){
       if(empty($data)){
           $this->setMsg("Un des Champs est vide !");
           $this->render('admin');
       }
    }
    
    private function badCaract($data){
         foreach($this->specialCaract as $caract){
            if(preg_match($caract, $data)){
                $this->message = "Un des champs contient un caractère non autorisé ! ex:()[]'\"\\<>";
                $this->render('admin');
            }
        }
    }
    
    private function testNom($data){
        $this->isEmptyField($_POST['nom']);
        if(count_chars($data) > 30){
             $this->message = "Le nom est trop grand !!! Max : 30 caractère";
             $this->render('admin');
        }
    }
    
    private function testDescription($data){
        if(count_chars($data) > 150){
             $this->message = "La description est trop grande !!! Max : 150 caractère";
             $this->render('admin');
        }
    }
    
    private function testPrix($data){
         if(!preg_match("!^[0-9]{1,2}([.][0-9]{0,2})?$!", $data)){
                $this->message = "Un des montants est mal saisie ! attention a la syntaxe";
                $this->render('admin');
            }
    }
    
    private function testSelect($data){
        
    }
    
    private function testImage(){
        if($_FILES['image']['error'] > 0){
            $this->message = "Erreur de chargement d'image !";
            $this->render('admin');
        }
        $extend = explode('.', $_FILES['image']['name']);
        if(strtolower($extend[1]) != jpg || strtolower($extend[1]) != png){
            $this->message = "Extention d'image incorrect ! .jpg ou .png attendue !";
            $this->render('admin');
        }
        if($_FILES['image']['size'] > 1024){
            $this->message = "Erreur de chargement d'image !";
            $this->render('admin');
        }
        if($_FILES['image']['tmp_name']){;}
    }
}
