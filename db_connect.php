<?php
/**
 Created By: Grace Ungui
 Created Date: 2016/05/27
 Description: DB connection setting

**/
class DB_Connect{

	function __construct(){}
	
	function connect(){
	
		//DB connection details
		//Please change these values with your database credentials
		$username = "root";
		$password = "";
		$hostname = "localhost"; 
		//END DB connection details
		
		
		//establish connection
		$conn = mysql_connect($hostname, $username, $password);
		
		if (!$conn) {
			die('Connection Error : ' . mysql_error());
		}

		// use frogcountry database
		$db_selected = mysql_select_db('frogcountry', $conn);
		if (!$db_selected) {
			die ('Cannot connect to the database' . mysql_error());
		}
		
		return $conn;
	}
}

?>