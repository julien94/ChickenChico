<?php

/**
 * @author LEFEBVRE Julien
 */
class admin extends controleur {

    private $user;
    private $userCsv;
    private $catCsv;
    private $form;
    private $fh;
    private $url;

    public function __construct() {
        session_start();
        $this->url = explode('/', $_SERVER['REDIRECT_URL']);
        if($this->url[2] == ""){header('location:admin/option');}
    }
    
    public function option(){
        $this->checkSession();
        $this->render('admin');
    }

    public function userConnect() {
        if (isset($_POST['mail']) && isset($_POST['mdp'])) {
            if (!$this->checkUser($_POST['mail'], $_POST['mdp'])) {
                $this->setMsg("Erreur Email / Password");
                $this->render('accueil');
            } else {header('location:/admin/option');}
        } else {header('location:accueil');}
    }

    public function viewCategory($opt) {
        $this->checkSession();
        $_POST['select'] = (!isset($_POST['select'])) ? null : $_POST['select'];
        $this->fh = new formHandler();
        $this->form = $this->fh->{$opt . 'category'}($_POST['select']);
        $this->add($this->form);
        $this->render('admin');
    }

    public function addCategory() {
        $this->checkSession();
        if (!isset($_POST['new'])) {header('location:accueil');}
        if ($this->checkfield($_POST['new'])) {
            $this->catCsv = new categoryCsv();
            $this->msg = $this->catCsv->addCategory($_POST['new']);
            $this->setMsg($this->msg);
            $this->render('admin');
        }
    }

    public function updCategory() {
        
    }

    public function delCategory() {
        $this->checkSession();
        if(!isset($_POST['name'])){header('location:accueil');}
        if($this->checkField($_POST['name'])){
             $this->catCsv = new categoryCsv();
             $this->msg = $this->catCsv->delCategory($_POST['name']);
             $this->setMsg($this->msg);
             $this->render('admin');
        }
    }

    public function viewProduct() {
        
    }

    public function addProduct() {
        
    }

    public function updProduct() {
        
    }

    public function delProduct() {
        
    }

}
