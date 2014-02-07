<?php

/**
 * Description of test
 *
 * @author stagiaire
 */
class test extends controleur{
    
    private $test;
    private $cat;
    
    
    public function __construct() {
      
        $texte = "la ca (vas";
        $champs = array("/</","/>/","/\(/","/\)/","/'/",'/"/',"/\[/","/\]/","/{/","/}/");
        foreach($champs as $car){
            if(preg_match($car, $texte)){print_r("c bon<br/>");}
            else{print_r("c pas bon<br/>");}
        }
        
    }
    
}
