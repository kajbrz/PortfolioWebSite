<?php
    require_once('Controller.php');
    require_once('Model.php');
    #controllers
    require_once('./Controllers/News.php');
    #fill up the routing 
    function route($controller, $query)
    {
        $controllers = array(
            "News"  
        );
        if (in_array(@$controller, $controllers))
        {
            $myController = new NewsController($controller);    
            $myController->render($query);
        }
        else
        {
            $myController = new NewsController('News');    
            $myController->render($query);
            if (@$controller != null)
            {
                $message = "Site which you want to connect does not exists";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
    }
        
?>