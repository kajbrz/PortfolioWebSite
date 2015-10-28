<?php
    include ('Core/Variables.php');
    abstract class Model
    {
        
        protected $variables;
        
        private $nameDatabase;
        private $portDatabase;
        private $ipDatabase;    
        private $username ;
        private $password;       
        protected $connection ;
                
        public function __construct($name, $port, $ip, $user, $pass)
        {
            $this->variables = new Variables();
            
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
        
        public function parseText(&$text)
        {
            //('@(http)?(s)?(://)?(([-\w]+\.)+([^\s]+)+[^,.\s])@', '<a href="http$2://$4">$1$2$3$4</a>'
            $text = preg_replace('@\[img src\=?([^\s]+)?\]@', '<img src=$1 />', $text); 
            $text = preg_replace('@\[imgtitle src\=?([^\s]+)?\]@', '<img id="title" src=$1 />', $text); 
            $text = preg_replace('@\[link src\=?([^\s]+)?[\]](.*[\[\/link\]])@', '<a href=$1 /> asdas $3</a>', $text);            
        }
        
        
    }
?>
