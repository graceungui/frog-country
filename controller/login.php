<?php
/**
 Created By: Grace Ungui
 Created Date: 2016/05/27
 
**/
session_start();

require_once("../model/user.php");
$username = $_POST['username'];
$password = $_POST['password'];

$user = new user();
$success = $user->login($username, $password);

if($success){
	$_SESSION['username'] = $username;
	header("location: pond.php");
}
else{
	header("location: ../index.php?error=1");
}

?>