<!DOCTYPE html>
<?php

?>
<html>
	<head>
		<title>
			Sign up
		</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	</head>
	<body>
		<div id="topbar">
			<table style="width:100%">
				<tr>
			    	<td><img src="shoppingcart.png" width = "50" height = "40"> eShop</td>
			   	</tr>
			</table>
		</div>
		<br>
		<br>
		<br>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<form class="form-horizontal" role="form" method="post">
						<div class="form-group">
							 
							<label for="inputFname3" class="col-sm-2 control-label">
								First Name
							</label>
							<div class="col-sm-10">
								<input type="fname" class="form-control" id="inputFname3" name="Fname" />
							</div>
						</div>
						<label for="inputLname3" class="col-sm-2 control-label">
								Last Name
							</label>
							<div class="col-sm-10">
								<input type="lname" class="form-control" id="inputLname3" name="Lname"/>
							</div>
						</div>
							<div class="form-group">
							 <label for="inputEmail3" class="col-sm-2 control-label">
								Email
							</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="inputEmail3" name="Email"/>
							</div>
							<div class="form-group">
							 
							<label for="inputPassword3" class="col-sm-2 control-label">
								Password
							</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="inputPassword3" name="Password"/>
							</div>
							<div class="form-group">
							 
							<label for="inputCPassword3" class="col-sm-2 control-label">
								Confirm Password
							</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="inputCPassword3" name="CPassword"/>
							</div>
							<div class="form-group">
							 
							<label for="inputAvatar3" class="col-sm-2 control-label">
								Avatar
							</label>
							<div class="col-sm-offset-2 col-sm-10">
								 
								<button type="browse" class="btn btn-default">
									Browse
								</button>
							</div>
						</div>
						</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								 
								<input type="submit" class="btn btn-default" name="submit">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php
			if (isset($_POST['submit'])) {
				$Fname = $_POST['Fname'];
				$Lname = $_POST['Lname'];
				$Email = $_POST['Email'];
				$Password = $_POST['Password'];
				$CPassword = $_POST['CPassword'];
				mysql_connect('localhost','root','');
				mysql_select_db('eshop');
				if ($Password == $CPassword) {
					$SQL = "INSERT INTO Users (Fname, Lname, Email, Password, Avatar) VALUES ('$Fname', '$Lname', '$Email', '$Password', '')";
					$result = mysql_query($SQL) or die(mysql_error());
				}
			}
		?>
	</body>