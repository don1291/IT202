<style>
  .green{
    color: green;
  }
  .red{
    color: red;
  }
</style>


<?php

  //error_reporting code
  error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
  ini_set('display_errors' , 1);
  
  // include php files
  include('accounts.php'); 			    // database information
  include('function_deposit.php');	// all functions file
  
  // start session
  session_start();
  
  // Get (user, pass, delay) data from form
  $user = $_GET["user"];
  $pass = $_GET["pass"];
  $delay = $_GET["delay"];
  
  
  // Auth function to validate user and pass  
  // if user and pass are valid
  if(auth($user, $pass, $t) == true){
  
     $s = "select * from  accounts where user = '$user' and pass = '$pass'";   
     $t = mysqli_query($db, $s) or die(mysqli_error($db));
     $r = mysqli_fetch_array($t,MYSQLI_ASSOC);
     $current_balance = $r["cur_balance"];
  
     $_SESSION["user"] = $user;
     $_SESSION["current_balance"] = $current_balance;
     $_SESSION["logged"] = true;
     $message = "<h1 class=\"green\">Valid. Redirecting you to formpage.php...</h1>";  // message for the redirect function parameter
     redirect($message,"formpage.php", $delay);        // redirect function
     
  }
  // else if user and pass are not valid
  else{
     $_SESSION["logged"] = false;
     $message = "<h1 class=\"red\">Invalid. Redirecting you to login.html...</h1>";     // message for the redirect function parameter
     redirect($message,"login.html", $delay);          // redirect function
  }

?>