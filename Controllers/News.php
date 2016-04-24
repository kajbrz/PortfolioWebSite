<?php   
    require_once('./Models/News.php');   
    class NewsController extends Controller
    {         
        public function render($query)
        {
            $keys = (array_keys($query));
            
            if (@$keys[1] != null)
            {
                switch ($keys[1])
                {
                    case 'show':
                    {
                        $this->show($query[$keys[1]]);
                        break;
                    }
                    case 'newcomment':
                    {
                        $this->newcomment($query[$keys[1]], $query[$keys[2]], $query[$keys[3]]);
                        break;
                    }
                    case 'mobile' :
                    {
                        $this->mobile();
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
           $this->modelBelongsToClass = new NewsModel("blog", 3306, "localhost", "root", "michauu33");           
        }
        
        private function index()
        {
            if($this->modelBelongsToClass != null)
                $this->modelBelongsToClass->getRecords($this->records);
            include("./Views/Header.php");
            include('./Views/Menu.php');
            include("./Views/News/NewsIndex.php");
            include("./Views/Foot.php");
        }
        private function show($id)
        {
            $comments = null;
            if($this->modelBelongsToClass != null)
            {
                $this->modelBelongsToClass->getRecord($this->records, $id);
                $this->modelBelongsToClass->getCommentsFromArticle($comments, $id);
                
            }
            include("./Views/Header.php");
            include('./Views/Menu.php');
            include("./Views/News/NewsShow.php");
            include("./Views/Foot.php");
        }
        
        private function mobile()
        {
            if($this->modelBelongsToClass != null)
                $this->modelBelongsToClass->getRecords($this->records);
            $url = "./Views/News/NewsShow.php";
            header("Location: ".$url);
            //include("./Views/News/NewsShowMobile.php");
        }
        
        private function newcomment($id, $nick, $comment)
        {
            $this->modelBelongsToClass->addComment($id, $nick, $comment);
            $url = "?News&show=".$id;
            header("Location: ".$url);
        }
        
        private function parseText(&$text)
        {
            $this->modelBelongsToClass->parseText($text);
        }
        
        private function cutText(&$text, $countOfLetters)
        {
            $this->modelBelongsToClass->cutText($text, $countOfLetters);
        }
    }
    
?>