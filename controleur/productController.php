<?php

/**
 * @author LEFEBVRE Julien
 */
class productController {
    
    private $fh;
    
    public function view($opt, $select = null) {
        if($opt == null){$opt = "new";}
        $this->fh = new formHandler();
        $this->form = $this->fh->{$opt . 'Product'}($select);
        $this->addData($this->form);
        $this->render('admin');
    }

    public function addProduct($objProduct) {
        if($this->checkfield("Product", $objProduct)){
            $this->csv = new productCsv();
            $this->csv->addProduct($objProduct);
        }
    }

    public function updProduct() {
        if(!isset($_POST['nom']) && !isset($_POST['old'])) {header('location:/accueil');}
        $this->image = new image($_FILES['image']['error'],$_FILES['image']['name'],$_FILES['image']['size'],$_FILES['image']['tmp_name']);
        $this->product = new product($_POST['nom'], $_POST['description'], $_POST['pu'], $_POST['category'], $_POST['pm'], $this->image);
        if($this->checkfield("Product", $this->product)){
            $this->csv = new productCsv();
            $this->csv->updProduct($_POST['old'], $this->product);
        }
    }

    public function delProduct() {
        if(!isset($_POST['name'])){header('location:/accueil');}
        if($this->checkField($_POST['name'])){
            $this->csv = new productCsv();
            $this->csv->delProduct($_POST['name']);
        }
    }
}
