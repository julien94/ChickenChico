<?php

/**
 * CRUD Product Csv File
 *
 * @author LEFEBVRE Julien
 */
class productCsv extends controllerCsv{
    
    private $product;
    private $good = false;
    private $listGet = array();
    private $listSet = array();
    
    public function __construct() {
    }
    
    /**
    * @return array
    */
    public function getAllProduct(){
        $this->connectCsv('product');
        while($this->product = fgetcsv($this->connection, 255, ";")){
            $this->listGet[] = $this->product;
        }
        $this->closeCsv();
        return $this->listGet;
    }
    
     /**
     * @param String $categoryName
     * @return array
     */
    public function getProductBy($categoryName){
        $this->connectCsv('product');
        while($this->product = fgetcsv($this->connection, 255, ";")){
            if($categoryName === $this->product[5]){$this->listp[] = $this->product;}
        }
        $this->closeCsv();
        return $this->listGet;
    }
    
    /**
     * @param String $name
     * @return Objet
     */
    public function getProductByNom($name){
        $this->connectCsv('product');
        while($this->product = fgetcsv($this->connection, 255, ";")){
            if($name === $this->product[0]){
                return new product($this->product[0], $this->product[1], $this->product[2], $this->product[5], $this->product[3], $this->product[4]);
            }
        }
        $this->closeCsv();
    }
    
    /**
     * @param objet $product
     */
    public function addProduct($product){
        $this->connectCsv("product", "a+");
        if(fputs($this->connection, $product->toString()."\r\n")){$this->good = true;}
        $this->closeCsv();
        $this->returnMsg("Ajout");
    }
   
    /**
     * @param String $old
     * @param Objet $product
     */
    public function updProduct($old, $product){
        foreach ($this->getAllProduct() as $prod){
            if($old == $prod[0]){$this->listSet[] = $product->getAll();}
            else{$this->listSet[] = $prod;}
        }
        if($this->updFile("product")){$this->returnMsg("Modification");}
    }
    
    /**
     * @param String $nom
     */
    public function delProduct($nom){
        foreach($this->getAllProduct() as $prod){
            if($prod != $nom){$this->listSet[] = $prod;}
        }
        if($this->updFile("product")){$this->returnMsg("Suppression");}
    }
}
