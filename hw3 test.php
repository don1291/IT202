<?php
function rowchecker($rows)
{
	if ($rows == 0)
	{
	return false
	}
	return true;
}
function auth($x,$pass)
{
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
}

function getdata($name, &$result)
{
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
// main script

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);

include ( "accounts.php" );

$bad = false; // initializes a boolean

echo "Hello";

$db = mysqli_connect($hostname, $username, $password, $project);

if (mysqli_connect_errno())
 {
	 echo "Failed to connect to MySQL: " . mysqli_connect_error();
	 exit();
 }
print "Successfully connected to MySQL.<br><br><br>";

mysqli_select_db($db, $project );
 
//$user = $_GET["user"];
getdata("user", $user);
getdata("pass", $pass);
//$pass = $_GET["pass"];

print "The user is $user.";
print "The pass is $pass.";
 
$s = "select * from A";
$t = mysqli_query($db , $s);
$num = mysqli_num_rows($t);
print "<br>$s<br>";
$t = mysqli_query($db , $s);
print ("<br> Number rows is: " . mysqli_num_rows($t));

	while ($r = mysqli_fetch_array($t, MYSQL_ASSOC))
	{
		print "<br>";
		$user =  $r["user"];
		$email = $r["mail"];
		
		if($user == $x && $pass == $pass)
		{
			print "The user is $user.";
			print "The pass is $pass.";
			$cur_balance = $r["cur_balance"];
			echo "Current balance is $$cur_balance <br>";
			return true;	
		}
	}
	echo "Invalid";
	return;
}
?>