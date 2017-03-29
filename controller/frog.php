<?php
/**
 Created By: Grace Ungui
 Created Date: 2016/05/27
 Description: Frog Controller is used for frog operations such as add/edit frog

**/

require_once("../session.php");
require_once("../model/frog_model.php");
require_once("../model/pond_model.php");

$frog = new Frog();
$frog_model = new Frog_Model();

if(isset($_GET['action'])){ //special actions
	$action = $_GET['action'];
	switch($action){
		case "edit": 
			$frog_id = (isset($_GET['id'])?$_GET['id']:'');
			$frog->edit($frog_id);
			break;
		case "add": $frog->add();
			break;
		case "hop": $frog->hop();
			break;
		default: $frog->index();
	}
}elseif(isset($_POST['frog_name'])){
	//action is save
	//capture inputted values
	$frog_name = $_POST['frog_name'];
	$frog_gender = $_POST['frog_gender'];
	
	$frog_bday_year = $_POST['frog_bday_year'];
	$frog_bday_month = $_POST['frog_bday_month'];
	$frog_bday_day = $_POST['frog_bday_day'];
	
	$frog_death_year = $_POST['frog_death_year'];
	$frog_death_month = $_POST['frog_death_month'];
	$frog_death_day = $_POST['frog_death_day'];
	
	$frog_pond = $_POST['frog_pond'];
	
	$frog_id = $_POST['frog_id'];
	
	//format birthday and death date
	$frog_birthday = $frog_bday_year."-".$frog_bday_month."-".$frog_bday_day;
	
	if($frog_death_year != 0){
		$frog_deathdate = $frog_death_year."-".$frog_death_month."-".$frog_death_day;
	}else{
		$frog_deathdate = "";
	}
	
	//identify if it is edit or add
	if($frog_id != 0){
		//save is invoked from Edit Form, update the frog record
		$frog_model->update_frog($frog_id, $frog_name, $frog_gender, $frog_birthday, $frog_deathdate, $frog_pond);
	}else{
		//used when adding a new frog or saving a tadpole after mating two frogs
		$frog_model->insert_frog($frog_name, $frog_gender, $frog_birthday, $frog_deathdate, $frog_pond);
	}
	
	if($_POST['action'] == 'pond'){
		header("Location: pond.php?action=view&id=".$frog_pond);
	}
	
	$frog->index();
}
else{
	$frog->index();
}

class Frog{
	
	function index(){
		$frog_model = new Frog_Model();
		$pond_model = new Pond_Model();
		$arr_frog = $frog_model->get_froglist();
		$arr_pond = $pond_model->get_pondlist();

		require_once("../view/frog.php");
	}
	
	function edit($frog_id){
		$frog_model = new Frog_Model();
		$pond_model = new Pond_Model();
		$arr_pond = $pond_model->get_pondlist();
		$arr_frogdetail = $frog_model->get_frogdetails($frog_id);
		$action = "edit";
		$birthYear = date("Y", strtotime($arr_frogdetail[0]['birthdate']));
		$birthMonth = date("n", strtotime($arr_frogdetail[0]['birthdate']));
		$birthDay = date("j", strtotime($arr_frogdetail[0]['birthdate']));
		
		if (strtotime($arr_frogdetail[0]['deathdate']) != ""){ //frog is dead
			$deathYear = date("Y", strtotime($arr_frogdetail[0]['deathdate']));
			$deathMonth = date("n", strtotime($arr_frogdetail[0]['deathdate']));
			$deathDay = date("j", strtotime($arr_frogdetail[0]['deathdate']));
		}
		else{
			$deathYear = 0;
			$deathMonth = 0;
			$deathDay = 0;
		}

		require_once("../view/frog_info_form.php");
	}
	
	function add(){
		$pond_model = new Pond_Model();
		$arr_pond = $pond_model->get_pondlist();
		$action = "add";
		require_once("../view/frog_info_form.php");
	}
	
	function hop(){
		$frog_model = new Frog_Model();
	
		$pond_id = $_POST['pond_id'];
		$frog_id = $_POST['frog_id'];
		
		$frog_model->update_frog_pond($pond_id, $frog_id);
		header("Location: pond.php?action=view&id=".$pond_id);
	}
}

?>