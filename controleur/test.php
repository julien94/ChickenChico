<?php

/**
 * Description of test
 *
 * @author stagiaire
 */
class test {
    
    public function __construct() {
        $produit = new product("toto", "titi", "2.5", "plouf", "3.6", "test.jpg");
        echo $produit->getPrixMenu();
    }
    
}
