<div id="page">
            <?php
                while ($row = $this->records->fetch_assoc())
                {
                    echo "<div id=\"news\">";
                    
                    echo "<a href=\"?News&show=".$row['news_id']."\"\>";
                    
                    echo "<h2>";
                    echo date("Y/m/d",  $row['news_date']).": ".$row['news_title'] ;
                    echo "</h2>";
                    
                    echo "</a>";
                    
                    echo "<h5>";
                    echo $row['news_text']   ;
                    echo "</h5>";
            
                    echo "<h4>";
                    echo $row['news_author']   ; 
                    echo "</h4>";
                    
                    echo "</div>";
                }
            ?>
</div>