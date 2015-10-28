<?php   
    require_once('./Models/News.php');   
    class ContactController extends Controller
    {         
        public function render($query)
        {
            $this->index();
        }
        protected function createView()
        {
        }
        protected function createModel()
        {
        }
        
        private function index()
        {
            if($this->modelBelongsToClass != null)
                $this->modelBelongsToClass->getRecords($this->records);
            include("./Views/Header.php");
            include('./Views/Menu.php');
            include("./Views/Contact/ContactIndex.php");
            include("./Views/Foot.php");
        }
    }
    
?>