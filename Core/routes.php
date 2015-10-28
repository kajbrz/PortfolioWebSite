<?php
    require_once('Controller.php');
    require_once('Model.php');
    require_once('Variables.php');
    #controllers
    require_once('./Controllers/News.php');
    require_once('./Controllers/Contact.php');
    require_once('./Controllers/Admin.php');
    #fill up the routing 
    function route($controller, $query)
    {
        $controllers = array(
            "News",
            "Contact",
            "Admin"
        );
        if (in_array(@$controller, $controllers))
        {
            switch($controller)
            {
                case "News":
                    {
                        $myController = new NewsController($query);
                        break;
                    }
                case "Contact":
                    {
                        $myController = new ContactController($query);
                        break;
                    }
                case "Admin":
                    {
                        $myController = new AdminController($query);
                        break;
                    }
            }
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