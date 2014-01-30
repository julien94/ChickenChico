<?php

/**
 * Read And Write Csv File
 *
 * @author LEFEBVRE Julien
 */
class productCsv extends controllerCsv{
    
    private $product;
    private $listp = array();
    
    public function __construct() {
        $this->connectCsv('product');
    }
    
    /**
    * @return array
    */
    public function getAllProduct(){
        while($this->product = fgetcsv($this->connection, 255, ";")){
            $this->listp[] = $this->product;
        }
        $this->closeCsv();
        return $this->listp;
    }
    
     /**
     * @return array
     */
    public function getProductBy($category){
        while($this->product = fgetcsv($this->connection, 255, ";")){
            if($category === $this->product[5]){
                $this->listp[] = $this->product;
            }
        }
        $this->closeCsv();
        return $this->listp;
    }
    
    /**
     * @param array $data
     */
    public function addProduct($data){
        foreach ($data as $fields) {
            fputcsv($this->connection, $fields, ';', ' ');
        }
    }
   
   
    
}
