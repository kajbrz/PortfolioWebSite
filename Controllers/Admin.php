<?php   
    require_once('./Models/Admin.php');   
    class AdminController extends Controller
    {         
        public function render($query)
        {
            $keys = (array_keys($query));
            
            if ($keys[1] != null)
            {
                switch ($keys[1])
                {
                    case 'newnews':
                        {
                            $this->newnews($query[$keys[2]], $query[$keys[3]], $query[$keys[4]], $query[$keys[5]], $query[$keys[6]]);
                            break;
                        }
                }
            }
            else
                $this->index();
        }
        protected function createView()
        {
            
        }
        protected function createModel()
        {
           $this->modelBelongsToClass = new AdminModel("blog", 3306, "localhost", "root", "michauu33");
        }
        
        private function index()
        {
            include("./Views/Header.php");
            include('./Views/Menu.php');
            include("./Views/Admin/AdminIndex.php");
            include("./Views/Foot.php");
        }
        
        private function newnews($password, $title, $imgtitle, $text, $author)
        {
            $this->modelBelongsToClass->addNews($password, $title, $imgtitle, $text, $author);
            
            $url = "?News";
            header("Location: ".$url);
        }
        
        
    }
    
?>