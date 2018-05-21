<?php
/*
function getdata ( $name , &$result ) {
	global $bad;
	global $db;
	if(!isset($_GET[$name]))
	{
		$bad = true;
		echo"$user is undefined";
		return;
	}
	if($_GET[$user] == "";
	{
		$bad = true;
		echo "<br>$user is empty";
	    return;
	}
	echo ("<br>$user is $_GET[$user]<br>");
	$result = mysqli_real_escape_string($db, $result);
}
*/
function auth ( $user , $pass, $amount, $type ) {
	include ("accounts.php")
	global $db;
	$s = "select * from accounts where user = '$user' and pass = '$pass'";
	echo "<br> $s <br>";
	
	$t = mysqli_query($db , $s);
	$num = mysqli_num_rows($t);
//print("$num");
if($num > 0 == false)
{
	print("<br>Success");
}
		else
		{
			die(print("<br>Bad Credential");
		}
	$r = mysql_fetch_array($t);
	$cur_balance = $r["cur_balance"];
	if ($type == "Withdraw" && $amount > $cur_balance)
	{
		die("<br><br>Overdraw. Transaction was unsuccessful.");
	}
	
}*/

function deposit ($user, $amount)
{
	global $db;
	
	$s = "Update account set cur_balance=cur_balance+'$amount' where user='$user'";
	echo "<br> s is $s <br>";
	
	mysqli_query($db, $s) or die (mysqli_error());
	
	$s = "insert into transactions values ('$user', 'D', '$amount', NOW())";
	echo "<br> s is $s <br>";
	
	mysqli_query($db, $s) or die (mysqli_error());
}

function show( $user , &$out  ){
	global $db;
	
	$s   =  "select * from  accounts" ;
	$out .= "<br>SQL statement is: $s<br>"; 
	($t = mysqli_query( $db,  $s   ) )  or die( mysqli_error($db) );
	
	while ( $r = mysqli_fetch_array($t,MYSQLI_ASSOC) ) {
		$user 				= $r[ "user" ];
		$cur_balance 	= $r[ "cur_balance" ];
		$out .= "user is:$user<br>";
		$out .= "Current_balance is $$cur_balance<br><br>";
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
		print "User is $user<br>";
		print "Current_balance is $cur_balance<br><br>";
	}
	echo $out;
}

function mailer ($user, &$out){
	
	$to = "whatever2011099@mailinator.com";
	$subject = "hello 10 4 2017";
	$message = $out;
	mail ($to, $subject, $message);

}
?>