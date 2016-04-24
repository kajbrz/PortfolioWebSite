<?php
  $result = "<messages>";
  while ($row = $this->records->fetch_assoc())
  {    
    $result = $result + "<news>";    
    $result = $result + "<date>";
    $result = $result + date("Y/m/d",  $row['news_date']);  
    $result = $result + "</date>";
      
      
    $result = $result + "<text>";        
    $result = $result + $row['news_text'];    
    $result = $result + "</text>";

   
    $result = $result +"<autor>";    
    $result = $result +"<autor>"; $row['news_author']; 
    $result = $result +"</autor>";
  }
  /*
   $result = "<messages>
              <news>            
                <date>
                  2016-04-31
                </date>
                <text>
                  Tekst wiadomości heheheh
                </text>
                <autor>
                  Niepoznany
                </autor>
              </news>
            </messages>";
  */

  echo $result;
?>


