<?php

/**
 * CRUD Product Csv File
 *
 * @author LEFEBVRE Julien
 */
class productDao extends controllerDao{
    
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
            if($categoryName === $this->product[5]){$this->listGet[] = $this->product;}
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
    public function addProduct(product $product){
        $this->connectCsv("product", "a+");
        if(fputs($this->connection, $product->toString()."\r\n")){$this->good = true;}
        $this->updImage($product->getImageName(), $product->getImageTmpName());
        $this->closeCsv();
        return $this->good;
    }
   
    /**
     * @param Objet $product
     */
    public function updProduct(product $product){
        foreach ($this->getAllProduct() as $prod){
            if($product->getOldName() == $prod[0]){
                if($product->getImage() == null){$product->setOldImage($prod[4]);}
                else{$this->deleteImage($prod[4]);}
                $this->listSet[] = $product->getAll();
                $this->updImage($product->getImageName(), $product->getImageTmpName());
            }
            else{$this->listSet[] = $prod;}}
        $this->updFile();
        return $this->good;
    }
    
    /**
     * @param Object $product
     */
    public function delProduct(product $product){
        foreach($this->getAllProduct() as $prod){
            if($prod[0] != $product->getName()){
                $this->listSet[] = $prod;
                $this->deleteImage($prod[4]);
            }
        }
        $this->updFile();
        return $this->good;
    }
    
    private function updFile(){
        $this->connectCsv("product", 'w+');
        for($i=0; $i<count($this->listSet); $i++){
            if(fputs($this->connection, $this->listSet[$i][0].";".$this->listSet[$i][1].";".$this->listSet[$i][2].";".$this->listSet[$i][3].";".$this->listSet[$i][4].";".$this->listSet[$i][5]."\r\n")){$this->good = true;}
        }
        $this->closeCsv();
    }
    
    private function updImage($new, $way){
        if(!file_exists(ROOT."image/menu/".$new)){move_uploaded_file($way, ROOT."image/menu/".$new);}
    }
    
    private function deleteImage($img){
        if(file_exists("image/menu/".$img) && $img != "no-image.jpg"){
                        umask(0000); 
                        chmod(ROOT."image/menu/".$img,0777); 
                        unlink(ROOT."image/menu/".$img);
        }
    }
    
}
