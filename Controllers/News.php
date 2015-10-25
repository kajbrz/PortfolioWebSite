<?php   
    require_once('./Models/News.php');   
    
   
    
    class NewsController extends Controller
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
           $this->modelBelongsToClass = new NewsModel("blog", 3306, "localhost", "root", "michauu33");
           $this->modelBelongsToClass->getRecords($this->records);
           
        }
        
        public function index()
        {            
            include("./Views/Header.php");
            include('./Views/Menu.php');
            include("./Views/News/NewsIndex.php");
            include("./Views/Foot.php");
        }
    }
    
?>