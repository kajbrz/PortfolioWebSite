<?php
    class NewsModel extends Model
    { 
        public function getRecord(&$dest, $id)
        {
            
        }
        public function getRecords(&$dest)
        {
            $dest = $this->connection->query(
                "SELECT * FROM news"
                );
        }
    }
?>
