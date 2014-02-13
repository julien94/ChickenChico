<?php

/**
 * @author LEFEBVRE Julien
 */
class userDao{
    
    private $userFile;
    private $connection;
    private $fileConnect;
    
    public function getAdmin(){
        $this->connection = new connection();
        $this->fileConnect = $this->connection->connectCsv("user");
        $this->userFile = fgetcsv($this->fileConnect, 255, ";");
        $this->connection->closeCsv();
    }
    
    public function getPseudo(){
        $this->getAdmin();
        return $this->userFile[0];
    }
    
    public function getPwd(){
        $this->getAdmin();
        return $this->userFile[1];
    }
    
}
