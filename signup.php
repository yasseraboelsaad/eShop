<?php
    session_start();
?>
<!DOCTYPE html>
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
			    	<td><img src="images/shoppingcart.png" width = "50" height = "40"> <a href="index.php">eShop</a></td>
			   	</tr>
			</table>
		</div>
		<div  class="wrap">
						  <div class="Regisration">
						  	<div class="Regisration-head">
						    	<h2><span></span>Register</h2>
						 	 </div>
						  	<form method="post">
						  		<input type="text" value="First Name" name= "Fname" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'First Name';}" >
						  		<input type="text" value="Last Name" name= "Lname" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Last Name';}" >
						  		<input type="text" value="Email Address" name= "Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email Address';}" >
								<input type="password" value="Password" name= "Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" >
								<input type="password" value=" Confirm Password" name= "CPassword" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = ' Confirm Password';}" >
								<input id="pic" type="file" name="picture" accept="image/*">	 
								<div class="submit">
									<input type="submit" onclick="myFunction()" value="Sign Me Up" name="submit">
								</div>
		<?php
			if (isset($_POST['submit'])) {
				$Fname = $_POST['Fname'];
				$Lname = $_POST['Lname'];
				$Email = $_POST['Email'];
				$Password = $_POST['Password'];
				$CPassword = $_POST['CPassword'];
				$Avatar = $_POST['picture'];
				mysql_connect('localhost','root','');
				mysql_select_db('eshop');
				$checkUserID = mysql_query("SELECT Email from Users WHERE Email = '$Email'");
				if ($Password == $CPassword) {
					if ($checkUserID) {
						$SQL = "INSERT INTO Users (Fname, Lname, Email, Password, Avatar) VALUES ('$Fname', '$Lname', '$Email', '$Password', '$Avatar')";
						$result = mysql_query($SQL) or die(mysql_error());
						$_SESSION["authenticated"] = true;
						$_SESSION["user"] = $Email;
						header('Location: index.php');
					}else{
						echo "This email already exists.";
					}
				}else{
					echo "Error passwords dont match.";
				}
			}
		?>
	</body>