<?php

/**
 * Read And Write Csv File
 *
 * @author LEFEBVRE Julien
 */
class productCsv extends controllerCsv{
    
    private $product;
    private $listp = array();
    private $arrayp = array();
    private $good = false;
    
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
            if($old == $prod[0]){$this->arrayp[] = $product->getAll();}
            else{$this->arrayp[] = $prod;}
        }
        $this->connectCsv("product", "w+");
        for($i=0; $i<3; $i++){
            if(fputs($this->connection, $this->arrayp[$i][0].";".$this->arrayp[$i][1].";".$this->arrayp[$i][2].";".$this->arrayp[$i][3].";".$this->arrayp[$i][4].";".$this->arrayp[$i][5]."\r\n")){$this->good = true;}
        }
        $this->closeCsv();
        if($this->good == false){$this->returnMsg('Echec de la modification, contacter l\'administrateur du site');}
        else{$this->returnMsg('Modification réussie');}
    }
    
}
