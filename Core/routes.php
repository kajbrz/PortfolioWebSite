<?php
    require_once('Controller.php');
    require_once('Model.php');
   # require_once('./Views/Header.php');
    #require_once('./Views/Foot.php');
    #controllers
    require_once('./Controllers/News.php');
    $controllers = array(
        "News"  
    );
    #fill up the routing 
    function route($controller, $query)
    {
       $myController = new NewsController("News");    
       $myController->render($query);
    }
        
?>