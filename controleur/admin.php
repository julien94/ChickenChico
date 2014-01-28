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
    private $msg = array();

    public function __construct() {
        session_start();
        if (isset($_POST['mail']) && isset($_POST['mdp'])) {
            if (!$this->checkUser($_POST['mail'], $_POST['mdp'])) {
                $this->msg = array("Erreur Email / Password");
                $this->set($this->msg);
                $this->render('accueil');
            } else {
                $this->admin = new user($_POST['mail'], $_POST['mdp']);
                $_SESSION['admin'] = serialize($this->admin);
                header('location:/admin/choise');
            }
        } else {
            if (isset($_SESSION['admin'])) {
                $this->user = unserialize($_SESSION['admin']);
                if (!$this->checkUser($this->user->getEmail(), $this->user->getPassword())) {
                    header('location:accueil');
                } else {
                    header('location:/admin/choise');
                  }
            } else {
                header('location:accueil');
            }
        }
    }
    
    public function choise(){
        $this->render('admin');
    }
    
    public function viewCategory($opt){
        if(!isset($_POST['select'])){$_POST['select'] = null;}
        $this->fh = new formHandler();
        $this->form = $this->fh->{$opt.'category'}($_POST['select']);
        
        $this->add($this->form);
        $this->render('admin');
    }  
    
    public function addCategory(){
        if(!isset($_POST['new'])){header('location:accueil');}
        if($this->checkfield($_POST['new'])){
            $this->catCsv = new categoryCsv();
            $this->msg = $this->catCsv->addCategory($_POST['new']);
            $this->setMsg($this->msg);
            $this->render('admin');
        }
    }
    
    public function updCategory(){
        
    }
    
    public function delCategory(){
        
    }
    
    public function viewProduct(){
        
    }

    public function addProduct() {
       
    }

    public function updProduct() {
       
    }

    public function delProduct() {
        
    }

}
