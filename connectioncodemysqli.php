<?php

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

$s = "select * from A"  ;
print "<br> $s <br>  ";

$t = mysqli_query ( $db    , $s);
print "<br> Number rows is: " . mysqli_num_rows($t);

while ( $r = mysqli_fetch_array($t, MYSQL_ASSOC))
(
$user = $r ["user"];
print "<br> $user";
)

?>