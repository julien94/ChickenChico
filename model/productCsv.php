<?php

/**
 * Read And Write Csv File
 *
 * @author LEFEBVRE Julien
 */
class productCsv extends controllerCsv{
    
    private $product;
    private $listp = array();
    private $xpl;
    
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
            if($category === $this->product[5]){$this->listp[] = $this->product;}
        }
        $this->closeCsv();
        return $this->listp;
    }
    
    /**
     * @param String $nom
     * @return Objet
     */
    public function getProductByNom($nom){
        while($this->product = fgetcsv($this->connection, 255, ";")){
            if($nom === $this->product[0]){
                return new product($this->product[0], $this->product[1], $this->product[2], $this->product[5], $this->product[3], $this->product[4]);
            }
        }
        $this->closeCsv();
    }
    
    /**
     * @param array $data
     */
    public function addProduct($data){
        if(fputs($this->connection, $data->toString()."\r\n")){$this->returnMsg('Le produit "'.$data.'" à bien été ajouté');}
        else{$this->returnMsg('Probleme d\'ajout de produit, contacter le developpeur');}
        $this->closeCsv();
    }
   
    public function updProduct($old, $product){
        foreach ($this->getAllProduct() as $prod){
            $this->xpl = explode($prod, ";");
            if($old == $this->xpl[0]){$this->listp = $product->getAll();}
            else{$this->listp = $prod;}
        }
        $this->closeCsv();
        $this->connectCsv("product", "w+");
        
    }
    
}
