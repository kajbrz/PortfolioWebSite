<div id="page">
<?php
    while ($row = $this->records->fetch_assoc())
    {
        echo "<div id=\"mininews\">";
        
        echo "<a href=\"?News&show=".$row['news_id']."\"\>";
        
        echo "<h2>";
        echo date("Y/m/d",  $row['news_date']).": ";
        echo "</h2>";
        
        echo "</a>";
        echo "<h3>";
        $this->parseText($row['news_imgtitle']);
        echo $row['news_imgtitle']." ".$row['news_title']; 
        echo "<h3>";
        
        echo "<h5>";
        
        $this->parseText($row['news_text']);        
        $this->cutText($row['news_text'], 100);

        echo $row['news_text']   ;
        echo "</h5>";

        echo "<h4>";
        echo $row['news_author']   ; 
        echo "</h4>";
        
        echo "</div>";
    }
?>
</div>