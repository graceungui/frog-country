<html>

<head><title>Frog Country</title>
<style>
	.tform_div{
	width: 400px;
	background-color: #FFFFFF;
	border: 1px solid #02542e;
	margin: auto; 
	padding: 20px 10px;
	border-radius: 3px;
	}
	.subtext{
		font-size: 14px;
		color: 534d4d;
		font-weight:bold;
		font-family: Arial;
	}
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
	float: right;
}

.button:hover{
	background-color: #FFFFFF;
	color: #02542e;
	border: 1px solid #02542e;
	text-decoration: none;
	cursor: pointer;
}
	</style>
	</head>
	<body>
	<br /><br /><br />
	<div style="width:570px; margin:auto; font-size: 16px;padding-left:100px">
		<img src = "images/frog_logo.png" style = "float:left;" />
		<br/>
		<br/>
	</div>
	
	<div class="tform_div">
		<form action="../src/controller/login.php" method="post">
			<br /><br />
			<table align="center" class="subtext">
				<tr>
					<td>Username</td>
					<td><input type="text" name = "username"></td>
				</tr>
				<tr>
					<td>Password</td>
				<td><input type="password" name = "password"></td>
				</tr>
				<tr>
					<td colspan="2" align="right"><font color="red"><?php if(isset($_GET['error'])){echo "Incorrect username/password!";} ?></font></td>
				</tr>
				<tr>
					<td colspan="2" align="right"><input type="submit" class = "button" value = "Login"></td>
				</tr>
			</table>
		</form>
		</div>
	</body>



</html>