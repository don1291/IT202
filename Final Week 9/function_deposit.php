<?php
  
  // include php files
	include ("accounts.php");      // database information file
 

  //DB connection code 
  $db = mysqli_connect($hostname,$username, $password ,$project);
  
  if (mysqli_connect_errno())     // if database cannot connect
  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();    // display cannot connect
	  exit();
  }
  
  print "<br>Successfully connected to MySQL.<br>";    // otherwise, database connected successfully
  mysqli_select_db( $db, $project );                   // select the database, include the db connection as parameter

  // Getdata function
  function getdata ( $name , &$result ) {

    echo " Inside get the data. <br>";                  // print out using the the getdata function
    
  	global $flag;                                       // initialize global flag
  	global $db;                                         // initialize global db for connection inside the function
   
  	if(!isset($_GET[$name]))                            // if name from form is not set
  	{
  		$flag = true;                                     // flag is true
  		echo "name is undefined";                         // print out name is undefined or does not exist
  		return;                                           // return
  	}
   
  	if($_GET[$name] == "")                              // if name from form is empty or null
  	{
  		$flag = true;                                     // flag is true
  		echo "<br>name is empty";                         // print out name is empty or null
      return;                                           // return
  	} 
    else                                                // else
    {
      $user = $_GET[$name];                             // variable user is defined or initialized as the name submitted from form
 	    echo ("<br>user is $user<br>");                   // echo user is the user defined
 	    $result = mysqli_real_escape_string($db, $result); // protect the user info from SQL injection
    }
  }

  // auth function passing in user and pass
  function auth ( $user , $pass, &$t) {
    global $db; 
    echo " Inside the authentication. <br>";
    
    $s = "select * from  accounts where user = '$user' and pass = '$pass'";
    $t = mysqli_query($db, $s )  or die( mysqli_error($db));
  
    if(mysqli_num_rows($t) == 1)
    {
      print("Good Credentials!<br>");
      return true;
    }
    else
    {
       print("Bad Credentials!<br>");
       return false;
    }
  }
  
  // redirect function 
  function redirect ($message, $url, $delay){
  
  	echo $message;
  	header("refresh: $delay, url = $url");       // sends 'refresh' http header to browser
  												                       // argument is a single STRING"...."
                                                 // see header in developer tools network tab
  	exit();
  }
   
  // gatekeeper function
  function gatekeeper(){
    // if user is not logged in
  	if (! isset( $_SESSION["logged"]))
  	{
      //Then redirect to login.html
  		redirect ("Login Please. Redirecting to login.html", "login.html",  3);
  		
  	}
  	
  }
   
  // deposit function 
  function deposit ($user, $amount)
  {
  	global $db;
  	
  	$s = "Update accounts set cur_balance = cur_balance +'$amount' where user = '$user'";
  	echo "<br> s is $s <br>";
  	
  	mysqli_query($db, $s) or die (mysqli_error($db));
  	
    $s = "insert into transactions (user, type, amount, date) values ('$user', 'D', '$amount', NOW())";
  	echo "<br> s is $s <br>";
  	
  	mysqli_query($db, $s) or die (mysqli_error($db));
   
  }
  
  // withdraw function
  function withdraw ($user, $amount)
  {
  	global $db;
    $s   =  "select * from  accounts" ;
  	($t = mysqli_query( $db,  $s   ) )  or die( mysqli_error($db) );
  	
  	while ( $r = mysqli_fetch_array($t,MYSQLI_ASSOC) ) {
  		  $user_db   = $r[ "user" ];
        $pass_db   = $r["pass"];
        $cur_balance_db = $r["cur_balance"];
        // if user is valid but current balance is less than or equal to 0, exit the function
        if($user == $user_db){
          if($cur_balance_db <= 0){
              print("current balance is 0. <br>");
              exit;
          }
          else{
            print("Withdraw Successful! ");
          }
         }
   } 
  
  	$s = "Update accounts set cur_balance = cur_balance -'$amount' where user = '$user'";
  	echo "<br> s is $s <br>";
  	
  	mysqli_query($db, $s) or die (mysqli_error($db));
  	
    $s = "insert into transactions (user, type, amount, date) values ('$user', 'W', '$amount', NOW())";
  	echo "<br> s is $s <br>";
  	
   
  	mysqli_query($db, $s) or die (mysqli_error($db));
   
  }
  
  // show function
  function show( $user , &$out  ){
  	global $db;
  	$s   =  "select * from  accounts" ;
  	$out .= "<br>SQL statement is: $s<br>"; 
  	($t = mysqli_query( $db,  $s   ) )  or die( mysqli_error($db) );
  	
  	while ( $r = mysqli_fetch_array($t,MYSQLI_ASSOC) ) {
  		$user_db 				= $r[ "user" ];
  		$cur_balance 	= $r[ "cur_balance" ];
     if($user == $user_db){
  		  $out .= "user is:$user<br>";
  		  $out .= "Current_balance is $$cur_balance<br><br>";
          }
     }
  	//The $$varname just puts $ before $varname's value
  	$a   =  "select * from  transactions where user = '$user'" ;
  	$out .= "<br>SQL statement is: $a<br>"; 
  	($b = mysqli_query( $db,  $a   ) )  or die( mysqli_error($db) );
  
   
  	while ( $r = mysqli_fetch_array($b,MYSQLI_ASSOC) ) {
  		$type 		= $r[ "type" ];
  		$amount 	= $r[ "amount" ];
  		$date     = $r["date"];
  		$out .= "Type is $type <br>";
  		$out .= "Amount is $amount <br>";
  		$out .= "Date is $date <br>";
  	//	print "User is $user<br>";
  		//print "Amount is $cur_balance<br><br>";
      //print "Date is $date<br>";
  	};
  	echo $out;
    mailer($user, $out);
  }
  
  // mailer function
  function mailer( $user , $out){
    if ($user == 'donut89'){
      $to = "donut89@mailinator.com";
      $subject = "hello 10 4 2017";
      $message = $out;
      mail ($to, $subject, $message);
    }
    if($user == 'Phil91'){
      $to = "phil91@mailinator.com";
      $subject = "hello 10 4 2017";
      $message = $out;
      mail ($to, $subject, $message);
    }
  }


?>