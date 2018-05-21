<?php
 function withdraw ($user, $amount)
 {
	 global $db;
	 
	$s = "Update account set cur_balance=cur_balance+'$amount' where user='$user'";
	echo "<br> s is $s <br>";
	
	mysqli_query($db, $s) or die (mysqli_error());
	
	
	$s = "insert into transactions values ('$user', 'W', '$amount', NOW())";
	echo "<br> s is $s <br>";
	
	mysqli_query($db, $s) or die (mysqli_error());
	 
 }
 
 
 ?>