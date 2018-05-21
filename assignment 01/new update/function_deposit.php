<?php
	include ("accounts.php");

function getdata ( $name , &$result ) {

  echo " Inside get the data. <br>";
  
	global $flag;
	global $db;
	if(!isset($_GET[$name]))
	{
		$flag = true;
		echo "name is undefined";
		return;
	}
	if($_GET[$name] == "")
	{
		$flag = true;
		echo "<br>name is empty";
    return;
	} else {
      $user = $_GET[$name];
	    echo ("<br>user is $user<br>");
	    $result = mysqli_real_escape_string($db, $result);
  }
}

function auth ( $user , $pass ) {
  global $db; 
  echo " Inside the authentication. <br>";
  
  $s   =  "select * from  accounts" ;
	($t = mysqli_query( $db,  $s   ) )  or die( mysqli_error($db) );
	
	while ( $r = mysqli_fetch_array($t,MYSQLI_ASSOC) ) {
		  $user_db   = $r[ "user" ];
      $pass_db   = $r["pass"];
      
      if(($user == $user_db) && ($pass == $pass_db)){
          print("Good Credentials!<br>");
          break;
        }
        else {
          print("Bad Credentials!<br>");
          continue;
        }
      }  
     
    
}

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

function withdraw ($user, $amount)
{
	global $db;
  $s   =  "select * from  accounts" ;
	($t = mysqli_query( $db,  $s   ) )  or die( mysqli_error($db) );
	
	while ( $r = mysqli_fetch_array($t,MYSQLI_ASSOC) ) {
		  $user_db   = $r[ "user" ];
      //$pass_db   = $r["pass"];
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
	/*
	$s = "Update accounts set cur_balance = cur_balance -'$amount' where user = '$user'";
	echo "<br> s is $s <br>";
	
	mysqli_query($db, $s) or die (mysqli_error($db));
	
  $s = "insert into transactions (user, type, amount, date) values ('$user', 'W', '$amount', NOW())";
	echo "<br> s is $s <br>";
	
 
	mysqli_query($db, $s) or die (mysqli_error($db));
 */
}

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