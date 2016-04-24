<?php
 /*$result = "<messages>";
  #$jsonArray
  while ($row = $this->records->fetch_assoc())
  {    
    $result = $result."<news>";    
    $result = $result."<date>";
    $result = $result.date("Y/m/d",  $row['news_date']);  
    $result = $result."</date>";
      
      
    $result = $result."<text>";        
    $result = $result.$row['news_text'];    
    $result = $result."</text>";

    
    $result = $result."<autor>".$row['news_author']; 
    $result = $result."</autor>";
    $result = $result."</news>";
  }
  echo $result;
  echo "<br/><br/><br/>";
  #tutaj konfigurujemy jsonArray
  */
  $jsonArray = array();
  $jsonRec = array();
  $i = 0;
  while ($row = $this->records->fetch_assoc())
  {    
    $jsonRec[$i] = array('date' => date("Y/m/d",  $row['news_date']),
      'text' => $row['news_text'], 'author' => $row['news_author']);
    $i++;
  }
  $jsonArray['messages'] = $jsonRec; 
  echo json_encode($jsonArray);
  
?>


