<?php

/**
 * Read And Write Csv File
 *
 * @author LEFEBVRE Julien
 */
class productCsv extends connectCsv{
    
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
     * @wait array
     */
    public function setProduct(array $data){
        foreach ($data as $fields) {
            fputcsv($this->connection, $fields, ';', ' ');
        }
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
    
}
