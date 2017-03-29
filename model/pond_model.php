<?php

/**
 Created By: Grace Ungui
 Created Date: 2016/05/29
 Description: Pond model is used for updating/saving/retrieving pond information

**/
require_once("../db_connect.php");

class Pond_Model{

	/* @description: retrieves pond list with corresponding count of frogs under the pond (note: only alive frogs are counted)
	   @param: none
	   @return: array of pond and pond details
	*/
	function get_pondlist(){
		$db_conn = new DB_Connect();
		
		$query = "SELECT p.*, COUNT(f.frog_id) AS frog_count FROM pond p LEFT JOIN frog f ON p.pond_id = f.pond_id AND f.deathdate IS NULL GROUP BY p.pond_id";
		$result = mysql_query($query,$db_conn->connect());
		
		$arr_pond = array();
		while($row = mysql_fetch_array($result)){
			array_push($arr_pond,$row);
		}
		
		return $arr_pond;
	}
	
	/* @description: get number of frogs within pond
	   @param: pond_id
	   @return: integer
	*/
	function get_frog_count($pond_id){
		$db_conn = new DB_Connect();
		
		$query = "SELECT count(*) as frog_count FROM frog where pond_id = '{$pond_id}'";
		$result = mysql_query($query,$db_conn->connect());
		
		$row = mysql_fetch_row($result);
		return $row['frog_count'];
	}
	
	/* @description: create new pond
	   @param: name, location
	   @return: none
	*/
	function insert_pond($name, $location){
		$db_conn = new DB_Connect();

		$query = "INSERT INTO pond (pond_name,pond_location) VALUES('{$name}','{$location}')";
		$result = mysql_query($query,$db_conn->connect());
	}
	
	/* @description: update pond details
	   @param: pond_id, name, location
	   @return: none
	*/
	function update_pond($pond_id, $name, $location){
		$db_conn = new DB_Connect();

		$query = "UPDATE pond SET pond_name = '{$name}', pond_location = '{$location}' WHERE pond_id = '{$pond_id}'";
		$result = mysql_query($query,$db_conn->connect());
	}
	
	/* @description: retrieve detail of the given pond
	   @param: pond_id
	   @return: array of pond details
	*/
	function get_pond_detail($pond_id){
		$db_conn = new DB_Connect();
		$query = "SELECT * from pond where pond_id = '{$pond_id}'";
		$result = mysql_query($query,$db_conn->connect());
		
		$arr_ponddetail = array();
		while($row = mysql_fetch_array($result)){
			array_push($arr_ponddetail,$row);
		}
		return $arr_ponddetail;
	}
	
	/* @description: get list of frogs belong to a pond
	   @param: pond_id, gender
	   @return: array of frogs and frog detail
	*/
	function get_pond_froglist($pond_id, $gender){
		$db_conn = new DB_Connect();

		$query = "SELECT frog_id, name, FLOOR(DATEDIFF(NOW(),birthdate)/365) AS age FROM frog WHERE gender = '{$gender}' AND deathdate IS NULL AND pond_id = '{$pond_id}'";
		$result = mysql_query($query,$db_conn->connect());
		
		$arr_pond_frogs = array();
		while($row = mysql_fetch_array($result)){
			array_push($arr_pond_frogs,$row);
		}
		
		return $arr_pond_frogs;
	}
	
	/* @description: get name of the given pond id
	   @param: pond_id
	   @return: String
	*/
	function get_pond_name($pond_id){
		$db_conn = new DB_Connect();
		$query = "SELECT pond_name from pond where pond_id = '{$pond_id}'";
		$result = mysql_query($query,$db_conn->connect());
		
		$row = mysql_fetch_row($result);
		return $row['0'];
	}
	
	/* @description: get pond location
	   @param: pond_id
	   @return: String
	*/
	function get_pond_location($pond_id){
		$db_conn = new DB_Connect();
		$query = "SELECT pond_location from pond where pond_id = '{$pond_id}'";
		$result = mysql_query($query,$db_conn->connect());
		
		$row = mysql_fetch_row($result);
		return $row['0'];
	}
	
}

?>