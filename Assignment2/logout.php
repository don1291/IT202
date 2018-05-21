<?php

  // set cookie params
  session_set_cookie_params(0, "~np255/Assignment2/logout.php", "web.njit.edu");

  session_start();
  //$_SESSION = destroy();
  if(session_destroy()){
    header('Location: login.html');
    exit;
  }
      
  //setcookie("PHPSESSID", "", time()-3600, '/', "", 0,0);
?>