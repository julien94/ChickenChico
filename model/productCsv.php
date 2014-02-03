<?php

/**
 * Read And Write Csv File
 *
 * @author LEFEBVRE Julien
 */
class productCsv extends controllerCsv{
    
    private $product;
    private $listp = array();
    private $bad;
    private $good;
    
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
        if(fputs($this->connection, $data->toString()."\r\n")){$this->returnMsg('Ajout réussie');}
        else{$this->returnMsg('Echec d\'ajout de produit, contacter l\'administrateur');}
        $this->closeCsv();
    }
   
    public function updProduct($old, $product){
        foreach ($this->getAllProduct() as $prod){
            if($old == $prod[0]){$this->listp = $product->getAll();}
            else{$this->listp = $prod;}
        }
        $this->connectCsv("product", "w+");
        while(!feof($this->listp)){
            if(fputs($this->connection, $this->listp[0].";".$this->listp[1].";".$this->listp[2].";".$this->listp[3].";".$this->listp[4].";".$this->listp[5]."\r\n")){$this->good = true;}
            else{$this->bad = true;}
        }
        $this->closeCsv();
        if($this->bad == true){$this->returnMsg('Echec de la modification, contacter l\'administrateur du site');}
        else{if($this->good == true){$this->returnMsg('Modification réussie');}}
    }
    
}
