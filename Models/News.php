<?php
    class NewsModel extends Model
    { 
        public function getRecord(&$dest, $id)
        {
            $dest = $this->connection->query(
                "SELECT * FROM news
                    WHERE news_id=".$id
                );
        }
        public function getRecords(&$dest)
        {
            $dest = $this->connection->query(
                "SELECT * FROM news"
                );
        }
        public function getCommentsFromArticle(&$dest, $id)
        {
            $dest = $this->connection->query(
                "SELECT * FROM comments
                    WHERE news_id=".$id
                );
        }
        public function addComment($id, $nick, $comment)
        {
            #{
                #here you should check the correct of inputs    
            #}
            $now = time();
            /*
            $id = strip_tags($id);
            $nick = strip_tags($nick);
            $comment = strip_tags($comment);
            */
            $id = $this->connection->real_escape_string(htmlspecialchars($id));
            $nick = $this->connection->real_escape_string(htmlspecialchars($nick));
            $comment = $this->connection->real_escape_string(htmlspecialchars($comment));
            
            $this->connection->query(
                "INSERT INTO comments (news_id, com_author, com_text, com_date)
                    VALUES('".$id."','".$nick."','".$comment."','".$now."')"
            );
            
        }
    }
?>
