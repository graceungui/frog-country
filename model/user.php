<?php

/**
 Created By: Grace Ungui
 Created Date: 2016/05/27
 Description: User validation

**/

require_once("../db_connect.php");

class user{
	function login($username, $password){
		$db_conn = new DB_Connect();
		$success = 0;
		$query = "SELECT username FROM user WHERE username = '{$username}' AND password = '{$password}'";
		$result = mysql_query($query,$db_conn->connect());
		
		if (mysql_num_rows($result) > 0) { //if provided credentials are valid
			$success = 1;
		}
		return $success;
	}
}

?>