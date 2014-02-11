<?php

class controleur {
    
    private $data = array();
    private $msg = array();
    private $array;
    private $image;
    private $userDao;
    private $testUser;
    private $admin;
    
    public function set($value){
        $this->data = array_merge($this->data, $value);
    }
    
    public function addData($value){
        $this->data[] = $value;
    }
    
    public function setMsg($message){
        $this->msg[] = $message;
    }
    
    public function render($way){
        extract($this->msg);
        extract($this->data);
        require (ROOT.'vue/'.$way.'.php');
        
    }
    
    public function returnMsg($good, $subject){
        if($good == false){$this->setMsg('Echec "'.$subject.'", contacter l\'administrateur');}
        else{$this->setMsg($subject.' réussie');}
        $this->render("admin");
    }
    
    public function toArray($string){
        return $this->array = array($string);
    }
    
    private function updImage($new, $way){
        if(!file_exists(ROOT."image/menu/".$new)){move_uploaded_file($way, ROOT."image/menu/".$new);}
    }
    
    private function deleteImage($img){
        if(file_exists("image/menu/".$img) && $img != "no-image.jpg"){
                        umask(0000); 
                        chmod(ROOT."image/menu/".$img,0777); 
                        unlink(ROOT."image/menu/".$img);
        }
    }
    
}

