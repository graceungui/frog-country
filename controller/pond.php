<?php
/**
 Created By: Grace Ungui
 Created Date: 2016/05/29
 Description: Pond controller is used for pond operations such as add/edit pond

**/

require_once("../session.php");
require_once("../model/pond_model.php");

$pond = new Pond();
$pond_model = new Pond_Model();

if(isset($_GET['action'])){
//action is edit
	$action = $_GET['action'];
	switch($action){
		case "edit": 
			$pond_id = (isset($_GET['id'])?$_GET['id']:'');
			$pond->edit($pond_id);
			break;
		case "add": $pond->add();
			break;
		case "mate": $pond->mate_frog();
			break;
		case "view": $pond->view_frog_list($_GET['id']);
			break;
		default: $pond->index();
	}
}elseif(isset($_POST['pond_name'])){
	//action is save
	//capture the values entered
	$pond_name = $_POST['pond_name'];
	$pond_location = $_POST['pond_location'];
	$pond_id = $_POST['pond_id'];
	
	
	
	//identify if it is edit or add
	if($pond_id != 0){
		//save is invoked from Edit, update the frog record
		$pond_model->update_pond($pond_id, $pond_name, $pond_location);
	}else{
		$pond_model->insert_pond($pond_name, $pond_location);
	}
	
	$pond->index();
}
else{
	$pond->index();
}

class Pond{
	
	function index(){
		$pond_model = new Pond_Model();
		$arr_pond = $pond_model->get_pondlist();
		require_once("../view/pond.php");
	}
	
	function edit($pond_id){
		$pond_model = new Pond_Model();
		$arr_pond_detail = $pond_model->get_pond_detail($pond_id);
		$action = "edit";
		
		require_once("../view/pond_info_form.php");
	}
	
	function add(){
		$action = "add";
		require_once("../view/pond_info_form.php");
	}
	function view_frog_list($pond_id){
		$pond_model = new Pond_Model();
		$arr_female_frog = $pond_model->get_pond_froglist($pond_id,"F");
		$arr_male_frog = $pond_model->get_pond_froglist($pond_id,"M");
		$pond_name = $pond_model->get_pond_name($pond_id);
		$pond_location = $pond_model->get_pond_location($pond_id);

		$action = "mate";
		
		require_once("../view/mate_frog.php");
	}

}

?>