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
                    case 'edit':
                        {
                            $this->edit($query[$keys[1]]);
                            break;
                        }
                    case 'editnews':
                        {
                            $this->editnews($query[$keys[1]], $query[$keys[2]], $query[$keys[3]], $query[$keys[4]], $query[$keys[5]], $query[$keys[6]]);
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
        private function edit($id)
        {
            $this->modelBelongsToClass->getRecord($this->records, $id);
            
            include("./Views/Header.php");
            include('./Views/Menu.php');
            include("./Views/Admin/AdminEdit.php");
            include("./Views/Foot.php");
        }
        
        private function editnews($id, $password, $title, $imgtitle, $text, $author)
        {
            $this->modelBelongsToClass->editNews($id, $password, $title, $imgtitle, $text, $author);
            
            $url = "?News&show=".$id;
            header("Location: ".$url);
        }
        
        private function newnews($password, $title, $imgtitle, $text, $author)
        {
            $this->modelBelongsToClass->addNews($password, $title, $imgtitle, $text, $author);
            
            $url = "?News";
            header("Location: ".$url);
        }
        
        
        
        
    }
    
?>