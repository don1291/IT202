<?php

//error_reporting code
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);

include ( "function_deposit.php");
include ( "accounts.php");
include ( "login.php");

$bad = false;

print "Hello" ;

//DB connection code 
$db = mysqli_connect($hostname,$username, $password ,$project);
if (mysqli_connect_errno())
  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
  }
print "<br>Successfully connected to MySQL.<br>";
mysqli_select_db( $db, $project ); ////////////////////////////////////////////


//getdata for user and pass and authenticate  // this is from html file
$user = $_GET [ "user" ] ;   print "<br>user is: " .$user;
$pass = $_GET [ "password" ] ;   print "<br>pass is: " .$pass;
$delay = $_GET [ "delay" ] ;   print "<br>delay is: " .$delay;
$amount = $_GET['amount'];   print "<br>amount is: " .$amount;
$choice = $_GET["choice"];   print "<br>transaction option: " .$choice;
echo "<br>";


/*if (! auth ($user, $pass, $t))

	{
		redirect ("login", "login.html" , $delay)	//only get here if auth
	
	
	}*/
if($choice == 'Deposit'){
  deposit($user, $amount);
}
else if($choice == 'Withdraw'){
  withdraw($user, $amount);
  }
else{
  print ("Exit");
  }


if($_GET['EMAIL']){
  if($choice == 'Deposit' || $choice == 'Withdraw'){
     print ("Mailer is ONLY for show choice<br>");
     exit;
  }
  else if($choice == 'Show'){
    print("Mailer is checked and sent!<br>");
    show($user, $amount);
  }
  else {
    print("Mailer is ONLY for show choice<br>");
    exit;
  }
}
/*
else if($choice == 'Deposit'){
    deposit($user, $amount);
}
else if($choice == 'Withdraw'){
    withdraw($user, $amount);
  }
else {
  print("Checkbox is not SET");
}
*/
auth($user, $pass);
getdata("user", $user);
/*
$s   =  "select * from  accounts " ;

print "<br>SQL statement is: $s<br>"; 
*/
//PROTECTION *NEW*
/*$type = get_case (  $name, $pass, $amount, $type  );
if ( $type == 'A')admin  ( $name, $pass);
if ( $type != 'A')user  ( $name, $pass, $amount, $type );*/

//menu for choice

//if choice is D or W then get amount
//if choice D or W  then getamount; 



/*
($t = mysqli_query( $db,  $s   ) )  or die( mysqli_error($db) );
$num = mysqli_num_rows($t);
print "<br>There were $num rows retrieved.<br><br>";

while ( $r = mysqli_fetch_array($t,MYSQLI_ASSOC) ) {
// user in datebase
	$user_db				= $r[ "user" ];
	$cur_balance 	= $r[ "cur_balance" ];
	$email         = $r["mail"];

	//The $$varname just puts $ before $varname's value
if($user == $user_db)
{
  print "User is $user<br>";
  print "Current_balance is $$cur_balance<br><br>";
	print "Email: $email<br><br>";
}
else {
  continue;
  }
}
*/
//UPDATE *NEW*
/*if ( $type != 'A') update ( $name, $amount, $type );

/ Show *NEW*/
//show("$username" , "$out");


//if box checked mailer ( ... )
/*$message = $result . $result2;
 //if   ( isset(  $_GET [  "emailresults"    ]   )   ) 
{
  mail($type, $name, $message, $pass);
  };*/

print "<br><br>Bye" ;
/*mysqli_free_result($t);
mysqli_close($db);*/
exit ( "<br>Interaction completed.<br><br>"  ) ;
?>