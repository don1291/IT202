<?php

  //error_reporting code
  error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
  ini_set('display_errors' , 1);

  // include php files
  include('accounts.php'); 			        // database information
  include('function_deposit.php');	    // all functions file
  
  
  // start session
  session_start();
  
  
  // Gatekeeper function to see if user is logged in, if not redirect the user back to login.html
  gatekeeper();
  
  // Session Variables
  $_SESSION["logged"] = true; 
  $user = $_SESSION["user"];
  $current_balance = $_SESSION["current_balance"];
  
  // Print out session user and current balance
  echo "<br>";
  echo "Hi, ". $user;                              // print out session user
  echo "<br>";
  echo "Successfully Logged in!<br>";              // echo successful logged in
  echo "<br>"; 
  echo "Current balance is: ". $current_balance;   // print out session user's current balance
  
?>


<!DOCTYPE html>
<html>
  <head></head>
  <body>
    <form action = "form.php" method="GET">
      <div id="amountField">
        <br>
        <input type ="number" step = "1" name="amount" id="amount"> Amount<br><br>
      </div>
      
    <div id="choiceSelection">
      <select name="choice"  id="choice" onchange="appear()" >
        <option value=""> Choose </option>
        <option value="Show"> Show </option>
        <option value="Deposit"> Deposit </option>
        <option value="Withdraw"> Withdraw </option>
      </select><br><br>
    </div>
    <input type=submit>
    </form>
      
  </body>
</html>