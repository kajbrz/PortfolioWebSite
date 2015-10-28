<div id="page">
    <?php
    echo "<div id=\"news\">";
        if($row = $this->records->fetch_assoc())
        {
            
            
            echo "<h2>";
            echo date("Y/m/d",  $row['news_date']).": ".$row['news_title'] ;
            echo "</h2>";
            
            $this->parseText($row['news_text']);
            
            echo "<h5>";
            echo $row['news_text']   ;
            echo "</h5>";
    
            echo "<h4>";
            echo $row['news_author']   ; 
            echo "</h4>";
            
            if(count($comments) > 0) #Need repair, because always you can see comments
            {
                echo "<br/><h2>Comments:</h2>";
            }
            while($row = $comments->fetch_assoc())
            {
                echo "<div id=\"comment\">";
                
                echo "User::setComment(string <b id=\"user\">";
                echo $row['com_author'] ;
                echo "</b>)<br/>{</br>";
                
                echo "<div id=\"text\">".$row['com_text']."</div>";
                echo "} ".date("Y.m.d G:i",  $row['com_date'])."; ";
                
                echo "</div>";
            }
            echo "<br/>";
            echo "<form>
                    <input type=\"hidden\" name=\"News\"/>
                    <input type=\"hidden\" name=\"newcomment\" value=\"".$id."\" />
                    <div>
                        Nick:
                        <input type=\"text\" name=\"nick\" name=\"firstname\" />
                        <br/>
                    </div>
                    <textarea name=\"comment\"></textarea>
                    <br/>
                    <input type=\"submit\" />
                </form>";
        }
        else
        {
            echo "<h1 style=\"color: #ffffff; text-align: center\">Nie znaleziono rekordu o id: ".$id."</h1>";
        }
        
        echo "</div>";
    ?>
   
</div>