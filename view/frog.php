<html>

<head><title>Frog Country</title></head>

<body>
	<?php include("menu.php");?>
	<div class = "container">
		<br/>

		<a href="../controller/frog.php?action=add"><div style="float:right;" class="button">Add Frog</div></a>
		<div style="clear:both" />
		<table align="center" style="width:800px;" cellpadding = 2 cellspacing = 0 class = "tdata">
			<tr class = "theader" >
				<td width="12%">Name</td>
				<td width="10%">Gender</td>
				<td width="12%">Birthdate</td>
				<td width="12%">Date of Death</td>
				<td width="12%">Pond</td>
				<td width="10%" style = "text-align: center; ">Hop to Pond</td>
				<td width="5%">&nbsp;</td>
			</tr>
			<?php
				foreach($arr_frog as $key => $frog):?>
				<tr>
					<td><?php echo $frog['name'];?></td>
					<td><?php echo $frog['gender'];?></td>
					<td><?php echo $frog['birthdate'];?></td>
					<td><?php echo $frog['deathdate'];?></td>
					<td><?php echo $frog['pond_name'];?></td>
					<td style = "text-align: center;text-decoration:underline; "><?php if($frog['deathdate'] == ""){?><a href="#" onclick = "javacript:hop_frog(<?php echo $frog['frog_id']; ?>); ">hop</a><?php }?></td>
					<td style = "text-align: center;text-decoration:underline; "><?php if($frog['deathdate'] == ""){?><a href="../controller/frog.php?action=edit&id=<?php echo $frog['frog_id'];?>">edit</a><?php }?></td>
				</tr>
			<?php endforeach;?>
			
		</table>
		<br /><br />
	</div>
	
	<div id = "hop_form" style="display:none;z-index:9999; position:fixed;top:0;margin:auto;left:0px;width:100%;height:100%;background-color:rgba(0, 0, 0, 0.9);">
		<div class="text_form_title" style="margin-top:150px;"><strong>Frog Playing Ground</strong></div>
		<div class = "tform_div" style="text-align:center;">
			<br />
			<form action="../controller/frog.php?action=hop" method = "post" >
				<select name = "pond_id" style="width:80%;height:40px;font-size:20px;">
					<?php foreach($arr_pond as $pond): ?>
						<option value = "<?php echo $pond['pond_id']; ?>" >
							<?php echo $pond['pond_name']; ?>
						</option>
					<?php endforeach; ?>
				</select>
			<div>
			<br />
			<input type = "hidden" name = "frog_id" id = "frog_id" value = "" />
			<div style="float:right; padding-right:39px;"><input name = "hop" class="button" type = "submit" value = "Hop!">&nbsp;<input name = "close" class="button"  type = "button"  onclick = "javacript:close_frm();" value = "Close"></div>
			<br />
			<div style="clear:both;"></div>
			</form>
		</div>	
	</div>
	
</body>

<script>
	function hop_frog(frog_id){
		var div = document.getElementById('hop_form');
		document.getElementById("frog_id").value = frog_id;
		
		div.style.display = "block";
	}
	
	function close_frm(){
		var div = document.getElementById('hop_form');
		div.style.display = "none";
	}
	
	

</script>

</html>