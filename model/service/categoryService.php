<?php

/**
 * @author LEFEBVRE Julien
 */
class categoryService extends controleur{
    
    private $fh;
    private $form;
    private $dao;
    private $service;
    private $object = null;
    private $testObj;
    
    public function view($opt, $select) {
        if($opt == null){$opt = "new";}
        if($select != null){$this->object = $this->getObjCategory($select);}
        $this->fh = new formHandler($this->object, $this->getCategorys(), $this->getServiceProducts());
        $this->form = $this->fh->{$opt . 'Category'}();
        $this->addData($this->form);
        $this->render('admin');
    }

    public function add(category $category) {
        $this->testObj = new checkObjCategory($category);
        if($this->testObj->start()){
            $this->dao = new categoryDao();
            $this->returnMsg($this->dao->addCategory($category), "Ajout");
        }
    }

    public function upd(category $category) {
        $this->testObj = new checkObjCategory($category);
        if($this->testObj->start()){
            $this->dao = new categoryDao();
            $this->returnMsg($this->dao->updCategory($category), "Modification");
        }
    }

    public function del(category $category) {
        $this->dao = new categoryDao();
        $this->returnMsg($this->dao->delCategory($category), "Suppression");
    }
    
    public function getCategorys(){
        $this->dao = new categoryDao();
        return $this->dao->getAllCategory();
    }
    
    public function getObjCategory($name){
        $this->dao = new categoryDao();
        return $this->dao->getCategoryByName($name);
    }
    
    private function getServiceProducts(){
       $this->service = new productService();
       return $this->service->getProducts();
    }
}
