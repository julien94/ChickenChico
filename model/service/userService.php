<?php

/**
 * @author LEFEBVRE Julien
 */
class userService extends controleur{
    
    private $userDao;
    private $admin;
    private $testUser;
    
    public function checkUser(user $user){
        $this->userDao = new userDao();
        if($this->userDao->getPseudo() !== $user->getEmail() || $this->userDao->getPwd() !== $user->getPassword()){
            $this->setMsg('Email / Password Error');
            $this->render('accueil');
        }
        else{
            $this->admin = new user($user->getEmail(), $user->getPassword());
            $_SESSION['admin'] = serialize($this->admin);
            return true;
        }
    }
    
    public function checkSession(){
        if(!isset($_POST['mail']) && !isset($_POST['mdp'])){
            if(isset($_SESSION['admin'])){$this->testUser = unserialize($_SESSION['admin']);}
            else{$this->testUser = new user("", "");}
            $this->userDao = new userDao();
            if($this->userDao->getPseudo() !== $this->testUser->getEmail() || $this->userDao->getPwd() !== $this->testUser->getPassword()){
                header('location:/accueil');
            }
        } 
    }
}
