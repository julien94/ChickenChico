<?php

/**
 * @author LEFEBVRE Julien
 */
class userService extends controleur{
    
    private $factDao;
    private $admin;
    private $testUser;
    
    public function view($user = null, $msg = null){
        $this->fh = new formHandler(null, null, null);
        $this->form = $this->fh->{'user'}();
        if($msg != null){$this->setMsg($msg);}
        $this->addData($this->form);
        $this->render('admin');
    }
    
    public function deconnexion(){
        session_destroy();
        header('location:/accueil');
    }
    
    public function connexion(user $user){
        $this->factDao = new factoryDao("user");
        if($this->factDao->getPseudo() !== $user->getEmail() || $this->factDao->getPwd() !== $user->getPassword()){
            $this->view("", "Erreur Login ou Mot de passe !");
        }
        else{
            $this->admin = new user($user->getEmail(), $user->getPassword());
            $_SESSION['admin'] = serialize($this->admin);
            header('location:/admin/option');
        }
    }
    
    public function checkSession(){
        if(isset($_SESSION['admin'])){
            $this->testUser = unserialize($_SESSION['admin']);
            $this->factDao = new factoryDao("user");
            if($this->factDao->getPseudo() !== $this->testUser->getEmail() || $this->factDao->getPwd() !== $this->testUser->getPassword()){
                header('location:/accueil');
            }
            else{return true;}
        }
        else{header('location:/accueil');}
    }
}
