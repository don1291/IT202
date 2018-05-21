<?php

  // set cookie params
  session_set_cookie_params(0, "~np255/Assignment2/formpagehandler.php", "web.njit.edu");

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
  
  // Print out session user
  echo "<br>";
  echo "Hi, ". $user;
  echo "<br>";
  
  // GET info from form formpage.php
  $amount = $_GET['amount'];           // get amount from form formpage.php
  $choice = $_GET["choice"];           // get choice from form formpage.php

  if(isset($_GET["EMAIL"])){
    if($choice == 'Show'){
       echo ("Mailer is checked and sent!<br>");
       show($user, $amount);
    }
    else {
      echo "Mailer is ONLY for show choice<br>";
    }
  }
  else if(!isset($_GET["EMAIL"])){
    // if choice is deposit
    if($choice == 'Deposit'){
      deposit($user, $amount);            // use the deposit function
      echo "Thank you for depositing! Have a nice day :)";
    }
    // else if choice is withdraw
    else if($choice == 'Withdraw'){       
      withdraw($user, $amount);           // use the withdraw function
      echo "Thank you for withdraw! Have a nice day :)";
    }
    // else
    else{
      echo "You must check EMAIL and the choice show. Have a nice day :)";
    }
  }
  else {
    echo "EMAIL IS NOT SET!";
   } 
  /*else{
    echo "You have not chosen a choice! Have a nice day :)";  // print out no choice chosen
  }*/

  // hyperlink for back to formpage.php
    echo "<br><br>";
    echo "<a href='formpage.php'>Link back to formpage.php</a>";
?>