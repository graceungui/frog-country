<form name = "frm_frog" action="../controller/frog.php" method="post">
	<div class = "text_form_title">
		<?php 
			if($action == "edit"){
				$frm_title = "Edit Frog";
			}
			elseif($action == "add"){
				$frm_title = "Add a Frog";
			}
			else{
				$frm_title = "Name this TadPole";
			}
		
		echo $frm_title; 
		
		
		?>
	</div>
	<div class = "tform_div">
		<table style = "width: 100%;">
			<tr>
				<td style = "width: 30%;">Name*</td>
				<td><input type = "text" name = "frog_name" style = "width: 100%;" value = "<?php if($action == "edit"){ echo $arr_frogdetail[0]['name'];}?>"></td>
			</tr>
			<tr>
				<td>Gender*</td>
				<td>
					<select name = "frog_gender" style = "width: 100%;">
						<?php if($action == "edit") { $gender = $arr_frogdetail[0]['gender']; }
								else {$gender = "U"; } ?>
						<option value = "M" <?php if ($gender=="M"){echo 'selected';} ?> >Male</option>
						<option value = "F" <?php if ($gender=="F"){echo 'selected';} ?> >Female</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Birthdate*</td>
				<td>
					<!-- Populate Year list-->
					<select name = "frog_bday_year" >
						<?php
						$year = date('Y');
						while($year >= 1960): ?>
							<option value = "<?php echo $year; ?>" <?php if($action == "edit"){ if($birthYear == $year) {echo "selected"; } }?> >
							<?php echo $year; ?></option>
						<?php $year = $year - 1; endwhile; ?>
					</select>
					
					<!-- Populate Month list-->
					<select name = "frog_bday_month" >
						<?php $month  = 1; while($month<=12):?>
						<option value = "<?php echo $month; ?>" <?php if($action == "edit"){ if($birthMonth == $month) {echo "selected"; } } ?>>
							<?php echo date("F", strtotime("2000-".$month."-01")); ?>
						</option>
						<?php $month = $month + 1; endwhile;?>
					</select>

					<select name = "frog_bday_day" >
						<?php $day = 1;
						while($day <= 31): ?>
							<option value = "<?php echo $day; ?>" <?php if($action == "edit"){ if($birthDay == $day) { echo "selected"; } } ?>>
								<?php echo $day; ?>
							</option>
							
						<?php $day = $day + 1; endwhile; ?>
					</select>

				</td>
			</tr>
			<tr>
				<td>Date of Death</td>
				<td>

					<select name = "frog_death_year" >
						<option value = 0>--</option>
						<?php
						$year = date('Y');
						while($year >= 1960): ?>
							<option value = "<?php echo $year; ?>" <?php if($action == "edit"){ if($deathYear == $year) {echo "selected"; } }?> >
							<?php echo $year; ?></option>
						<?php $year = $year - 1; endwhile; ?>
					</select>
					<select name = "frog_death_month" >
						<option value = 0>--</option>
						<?php $month  = 1; while($month<=12):?>
						<option value = "<?php echo $month; ?>" <?php if($action == "edit"){ if($deathMonth == $month) {echo "selected"; } } ?>>
							<?php echo date("F", strtotime("2000-".$month."-01")); ?>
						</option>
						<?php $month = $month + 1; endwhile;?>
					</select>

					<select name = "frog_death_day" >
						<option value = 0>--</option>
						<?php $day = 1;
						while($day <= 31): ?>
							<option value = "<?php echo $day; ?>" <?php if($action == "edit"){ if($deathDay == $day) { echo "selected"; } } ?>>
								<?php echo $day; ?>
							</option>
							
						<?php $day = $day + 1; endwhile; ?>
					</select>
				
				</td>
			</tr>

			<tr>
				<td>Pond</td>
				<td>
					<?php
						if($action == "mate"){
					?>
						<select name = "frog_pond" style = "width: 100%;">
							<option value = "<?php echo $pond_id;?>"><?php echo $pond_name; ?></option>
						</select>
					
					<?php }else{ ?>
					<select name = "frog_pond" style = "width: 100%;">
						<option value = "0">--</option>
						<?php foreach($arr_pond as $pond): ?>
							<option value = "<?php echo $pond['pond_id']; ?>" <?php if($action == "edit"){ if($arr_frogdetail[0]['pond_id'] == $pond['pond_id']){ echo "selected"; }}?> >
								<?php echo $pond['pond_name']; ?>
							</option>
						<?php endforeach; ?>
					</select>
				<?php }?>
				</td>
			</tr>
			
			<tr>
				<td>&nbsp;</td>
				<td style = "text-align: right; " >
				<input type = "hidden" value = "<?php echo ($action == "edit")?$arr_frogdetail[0]['frog_id']:'0'; ?>" name = "frog_id">
				<input type = "hidden" value = "<?php echo ($action == "mate")?"pond":'frog'; ?>" name = "action">
				<br />
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td style = "text-align:right;">
					<?php
						if($action == "add" || $action == "edit"){
					?>
						<input type = "button" class = "button" id = "cancel" onclick = "javascript:frm_cancel();" value = "Cancel" />
					<?php }else{?>
						<input type = "button" class = "button" id = "cancel" onclick = "javascript:frm_close();" value = "Cancel" />
					<?php }?>
					<input type = "button" onclick="javascript:frm_validate();" class = "button" name = "save" value = "Save" />
				</td>
			</tr>
			
		</table>
	</div>
</form>

<script>
	function frm_close(){
		var div = document.getElementById("mate_form");
		div.style.display = "none";
	}
	function frm_cancel(){
		var newLocation = "../controller/frog.php";
		window.location = newLocation;
	}
	function frm_validate(){
		var frog_name = document.getElementsByName("frog_name");
		if(frog_name[0].value != ""){
			document.frm_frog.submit();
		}
		else{
			alert("Please enter	 required fields.");
		}
	}
</script>
