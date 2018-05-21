<?php

session_start();
// get data from form and echo: $user, $pass, $delay

$_SESSION['user'] = $user;
$_SESSION['logged'] = true;
$_SESSION['delay'] = $delay;
$_SESSION['cur_balance'] = $cur_balance;


echo $_SESSION['user', 'logged', 'cur_balance'];


if auth* fails then         // in php? The * is not part of name.
{
	redirect("login correctly", "login.html", $delay);
	exit();
}

// login setup;

$_SESSION["user"] = $user;
$_SESSION["login"] = true;

$_SESSION["cur_balance"] = $cur_balance;

// use mysqli_fetch array ($t) to access user's row in A
// use "cur_balance to access cur_balance cell in that row


redirect ("redirecting to secure form" , "formpage.php", $delay);
?>