<?php

echo "Hello";

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_error' , 1);

include (  "accounts.php"     ) ;

$db = mysqli_connect($hostname, $username, $password, $project);

if (mysqli_connect_errno())
  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
  }
print "<br>Successfully connected to MySQL.<br>";
 
mysqli_select_db($db, $project ); 

$x = $_GET ["x"];
print "<br> user is: " .$x ;

$pass = $_GET ["pass"];
print "<br> pass is: " .$pass ;

$s = "select * from accounts user = '$x' and pass = '$pass' "  ;
print "<br>SQL statement is: ". $s ."<br>  ";

$t = mySql_query ( $db    , $s);

$num = mySql_num_rows($t);
if ($num > 0)
{
	return true;
	} 
	else 
	{ 
return false;
}
	
function auth ($x ,$pass)
{
	global $db;
}
auth ($x , $pass)

if ( ! auth ( $x,$pass )) exit ("....");

while ( $r = mysqli_fetch_array($t, MYSQL_ASSOC))
{
$user = $r ["user"];
print "<br> User is  " .$user ; 

$cur_balance = $r ["cur_balance"];
print "<br> current_balance is  "."$". $cur_balance. "<br>" ;
}
print "<br>";

function getdata ( $name , &$result )
{
	global $bad;
if (! isset  (  $_GET["service"] ) ) 
	{
	die ( "Mail copy was not requested.<br><br>" ); 
	}
	
	$result = $_GET [ $name ];
	$result = mysqli_real_escape_string ($result);
};

echo "Bye.<br>";
echo "Interaction completed.";

?>
