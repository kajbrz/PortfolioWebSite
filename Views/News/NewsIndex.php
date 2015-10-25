<div id="page">
    <div id="news">
            <?php
                while ($row = $this->records->fetch_assoc())
                {
                    echo "<div id=\"news\">";
                    
                    echo "<h2>";
                    echo date("Y/m/d",  $row['news_date']).": ".$row['news_title'] ;
                    echo "</h2>";
                    
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
</div>