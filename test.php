<?php
	
	// auth function
  // $u and $p are passed by values
	function auth ( $u, $p    ) {

		global $db;    // global $db 
    
    
    // get data from database (named accounts) where user(column) = user input and same for password
		$s = "select * from accounts where user = '$u' and pass = '$p'  ";
    echo "<br> auth SQL  is: $s <br>";
		$t = mysqli_query( $db, $s);      // database connection and to find the command for $s

		$num = mysqli_num_rows($t);  // return the number of rows

		if($num == 0){                // if number equals 0 or no record found
			exit("<br>Bad Credentials");    // auth failed
		}
    else                            // else
    {
      print "<br>Good Credentials<br>";    // auth succeed
    }

	}
 function getdata($u, &$result){
   global $bad;
   global $db;
   if(! isset($_GET [$u])){
     $bad = true;
     echo "mag";
     
     return;
   }
   
   $result = $_GET[$u];
   $result = mysqli_real_escape_string ($db, $result);
 }
	// main script
  // error reporting
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
	ini_set('display_error', 1);

	include ('accounts.php');
  
  $bad = false;  // initialize $bad to FALSE
  
	$db = mysqli_connect($hostname, $username, $password, $project); // connect to db

  // check if connection successful
	if($db){
		echo "<br>Hello";
		print "<br>Successfully connected to MySQL.<br>";
	} else {
		echo ("<strong>Fatal error: </strong>"."Failed to connect to MySQL: " . mysqli_connect_error());
		exit();
	}

	// connection to db name
	mysqli_select_db($db, $project);
  
	// get username from user input
	getdata("x", $x);
	print "<br> user is: " . $x;
	// get password from user input
	getdata("pass", $pass);
	print "<br> pass is: " . $pass;

	auth($x , $pass);
	// $s = "select * from accounts" ;
	// print "<br>SQL statement is: ". $s . "<br> ";
?>