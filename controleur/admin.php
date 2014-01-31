<?php

/**
 * @author LEFEBVRE Julien
 */
class admin extends controleur {

    private $csv;
    private $form;
    private $product;
    private $fh;
    private $url;

    public function __construct() {
        session_start();
        if (!isset($_POST['mail']) && !isset($_POST['mdp'])) {$this->checkSession();}
        $this->url = explode('/', $_SERVER['REDIRECT_URL']);
        if($this->url[2] == ""){header('location:/admin/option');}
    }
    
    public function option(){
        $this->render('admin');
    }

    public function userConnect() {
        if (!isset($_POST['mail']) && !isset($_POST['mdp'])) {header('location:/accueil');}
        if ($this->checkUser($_POST['mail'], $_POST['mdp'])) {header('location:/admin/option');}
    }

    public function viewCategory($opt) {
        $_POST['select'] = (!isset($_POST['select'])) ? null : $_POST['select'];
        if($opt == null){$opt = "new";}
        $this->fh = new formHandler();
        $this->form = $this->fh->{$opt . 'category'}($_POST['select']);
        $this->add($this->form);
        $this->render('admin');
    }

    public function addCategory() {
        if (!isset($_POST['new'])) {header('location:/accueil');}
        if($this->checkfield($_POST['new'])){
            $this->csv = new categoryCsv();
            $this->csv->addCategory($_POST['new']);
        }
    }

    public function updCategory() {
        if(!isset($_POST['new']) && !isset($_POST['old'])) {header('location:/accueil');}
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

    public function viewProduct($opt) {
        $_POST['select'] = (!isset($_POST['select'])) ? null : $_POST['select'];
        if($opt == null){$opt = "new";}
        $this->fh = new formHandler();
        $this->form = $this->fh->{$opt . 'Product'}($_POST['select']);
        $this->add($this->form);
        $this->render('admin');
    }

    public function addProduct() {
        if (!isset($_POST['nom'])) {header('location:/accueil');}
        if($this->checkfield($_POST['nom'])){
            $this->product = new product($_POST['nom'],$_POST['description'],$_POST['pu'],$_POST['category'],$_POST['pm'],"");
            $this->csv = new productCsv();
            $this->csv->addProduct($this->product);
        }
    }

    public function updProduct() {
        
    }

    public function delProduct() {
        
    }

}
