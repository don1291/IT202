<?php

include ("accounts.php");

$db = mysqli_connect($hostname, $username, $password , $project))
					or die ( "Unable to connect to MySQL database" );
print "Connected to MySQL<br>";
mysql_select_db( $project );

$name = $_REQUST [ "name" ] ;
$age = $_REQUST [ "age" ] ;
$snn = $_REQUST [ "snn" ] ;

$s="insert into students values ( '$name' , $age, $snn );
print "<br>Query is: $s<br>";

mysql_query ( $s ) or die ( mysql_error() );

print "<br>mysql error message is: " . mysql_error() );
print "<br> Bye";

?>