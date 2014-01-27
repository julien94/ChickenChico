<?php

/**
 * @author LEFEBVRE Julien
 */
class admin extends controleur {

    private $d;
    private $user;
    private $userCsv;
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
                //$this->viewNewCategory();
                //$this->render('admin');
            }
        } else {
            if (isset($_SESSION['admin'])) {
                $this->user = unserialize($_SESSION['admin']);
                if (!$this->checkUser($this->user->getEmail(), $this->user->getPassword())) {
                    header('location:accueil');
                } else {
                    
                    //$this->viewNewCategory();
                }
            } else {
                header('location:accueil');
            }
        }
    }
    public function viewCategory($opt, $id = null){
        $this->fh = new formHandler();
        $this->form = $this->fh->$opt.category($id);
        
        $this->add($this->form);
        $this->render('admin');
    }  
    
    public function addCategory(){
        
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
