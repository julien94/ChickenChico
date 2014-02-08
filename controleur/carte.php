<?php
/**
 * @author boudha
 */
class carte extends controleur{
     private $listObjCategory = array();
     private $categoryCsv;
     private $receive;
     
     public function __construct() {
         $this->categoryCsv = new categoryCsv();
         foreach ($this->categoryCsv->getAllCategory() as $this->receive){
             $this->listObjCategory[] = new category($this->receive[0]);
             $this->listObjCategory[]->attachProduct();
         }
         $this->set($this->listObjCategory);
         $this->render('carte');
         
     }
     
}
