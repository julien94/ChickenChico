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
    private $string;

    public function __construct() {
        session_start();
        
    }

    public function userConnect() {
        if (isset($_POST['mail']) && isset($_POST['mdp'])) {
            if (!$this->checkUser($_POST['mail'], $_POST['mdp'])) {
                $this->setMsg("Erreur Email / Password");
                $this->render('accueil');
            } 
            else {$this->viewOption();}
        }
        else{header('location:accueil');}
    }

    public function viewOption() {
        $this->render('admin');
    }

    public function viewCategory($opt) {
        $this->checkSession();
        $_POST['select'] = (!isset($_POST['select'])) ? null : $_POST['select'];
        $this->fh = new formHandler();
        $this->form = $this->fh->{$opt . 'category'}($_POST['select']);
        $this->add($this->form);
        $this->viewOption();
    }

    public function addCategory() {
        $this->checkSession();
        if (!isset($_POST['new'])) {
            header('location:accueil');
        }
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
