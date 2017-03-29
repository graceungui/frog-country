<html>

<head><title>Frog Country</title></head>

<body>
	<?php include("menu.php");?>
	<br/><br/>
		<div style="width:800px;margin:auto;padding:0px;">
			<div class = "tform_div tform_text" style = "text-align: center;"><?php echo $pond_name;?> <br/>
				<div class = "subtext"> <?php echo $pond_location;?> </div> </div><br/>
			<form name="frm_mate" id="frm_mate" action="../controller/frog.php?action=mate" method="post">
				<div style="float:left;width:400px;" class="subtitle">Female Frogs<br />
					<table align="left" style="width:350px;" cellpadding = 2 cellspacing = 0 class = "tdata">
						<tr class = "theader" >
							<td width="15%">Name</td>
							<td width="15%">Age</td>
							<td width="15%"></td>
						</tr>
						<?php
					foreach($arr_female_frog as $key => $frog):?>
						<tr>
							<td><?php echo $frog['name'];?></td>
							<td><?php echo $frog['age'];?></td>
							<td align="center"><input name="f_frog" type="radio" value="<?php echo $frog['frog_id'];?>"></td>	
						</tr>
					<?php endforeach;?>
					</table>
				</div>
				
				<div style="float:left;"  class="subtitle">Male Frogs
					<table align="center" style="width:350px;" class = "tdata" cellpadding = 2 cellspacing = 0>
						<tr class = "theader">
							<td width="15%">Name</td>
							<td width="15%">Age</td>
							<td width="15%"></td>
						</tr>
						<?php
					foreach($arr_male_frog as $key => $frog):?>
						<tr>
							<td><?php echo $frog['name'];?></td>
							<td><?php echo $frog['age'];?></td>
							<td align="center"><input name="m_frog" type="radio" value="<?php echo $frog['frog_id'];?>"></td>	
						</tr>
					<?php endforeach;?>
					</table>
				</div>
				<div style="clear:both;">&nbsp;</div>
				<div style="margin:auto;text-align:right;padding-right:50px;"><input class="button" type="button" onclick = "javacript:mate_frog();" value="Mate" /></div>
			</form>
			</div>
			
				<div id = "mate_form" style="display:none;z-index:9999;padding-top:115px;position:fixed;top:0;margin:auto;left:0px;width:100%;height:100%;background-color:rgba(0, 0, 0, 0.9);">
					<br />
					
					<?php 
						include("frog_form.php");
					?>
			</div>
			
</body>

<script>
	function mate_frog(){
		var f_frog = document.frm_mate.f_frog.value;
		var m_frog = document.frm_mate.m_frog.value;
		
		if(f_frog != "" && m_frog != ""){
			var div = document.getElementById('mate_form');
			div.style.display = "block";
		}
		else{
			alert("Please choose female and male frogs to mate.");
			return false;
		}
		
		
		
	}

</script>

</html>