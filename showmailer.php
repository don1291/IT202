<?php
print"Hello";
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);

function mailer ($user, &$out){
	
	$to = "whatever2011099@mailinator.com";
	$subject = "hello 10 4 2017";
	$message = $out;
	mail ($to, $subject, $message);

}

function show( $user , &$out  ){
	$s   =  "select * from  accounts" ;
	$out .= "<br>SQL statement is: $s<br>"; 
	($t = mysqli_query( $db,  $s   ) )  or die( mysqli_error($db) );
	
	while ( $r = mysqli_fetch_array($t,MYSQLI_ASSOC) ) {
		$user 				= $r[ "user" ];
		$current_balance 	= $r[ "current_balance" ];
		$out .= "User is $x<br>";
		$out .= "Current_balance is $$current_balance<br><br>";
	//The $$varname just puts $ before $varname's value
	
	};
	
	echo $out;
	
	$s   =  "select * from  transactions" ;
	print "<br>SQL statement is: $s<br>"; 
	($t = mysqli_query( $db,  $s   ) )  or die( mysqli_error($db) );
	
	while ( $r = mysqli_fetch_array($t,MYSQLI_ASSOC) ) {
		$type 				= $r[ "type" ];
		$current_balance 	= $r[ "current_balance" ];
		print "User is $x<br>";
		print "Current_balance is $$current_balance<br><br>";
	};
}


include("account.php");
$db = mysqli_connect($hostname,$username, $password ,$project);
if (mysqli_connect_errno())
  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
  }
print "<br>Successfully connected to MySQL.<br>";
mysqli_select_db( $db, $project );
*/
//////////////////////////////////////////////////////////////////////////////////////////////

$user = $_GET [ "x" ] ;   print "<br>user is:" .$user;

show($user, $out);

mailer($user, $out);







?>