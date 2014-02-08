<?php

/**
 * @author LEFEBVRE Julien
 */
class categoryService extends controleur{
    
    private $fh;
    private $form;
    private $csv;
    
    public function view($opt, $select = null) {
        print_r($opt);
        if($opt == null){$opt = "new";}
        $this->fh = new formHandler();
        $this->form = $this->fh->{$opt . 'Category'}($select);
        $this->addData($this->form);
        $this->render('admin');
    }

    public function add(category $category) {
        if($this->checkfield("Category", $category)){
            $this->csv = new categoryDao();
            $this->csv->addCategory($category);
        }
    }

    public function upd(category $category) {
        if($this->checkfield($category)){
            $this->csv = new categoryDao();
            $this->csv->updCategory($category);
        }
    }

    public function del(category $category) {
        if($this->checkField($category)){
            $this->csv = new categoryDao();
            $this->csv->delCategory($category);
        }
    }
}
