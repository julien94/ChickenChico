<?php

/**
 * @author LEFEBVRE Julien
 */
class productService extends controleur {
    
    private $fh;
    private $form;
    private $factDao;
    private $fDao;
    private $service;
    private $object = null;
    private $testObj;
    
    public function view($opt, $select) {
        if($opt == null){$opt = "new";}
        if($select != null){$this->object = $this->getObjProduct($select);}
        $this->fh = new formHandler($this->object, $this->getServiceCategorys(), $this->getProducts());
        $this->form = $this->fh->{$opt . 'Product'}();
        $this->addData($this->form);
        $this->render('admin');
    }

    public function add(product $product) {
        $this->testObj = new checkObjProduct($product);
        if($this->testObj->start()){
            $this->factDao = new factoryDao("product");
            $this->fDao = $this->factDao->getDao();
            $this->returnMsg($this->fDao->addProduct($product), "Ajout");
        }
    }

    public function upd(product $product) {
        $this->testObj = new checkObjProduct($product);
        if($this->testObj->start()){
            $this->factDao = new factoryDao("product");
            $this->fDao = $this->factDao->getDao();
            $this->returnMsg($this->fDao->updProduct($product), "Modification");
        }
    }

    public function del(product $product) {
        $this->factDao = new factoryDao("product");
        $this->fDao = $this->factDao->getDao();
        $this->returnMsg($this->fDao->delProduct($product), "Suppression");
    }
    
    public function getProducts(){
        $this->factDao = new factoryDao("product");
        $this->fDao = $this->factDao->getDao();
        return $this->fDao->getAllProduct();
    }
    
    public function getObjProduct($name){
        $this->factDao = new factoryDao("product");
        $this->fDao = $this->factDao->getDao();
        return $this->fDao->getProductByNom($name);
    }
    
    public function getProductByCat($name){
        $this->factDao = new factoryDao("product");
        $this->fDao = $this->factDao->getDao();
        return $this->fDao->getProductBy($name);
    }
    
    private function getServiceCategorys(){
       $this->service = new categoryService();
       return $this->service->getCategorys();
    }
    
}
