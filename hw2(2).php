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

$s = "select * from accounts"  ;
print "<br>SQL statement is: ". $s ."<br>  ";

$t = mySql_query ( $db    , $s);
print "<br> There were " .mysqli_num_rows($t)." rows retrieved.";
print "<br>";

while ( $r = mysqli_fetch_array($t, MYSQL_ASSOC))
{
$user = $r ["user"];
print "<br> User is  " .$user ; 

$cur_balance = $r ["cur_balance"];
print "<br> current_balance is  "."$". $cur_balance. "<br>" ;
}
print "<br>";

/*if (! isset  (  $_GET["service"] ) ) 
die ( "Mail copy was not requested.<br><br>" ); */

echo "Bye.<br>";
echo "Interaction completed.";

/>
