<?php
    
    class AdminModel extends Model
    { 
        public function addNews($author, $title, $imgtitle, $password, $text)
        {
            $this->checkPassword($password);
            if(!$password)
            {
                error_log("Password is invalid");
                return;
            }
            
            error_log($author.$title.$imgtitle.$password.$text);
            
            $now = time();
            
            $title = $this->connection->real_escape_string(htmlspecialchars($title));
            $author = $this->connection->real_escape_string(htmlspecialchars($author));
            $text = $this->connection->real_escape_string(htmlspecialchars($text));
            $imgtitle = $this->connection->real_escape_string(htmlspecialchars($imgtitle));
            
            $mama = $this->connection->query(
                "INSERT INTO news
                    (news_title, news_text, news_imgtitle, news_author, news_date)
                        VALUES ('".$title."', '".$text."', '".$imgtitle."', '".$author."', '".$now."')"
            );
        }
        
        private function checkPassword(&$password)
        {
            if ($password === $this->variables->getAdminPassword())
                $password = true;
            else
                $password = false;    
        }
        
    }
?>
