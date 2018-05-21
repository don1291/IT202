<?php
  
    $zipcode = $_GET['zipcode'];
   
    $request = 'http://api.openweathermap.org/data/2.5/weather?zip='.$zipcode.'&APPID=3901c3c20c6ee0c55a14e8f7face052c';
    
    $fp = fopen($request, "r");
    $contents = "";
    
    while($more = fread($fp, 1000)){
      $contents .= $more;
    }
    
    sleep(2.5);
    
    echo $contents;
?>