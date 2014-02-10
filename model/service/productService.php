<?php

/**
 * @author LEFEBVRE Julien
 */
class productService extends controleur{
    
    private $fh;
    private $form;
    private $dao;
    private $service;
    private $object = null;
    
    public function view($opt, $select) {
        if($opt == null){$opt = "new";}
        if($select != null){$this->object = $this->getObjProduct($select);}
        $this->fh = new formHandler($this->object, $this->getServiceCategorys(), $this->getProducts());
        $this->form = $this->fh->{$opt . 'Product'}();
        $this->addData($this->form);
        $this->render('admin');
    }

    public function add(product $product) {
        if($this->checkfield("Product", $product)){
            $this->dao = new productDao();
            $this->returnMsg($this->dao->addProduct($product), "ajout");
        }
    }

    public function upd(product $product) {
        if($this->checkfield("Product", $product)){
            $this->dao = new productDao();
            $this->returnMsg($this->dao->updProduct($product), "modification");
        }
    }

    public function del(product $product) {
        if($this->checkField("Product", $product)){
            $this->dao = new productDao();
            $this->returnMsg($this->dao->delProduct($product), "suppression");
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
    
    public function returnMsg($good, $subject){
        if($good == false){$this->setMsg('Echec "'.$subject.'", contacter l\'administrateur');}
        else{$this->setMsg($subject.' réussie');}
        $this->render("admin");
    }
}
