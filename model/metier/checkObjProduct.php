<?php

/**
 * @author LEFEBVRE Julien
 */
class checkObjProduct extends controleur{
    
    private $product;
    private $goodbad = true;
    private $specialCaract = array("/</","/>/","/\(/","/\)/","/'/",'/"/',"/\[/","/\]/","/{/","/}/");
    
    public function __construct(product $product) {
        $this->product = $product;
    }
    
    public function start(){
        if($this->testName($this->product->getName())){
            if($this->testDescription($this->product->getDescription())){
                if($this->testPrix($this->product->getprix())){
                    if($this->testPrix($this->product->getprixMenu())){
                        if($this->testImage($this->product->getImage())){return true;}
                    }
                }
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
        if($this->isEmptyField($name)){
            if($this->badCaract($name)){
                if(strlen($name) > 30){
                    $this->setMsg("Le nom est trop grand !!! Max : 30 caractère");
                    $this->render('admin');
                }
                else{return true;}
            }
        }
    }
    
    private function testDescription($description){
        if($this->isEmptyField($description)){
            if($this->badCaract($description)){
                if(strlen($description) > 150){
                    $this->setMsg("La description est trop grande !!! Max : 150 caractère");
                    $this->render('admin');
                }
                else{return true;}
            }
        }
    }
    
    private function testPrix($prix){
        if($prix != ""){
            if(!preg_match("!^[0-9]{1,2}([.][0-9]{0,2})?$!", $prix)){
                $this->setMsg("Un des montants est mal saisie ! attention à la syntaxe (ex : 3.50)");
                $this->render('admin');
            }
            else{return true;}
        }
        else{return true;}
    }
    
    private function testImage($objImage){
        if($objImage != null){
            if($objImage->getError() > 0){
                $this->setMsg("Erreur de chargement d'image !");
                $this->render('admin');
            }
            else{
                $extend = explode('.', $objImage->getName());
                if($this->badCaract($extend[0])){
                    if(strtolower($extend[1]) != "jpg" && strtolower($extend[1]) != "png"){
                        $this->setMsg("Extention d'image incorrect ! .jpg ou .png attendue !");
                        $this->render('admin');
                    }
                    else{
                        if($objImage->getSize() > 1024000){
                            $this->setMsg("Erreur poid de l'image !");
                            $this->render('admin');
                        }
                        else{return true;}
                    }
                }
            }
        }
        else{return true;}
    }
}
