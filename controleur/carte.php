<?php
/**
 * @author boudha
 */
class carte extends controleur{
     private $listObjCategory = array();
     private $service;
     private $receive;
     
     public function __construct() {
         $this->service = new categoryService();
         foreach ($this->service->getCategorys() as $this->receive){
             $test = new category($this->receive[0]);
             $test->attachProduct();
             $this->listObjCategory[] = $test;
         }
         $this->set($this->listObjCategory);
         $this->render('carte');
         
     }
     
}
