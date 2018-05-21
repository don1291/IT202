<?php

//error_reporting code
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);

include ( "function_deposit.php");
include ( "accounts.php");
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


//getdata for user and pass and authenticate
$user = $_GET [ "user" ] ;   print "<br>user is:" .$user;
$pass = $_GET [ "pass" ] ;   print "<br>pass is:".$pass;
$amount = $_GET['amount'];   print "<br>amount is:".$amount;
$choice = $_GET["choice"];   print "<br>transaction option: ".$choice;

echo "<br>";

$s   =  "select * from  accounts " ;
print "<br>SQL statement is: $s<br>"; 
($t = mysqli_query( $db,  $s   ) )  or die( mysqli_error($db) );
$num = mysqli_num_rows($t);
print "<br>There were $num rows retrieved.<br><br>";

while ( $r = mysqli_fetch_array($t,MYSQLI_ASSOC) ) {

	$user 				= $r[ "user" ];
	$cur_balance 	= $r[ "current_balance" ];
	$mail              = $r["mail"];
	
	print "User is $user<br>";
	print "Current_balance is $$cur_balance<br><br>";
	print "Email: $mail<br><br>";
	
	//The $$varname just puts $ before $varname's value

};
//menu for choice

//if choice is D or W then get amount
//if choice D or W  then getamount; 

if($choice == 'D'){
  deposit($user, $amount,$cur_balance);
}
if($choice == 'W'){
  withdraw($user, $amount);
}
if($choice == 'S'){
  //show($user, $amount);
}else {
  exit;
}
//switch statement 


//if box checked mailer ( ... )
/*if   ( isset(  $_GET [  "emailresults"    ]   )   ) 
{ 
echo "<br>Mail copy requested but not yet implemented."; 
}  
else												
		{ 
	echo "<br>Mail copy was not requested."; 
	}  
*/

print "<br><br>Bye" ;
/*mysqli_free_result($t);
mysqli_close($db);*/
exit ( "<br>Interaction completed.<br><br>"  ) ;
?>