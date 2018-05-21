<?php

  // set cookie params
  session_set_cookie_params(0, "~np255/Assignment2/formpage.php", "web.njit.edu");

  // start session
  session_start();

  //error_reporting code
  error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
  ini_set('display_errors' , 1);

  // include php files
  include('accounts.php'); 			        // database information
  include('function_deposit.php');	    // all functions file
  
  // Gatekeeper function to see if user is logged in, if not redirect the user back to login.html
  gatekeeper();
  
  // Session Variables
  $user = $_SESSION["user"];
  $current_balance = $_SESSION["current_balance"];
  
  // Print out session user and current balance
  echo "<br>";
  echo "Hi, ". $user . " <a href='logout.html'>Link to logout.html</a>"; // print out session user
  echo "<br>";
  echo "Successfully Logged in!<br>";              // echo successful logged in
  echo "<br>"; 
  echo "Current balance is: ". $current_balance;   // print out session user's current balance
  
?>


<!DOCTYPE html>
<html>
  <head></head>
  <body>
    <form action = "formpagehandler.php" method="GET">
      <div id="amountField">
        <br>
        <input type ="number" step = ".01" name="amount" id="amount"> Amount<br><br>
      </div>
      
    <div id="choiceSelection">
      <select name="choice"  id="choice" onchange="appear()" >
        <option value=""> Choose </option>
        <option value="Show"> Show </option>
        <option value="Deposit"> Deposit </option>
        <option value="Withdraw"> Withdraw </option>
      </select><br><br>
    </div>
    <input type="checkbox" name="EMAIL" value="" checked> EMAIL<br>
    <br>
    <input type=submit>
    </form>
      
  </body>
</html>