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
            
            $this->connection->query(
                "INSERT INTO news
                    (news_title, news_text, news_imgtitle, news_author, news_date)
                        VALUES ('".$title."', '".$text."', '".$imgtitle."', '".$author."', '".$now."')"
            );
        }
        
        public function editNews($id, $author, $title, $imgtitle, $password, $text)
        {
            $this->checkPassword($password);
            if(!$password)
            {
                error_log("Password is invalid");
                return;
            }
            
            $id = $this->connection->real_escape_string(htmlspecialchars($id));
            $title = $this->connection->real_escape_string(htmlspecialchars($title));
            $author = $this->connection->real_escape_string(htmlspecialchars($author));
            $text = $this->connection->real_escape_string(htmlspecialchars($text));
            $imgtitle = $this->connection->real_escape_string(htmlspecialchars($imgtitle));
            $now = time();
            
            $result = $this->connection->query(
                "UPDATE news
                    SET
                        news_title = '".$title."',                        
                        news_text = '".$text."',                        
                        news_imgtitle = '".$imgtitle."',               
                        news_date = '".$now."',
                        news_author = '".$author."'                                                 
                            WHERE news_id=".$id
            );
            error_log($this->connection->error);       
        }
        
        public function getRecord(&$dest, $id)
        {
            $id = $this->connection->real_escape_string(htmlspecialchars($id));
            $dest = $this->connection->query(
                "SELECT * FROM news
                    WHERE news_id=".$id
                );
            if (!$dest) {
                throw new Exception("Database Error [{$this->connection->errno}] {$this->connection->error}");
            }
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
