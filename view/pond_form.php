<form id = "frm_pond" name = "frm_pond" action="../controller/pond.php" method="post">
	<div class = "text_form_title"><?php echo ($action == "edit")?"Edit Pond":"Create a Pond"; ?></div>
	<div class = "tform_div">
		<table style = "width: 100%;">
			<tr>
				<td style = "width: 30%;">Pond Name*</td>
				<td><input type = "text" name = "pond_name" style = "width: 100%;" value = "<?php if($action == "edit"){ echo $arr_pond_detail[0]['pond_name']; }?>"></td>
			</tr>
			<tr>
				<td style = "width: 30%;">Location*</td>
				<td><input type = "text" name = "pond_location" style = "width: 100%;" value = "<?php if($action == "edit"){ echo $arr_pond_detail[0]['pond_location']; }?>"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td style = "text-align: right; " >
				<input type = "hidden" value = "<?php echo ($action == "edit")?$arr_pond_detail[0]['pond_id']:'0'; ?>" name = "pond_id">
				<br />
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td style = "text-align: right; " >
				<input type = "submit" name = "cancel" onclick = "javascript:frm_cancel();" value = "Cancel" class = "button" />
				<input type = "button" onclick = "javascript:frm_validate();" name = "save" value = "Save" class = "button" /></td>
			</tr>
		</table>
	</div>
</form>

<script>
	function frm_cancel(){
		var newLocation = "../controller/pond.php";
		window.location = newLocation;
	}
	
	function frm_validate(){
		var pond_name = document.getElementsByName("pond_name");
		var pond_location = document.getElementsByName("pond_location");

		if(pond_name[0].value != "" && pond_location[0].value != ""){
			document.frm_pond.submit();
			
			//frm_pond.submit();
		}
		else{
			alert("Please enter	 required fields.");
		}
		//alert(pond_name);return false;
	
	}
</script>