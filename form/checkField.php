<?php

/**
 * @author LEFEBVRE Julien
 */
class checkField extends controleur{
    
    private $message;
    private $specialCaract = array("/</","/>/","/\(/","/\)/","/'/",'/"/',"/\[/","/\]/","/{/","/}/");
    
    public function __construct() {
        
    }
    
    public function test($nameField, $dataField){
        $this->isEmptyField($dataField);
        $this->badCaract($dataField);
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
        if(count_chars($data) > 30){
             $this->message = "Le nom est trop grand !!! Max : 30 caractère";
             $this->render('admin');
        }
    }
    
    private function testDescription($data){
        
    }
    
    private function testPrix(){
         if(preg_match("", $data)){
                $this->message = "Un des champs contient un caractère non autorisé ! ex:()[]'\"\\<>";
                $this->render('admin');
            }
    }
    
    private function testSelectField($data){
        
    }
    
    private function testImageField($data){
        
    }
}
