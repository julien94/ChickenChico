<?php


class appStart {

    private $xplurl;
    private $controleur;
    private $method;
    private $var;
    private $var2;
    private $level;
    
    public function __construct()
    {
        $this->xplurl = explode('/', $_SERVER['REDIRECT_URL']);
        for($i=1; $i<count($this->xplurl); $i++){
            $this->level .= "../";
        }
        define('ROOTHTML', $this->level);
        $this->startRooting();
    }
    
    private function startRooting()
    {
        $this->controleur = $this->xplurl[1];
        $this->method = (empty($this->xplurl[2]))? null : $this->xplurl[2];
        $this->var = (empty($this->xplurl[3]))? null : $this->xplurl[3];
        $this->var2 = (empty($this->xplurl[4]))? null : $this->xplurl[4];
        if(file_exists(ROOT.'controleur/'.$this->controleur.'.php')){
            $this->controleur = new $this->controleur();
            if($this->method != null){    
                if(method_exists($this->controleur, $this->method)){
                    $this->controleur->{$this->method}($this->var, $this->var2);
                }
                else{header('location:/erreur404');}
            }
        }
        else{header('location:/accueil');} 
    }
}
