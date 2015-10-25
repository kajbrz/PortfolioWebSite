<?php
    abstract class Model
    {
        
        private $nameDatabase;
        private $portDatabase;
        private $ipDatabase;    
        private $username ;
        private $password;       
        protected $connection ;
        
        abstract public function getRecord(&$dest, $id);
        abstract public function getRecords(&$dest);
        
        public function __construct($name, $port, $ip, $user, $pass)
        {
            $this->nameDatabase = $name;
            $this->portDatabase = $port;
            $this->ipDatabase = $ip;
            
            $this->username = $user;
            $this->password = $pass;
            
            $this->connect();
        }
        
        private function connect()
        {
            $this->connection =
                mysqli_connect(
                  $this->ipDatabase,
                  $this->username,
                  $this->password,
                  $this->nameDatabase,
                  $this->portDatabase
                );
        }
        
        
        
    }
?>
