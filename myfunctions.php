<?php
/*
function getdata ( $name , &$result ) {
	global $bad;
	global $db;
	if(!isset($_GET[$name]))
	{
		$bad = true;
		echo"$x is undefined";
		return;
	}
	if($_GET[$x] == "";
	{
		$bad = true;
		echo "<br>$x is empty";
	    return;
	}
	echo ("<br>$x is $_GET[$x]<br>");
	$result = mysqli_real_escape_string($db, $result);
}

function auth ( $u , $p ) {
	include ("accounts.php")
	global $db;
	$s = "select * from accounts where user = '$x' and pass = '$pass'";
	echo "<br> $s <br>";
	
	$t = mysqli_query($db , $s);
	$num = mysqli_num_rows($t);
//print("$num");
if($num > 0 == false)
{
	print("<br>YES");
	{
		else
	}
	print("<br>NO");
}*/

function deposit ( $user , $amount ) 
{
  global $db;
  
  $s = "insert into transactions(user, type, amount, date) values ('$user', 'D' '$amount', NOW())"; 
  echo "<br> insert SQL is $s <br>";
  ($t = mysqli_query ($db, $s)) or die (mysqli_error($db));

  //For datetime use SQL function: NOW()
  
  echo "<br> s is $s <br>";
  
  $s = "update into accounts SET cur_balance = cur_balance+'$amount' where user = '$user'"; 
  echo "<br> update SQL is $s <br>";
  ($t = mysqli_query ($db, $s)) or die (mysqli_error($db));

  deposit($user, $amount);
  
  
  $this->Balance += $dblAmount;
 $cur_balance = $cur_balance + '$amount';
  
  
}
  $user = $_GET["user"];
  $pass = $_GET["pass"];
  $amount = $_GET["amount"];

/*function withdraw ( $user , $amount ) {
global $db;
  
  $s = "insert into transactions table(user, type, amount, date) values ('$user', 'W' '$amount', NOW())"; 
  echo "<br> insert SQL is $s <br>";
  
 ($t =  mysqli_query ($db, $s)) or die (mysqli _ error());
}
  //For datetime use SQL function: NOW()
  
  $s = "";
  $user = $_GET["user"];
  $pass = $_GET["pass"];
  $amount = $_GET["amount"];
  
  echo "<br> s is $s <br>";
  
  ($t = mysqli_query ($db, $s)) or die (mysqli _ error($db));

  withdraw($user, $amount);
  
  
  $this->Balance -= $dblAmount;
cur_balance = cur_balance + '$amount'
	//EXITS if there is an attempt to overdraw

}
*/
function show( $user , &$out  ){
	global $db;
	
	$s   =  "select * from  accounts" ;
	$out .= "<br>SQL statement is: $s<br>"; 
	($t = mysqli_query( $db,  $s   ) )  or die( mysqli_error($db) );
	
	while ( $r = mysqli_fetch_array($t,MYSQLI_ASSOC) ) {
		$user 				= $r[ "user" ];
		$cur_balance 	= $r[ "current_balance" ];
		$out .= "User is $x<br>";
		$out .= "Current_balance is $$amount<br><br>";
	//The $$varname just puts $ before $varname's value
	
	$s   =  "select * from  transactions where user ='$user' " ;
	print "<br>SQL statement is: $s<br>"; 
	($t = mysqli_query( $db,  $s   ) )  or die( mysqli_error($db) );
}
	while ( $r = mysqli_fetch_array($t,MYSQLI_ASSOC) ) {
		$type 		= $r[ "type" ];
		$amount 	= $r[ "amount" ];
		$date       = $r["date"];
		$out .= "Type is $type <br>";
		$out .= "Current_balance is $amount <br>";
		$out .= "Date is $date <br>";
		print "User is $x<br>";
		print "Current_balance is $$cur_balance<br><br>";
	}
	echo $out;
}
/*function getamount ( $fieldname , %&result ) {
$amt = $_GET[$fieldname]
	! is_numeric	exit
	  negative		exit
	$result = $amt
	//EXITS if not numeric or negative

}

/*function mailer ($user, &$out){
	
	$to = "whatever2011099@mailinator.com";
	$subject = "hello 10 4 2017";
	$message = $out;
	mail ($to, $subject, $message);

}*/


?>