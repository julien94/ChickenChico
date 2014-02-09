<?php

/**
 * @author LEFEBVRE Julien
 */
class productService extends controleur{
    
    private $fh;
    private $form;
    private $dao;
    private $select = null;
    
    public function view($opt, $select) {
        if($opt == null){$opt = "new";}
        if($select != null){$this->select = $this->getObjProduct($select);}
        $this->fh = new formHandler($this->select, $this->getServiceCategorys(), $this->getProducts());
        $this->form = $this->fh->{$opt . 'Product'}($this->select);
        $this->addData($this->form);
        $this->render('admin');
    }

    public function add(product $product) {
        if($this->checkfield("Product", $product)){
            $this->dao = new productDao();
            $this->dao->addProduct($product);
        }
    }

    public function upd(product $product) {
        if($this->checkfield("Product", $product)){
            $this->dao = new productDao();
            $this->dao->updProduct($product);
        }
    }

    public function del(product $product) {
        if($this->checkField($product)){
            $this->dao = new productDao();
            $this->dao->delProduct($product);
        }
    }
    
    public function getProducts(){
        $this->dao = new productDao();
        return $this->dao->getAllProduct();
    }
    
    public function getObjProduct($name){
        $this->dao = new productDao();
        return $this->dao->getProductByNom($name);
    }
    
    private function getServiceCategorys(){
       $this->service = new categoryService();
       return $this->service->getCategorys();
    }
}
