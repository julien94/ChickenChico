<?php

/**
 * @author LEFEBVRE Julien
 */
class checkObjCategory extends controleur{
    
    private $goodbad = true;
    private $category;
    private $specialCaract = array("/</","/>/","/\(/","/\)/","/'/",'/"/',"/\[/","/\]/","/{/","/}/");
    
    public function __construct($category) {
        $this->category = $category;
    }
    
    public function start(){
        if($this->isEmptyField($this->category->getName())){
            if($this->badCaract($this->category->getName())){
                if($this->testName($this->category->getName())){return true;}
            }
        }
    }
    
    private function isEmptyField($data){
       if(empty($data)){
           $this->setMsg("Un des Champs est vide !");
           $this->render('admin');
       }
       else{return true;}
    }
    
    private function badCaract($data){
        foreach($this->specialCaract as $caract){
            if(preg_match($caract, $data)){$this->goodbad = false;}
        }
        if($this->goodbad == false){ 
            $this->setMsg("Un des champs contient un caractère non autorisé ! ex:()[]'\"\\<>");
            $this->render('admin');
        }
        else{return $this->goodbad;}
    }
    
    private function testName($name){
        if(strlen($name) > 50){
             $this->setMsg("Le nom est trop grand !!! Max : 50 caractère");
             $this->render('admin');
        }
        else{return true;}
    }
}
