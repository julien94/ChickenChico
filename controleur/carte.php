<?php
/**
 * @author LEFEBVRE Julien
 */
class carte extends controleur{
     private $listObjCategory = array();
     private $service;
     private $receive;
     private $obj;
     
     public function __construct() {
         $this->service = new categoryService();
         foreach ($this->service->getCategorys() as $this->receive){
             $this->obj = new category($this->receive[0]);
             $this->obj->attachProduct();
             $this->listObjCategory[] = $this->obj;
         }
         $this->set($this->listObjCategory);
         $this->render('carte');
         
     }
     
}
