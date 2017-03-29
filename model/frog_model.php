<?php

/**
 Created By: Grace Ungui
 Created Date: 2016/05/28
 Description: Frog model is used for updating/saving/retrieving a frog's information

**/

require_once("../db_connect.php");

class Frog_Model{
	
	/* @description: get list of frogs
	   @param: none
	   @return: array of frogs and frog details
	*/
	function get_froglist(){
		$db_conn = new DB_Connect();
		
		$query = "SELECT f.*,p.pond_name FROM frog f LEFT JOIN pond p ON p.pond_id = f.pond_id";
		$result = mysql_query($query,$db_conn->connect());
		
		$arr_frog = array();
		while($row = mysql_fetch_array($result)){
			array_push($arr_frog,$row);
		}
		
		return $arr_frog;
	}
	
	/* @description: get details of the given frog id
	   @param: frog_id
	   @return: array of frog details
	*/
	function get_frogdetails($frog_id){
		$db_conn = new DB_Connect();
		
		$query = "SELECT * from frog where frog_id = '{$frog_id}'";
		$result = mysql_query($query,$db_conn->connect());
		
		$arr_frogdetail = array();
		while($row = mysql_fetch_array($result)){
			array_push($arr_frogdetail,$row);
		}
		
		return $arr_frogdetail;
	}
	
	/* @description: update frog details
	   @param: frog_id, name, gender, birthdate, deathdate, pond_id
	   @return: none
	*/
	function update_frog($frog_id, $name, $gender, $birthdate, $deathdate, $pond_id){
		$db_conn = new DB_Connect();
		
		$deathdate_val = "";
	
		if($deathdate != ""){
			$deathdate_val = ", deathdate = '".$deathdate."'";
		}
		
		$query = "UPDATE frog SET name = '{$name}', gender = '{$gender}', birthdate = '{$birthdate}'".$deathdate_val.", pond_id = '{$pond_id}' WHERE frog_id = '{$frog_id}'";
		$result = mysql_query($query,$db_conn->connect());
		
	}
	
	/* @description: insert new frog record
	   @param: frog_id, name, gender, birthdate, deathdate, pond_id
	   @return: none
	*/
	function insert_frog($name, $gender, $birthdate, $deathdate, $pond_id){
		$db_conn = new DB_Connect();

		$deathdate_col = "";
		$deathdate_value = "";
		
		if($deathdate != ""){
			$deathdate_col = ",deathdate";
			$deathdate_value = ",'".$deathdate."'";
		}
		
		$query = "INSERT INTO frog (name,gender,birthdate".$deathdate_col.",pond_id) VALUES('{$name}','{$gender}','{$birthdate}'".$deathdate_value.",'{$pond_id}')";
		$result = mysql_query($query,$db_conn->connect());
	}
	
	/* @description: get list of frog by gender (used for mating a frog)
	   @param: gender (F/M)
	   @return: array of frogs and frog details (by gender)
	*/
	function get_frog_by_gender($gender){
		$db_conn = new DB_Connect();
		
		$query = "SELECT frog_id, name, FLOOR(DATEDIFF(NOW(),birthdate)/365) AS age FROM frog WHERE gender = '{$gender}' AND deathdate IS NULL";
		$result = mysql_query($query,$db_conn->connect());
		
		$arr_frog = array();
		while($row = mysql_fetch_array($result)){
			array_push($arr_frog,$row);
		}
		
		return $arr_frog;
	}
	
	/* @description: transfer frog from one pond to another (used in pond hopping feature)
	   @param: pond_id, frog_id
	   @return: none
	*/
	function update_frog_pond($pond_id, $frog_id){
		$db_conn = new DB_Connect();
		
		$query = "UPDATE frog SET pond_id = '{$pond_id}' WHERE frog_id = '{$frog_id}'";
		$result = mysql_query($query,$db_conn->connect());
	}
}

?>