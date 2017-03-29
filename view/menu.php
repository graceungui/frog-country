<style>

.menu_item{
	float:left;
	width:100px;
	height:30px;
	padding-top:3px;
	text-align:center;
	color:#FFFFFF;
	background-color: #013a1f;
	border: 1px solid #013a1f;
}
.menu_item:hover{
	background-color: #FFFFFF;
	color:#02542e;
}
.clear{
	clear:both;	
}

a{
color: #013a1f;
text-decoration: none;
}

a:hover{
color: #02542e;
}

body{
	font-family: Arial, "Trebuchet MS";
	font-size: 14px;
}

.theader{
	background-color:#02542e;
	color:#FFFFFF;
	font-weight:bold;
	font-size: 14px;
}

.theader td{
padding: 7px 0px;
}

.tdata{
border: 1px solid #f2f2f2;
font-size: 13px;
}

.tdata tr td{
padding-left: 7px;
}

.tdata tr:nth-child(even) {background: #fff; }
.tdata tr:nth-child(odd) {background: #e5fef0; }
.tdata tr:nth-child(1) {background: #02542e; color: #FFFFFF; font-weight: bold;}

.button{
	width:80px;
	margin:auto;
	text-align: center;
	border-radius: 0px 8px;
	background-color: #02542e;
	color: #ffffff;
	padding: 5px 0px;
	border: 1px solid #02542e;
	text-decoration: none;
}

.button:hover{
	background-color: #FFFFFF;
	color: #02542e;
	border: 1px solid #02542e;
	text-decoration: none;
	cursor: pointer;
}

.container{
	width: 800px; margin: auto; 
}

.text_form_title{
	width: 414px;
	margin: auto;
	font-size: 16px;
	color: #fff;
	padding:3px;
	background-color: #02542e;
	font-weight:bold;
	border:1px solid #02542e;
	border-radius: 3px 3px 0px 0px;
}

.tform_div{
	width: 400px;
	background-color: #FFFFFF;
	border: 1px solid #02542e;
	margin: auto; 
	padding: 20px 10px;
	border-radius: 0px 0px 3px 3px;
}

.tform_div table tr td{
	font-size:14px;
	font-family:Arial;
	font-weight:bold;
}

.subtext{
	font-size: 12px;
	color: #534d4d;
}

.subtitle{
	font-size: 14px;
	color: #534d4d;
	padding:3px;
	font-weight:bold;
}

.tform_text{
	font-size: 40px;
	color: #534d4d;
	padding:10px;
	font-weight:bold;
}

</style>
<div>
	<div style="width:570px; margin:auto; font-size: 16px;">
		<img src = "../images/frog_logo.png" style = "float:left;" />
			<div style = "font-size: 12px; text-align: right; float: right; padding-right: 17px;"><strong>Hello <?php echo $_SESSION['username'];?>!</strong></div>
		<br/>
		<a href="../controller/pond.php"><div class="menu_item" style = "border-radius: 0px 0px 0px 15px; margin-left: 10px;">Pond</div></a>
		<a href="../controller/frog.php"><div class="menu_item" style = "" >Frogs</div></a>
		<!-- <a href="../controller/frog.php?action=mate"><div class="menu_item">Mate Frogs</div></a> -->
		<a href="../controller/logout.php"><div class="menu_item" style = "border-radius: 0px 15px 0px 0px;">Logout</div></a>
		<div class="clear"></div>
	</div>
</div>
