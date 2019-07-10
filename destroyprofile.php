<?php
session_start();
$sess_ref='';
if($_SERVER['HTTP_REFERER'])
	$sess_ref=$_SERVER['HTTP_REFERER'];
if(isset($_SESSION['dp']))
 {
	 unlink("dp/".$_SESSION['dp']);
 }
 // remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

unset($_COOKIE['dp']);
    unset($_COOKIE['text1']);
    unset($_COOKIE['text2']);
    setcookie('dp', null, -1, '/');
    setcookie('text1', null, -1, '/');
    setcookie('text2', null, -1, '/');
    session_start();
    $_SESSION['sess_ref']=$sess_ref;
 header('Location:index.php');
?>