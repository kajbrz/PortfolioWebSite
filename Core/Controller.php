
<?php
    abstract class Controller
    {
        private $modelBelongsToClass;
        private $viewBelongsToClass;
        private $nameOfController;
        public $records = "default";
        
        
        abstract public function render($query);    
        abstract protected function createView();
        abstract protected function createModel();
        
        public function __construct($name)
        {
            $this->nameOfController = $name;
            $this->createView();
            $this->createModel();
        }
        
    }
?>

