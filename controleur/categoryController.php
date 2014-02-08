<?php

/**
 * @author LEFEBVRE Julien
 */
class categoryController extends controleur{
    
    private $fh;
    private $form;
    
    public function view($opt, $select = null) {
        print_r($opt);
        if($opt == null){$opt = "new";}
        $this->fh = new formHandler();
        $this->form = $this->fh->{$opt . 'Category'}($select);
        $this->addData($this->form);
        $this->render('admin');
    }

    public function add() {
        if($this->checkfield($_POST['new'])){
            $this->csv = new categoryCsv();
            $this->csv->addCategory($_POST['new']);
        }
    }

    public function updCategory() {
        if(!isset($_POST['name']) && !isset($_POST['old'])) {header('location:/accueil');}
        if($this->checkfield($_POST['new'])){
            $this->csv = new categoryCsv();
            $this->csv->updCategory($_POST['old'], $_POST['new']);
        }
    }

    public function delCategory() {
        if(!isset($_POST['name'])){header('location:/accueil');}
        if($this->checkField($_POST['name'])){
            $this->csv = new categoryCsv();
            $this->csv->delCategory($_POST['name']);
        }
    }
}
