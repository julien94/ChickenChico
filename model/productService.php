<?php

/**
 * @author LEFEBVRE Julien
 */
class productService extends controleur{
    
    private $fh;
    private $form;
    private $csv;
    
    public function view($opt, $select = null) {
        if($opt == null){$opt = "new";}
        $this->fh = new formHandler();
        $this->form = $this->fh->{$opt . 'Product'}($select);
        $this->addData($this->form);
        $this->render('admin');
    }

    public function addProduct(product $product) {
        if($this->checkfield("Product", $product)){
            $this->csv = new productDao();
            $this->csv->addProduct($product);
        }
    }

    public function updProduct(product $product) {
        if($this->checkfield("Product", $product)){
            $this->csv = new productDao();
            $this->csv->updProduct($product);
        }
    }

    public function delProduct(product $product) {
        if($this->checkField($product)){
            $this->csv = new productDao();
            $this->csv->delProduct($product);
        }
    }
}
