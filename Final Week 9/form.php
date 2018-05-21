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
  
  // Print out session user
  echo "<br>";
  echo "Hi, ". $user;
  echo "<br>";
  
  // GET info from form formpage.php
  $amount = $_GET['amount'];           // get amount from form formpage.php
  $choice = $_GET["choice"];           // get choice from form formpage.php
  
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
  // else if choice is show
  else if($choice == 'Show'){
    show($user, $amount);               // use the show function
  }
  // else 
  else{
    echo "You have not chosen a choice! Have a nice day :)";  // print out no choice chosen
  }
?>