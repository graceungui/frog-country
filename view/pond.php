<html>

<head><title>Frog Country</title></head>

<body>
	<?php include("menu.php");?>
	<div class = "container">
		<br/>
		<a href="../controller/pond.php?action=add"><div style="float:right;" class="button">Add Pond</div></a>
		<div class = "clear"> </div>
		<table align="center" style="width:100%;" cellpadding = 2 cellspacing = 0 class = "tdata">
			<tr class = "theader">
				<td width="12%">Name</td>
				<td width="10%">Location</td>
				<td width="10%">Frog Count (Alive)</td>
				<td width="10%">Frog Members</td>
				<td width="5%">&nbsp;</td>
			</tr>
			<?php
				foreach($arr_pond as $key => $pond):?>
				<tr>
					<td><?php echo $pond['pond_name'];?></td>
					<td><?php echo $pond['pond_location'];?></td>
					<td><?php echo $pond['frog_count'];?></td>
					<td style="text-align:center;text-decoration:underline;"><a href="../controller/pond.php?action=view&id=<?php echo $pond['pond_id'];?>">view</a></td>
					<td style="text-align:center;text-decoration:underline;"><a href="../controller/pond.php?action=edit&id=<?php echo $pond['pond_id'];?>">edit</a></td>
				</tr>
			<?php endforeach;?>
			
		</table>
		<br /><br />
	</div>
</body>


</html>