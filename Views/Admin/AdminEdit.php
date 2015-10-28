<div id="page">
    <div id="news">
        <form>
        <?php
            if($row = $this->records->fetch_assoc());
        ?>
        <h2 style="text-align: left;">Edit News: <?php echo $id; ?></h2>
            <input type="hidden" name="Admin"/>
            <input type="hidden" name="editnews" value="<?php echo $id; ?>" />
            
            <div>
                Author:
                <input type="text" name="author" value="<?php echo $row['news_author']; ?>" />
            </div>
            
            <br/>
            
            <div>
                Title:
                <input type="text" name="title"  value="<?php echo $row['news_title']; ?>"/>
            </div>
            
            <br/>
            
            <div>
                Image Title link:
                <input type="text" name="imgtitle" value="<?php echo $row['news_imgtitle']; ?>"/>
            </div>
            
            <br/>
            
            <div>
                Admin password:
                <input style="text-align: left;" type="password" name="password" name="firstname" />
            </div>
            
            <br/>
            
            <textarea name="text"><?php echo $row['news_text']; ?></textarea>
            
            <br/>
            <input type="submit" />
        </form>
    </div>
</div>