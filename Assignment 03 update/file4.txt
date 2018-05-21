<?php
  
    $zipcode = $_GET['zipcode'];

    $url = 'http://maps.googleapis.com/maps/api/geocode/json?address='.$zipcode;
    
    $fp = fopen($url, "r");
    $contents = "";
    
    while($more = fread($fp, 1000)){
      $contents .= $more;
    }
    
    sleep(2.5);
    
    echo $contents;
?>