<?php

/**
 * @author LEFEBVRE Julien
 */
class productService extends controleur {
    
    private $fh;
    private $form;
    private $dao;
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
            $this->dao = new productDao();
            $this->returnMsg($this->dao->addProduct($product), "Ajout");
        }
    }

    public function upd(product $product) {
        $this->testObj = new checkObjProduct($product);
        if($this->testObj->start()){
            $this->dao = new productDao();
            $this->returnMsg($this->dao->updProduct($product), "Modification");
        }
    }

    public function del(product $product) {
        $this->dao = new productDao();
        $this->returnMsg($this->dao->delProduct($product), "Suppression");
    }
    
    public function getProducts(){
        $this->dao = new productDao();
        return $this->dao->getAllProduct();
    }
    
    public function getObjProduct($name){
        $this->dao = new productDao();
        return $this->dao->getProductByNom($name);
    }
    
    public function getProductByCat($name){
        $this->dao = new productDao();
        return $this->dao->getProductBy($name);
    }
    
    private function getServiceCategorys(){
       $this->service = new categoryService();
       return $this->service->getCategorys();
    }
    
}
