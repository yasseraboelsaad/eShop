<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Sign up
		</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet_auth.css">
	</head>
	<body>
		<div id="topbar">
			<table style="width:100%">
				<tr>
			    	<td><img src="images/shoppingcart.png" width = "50" height = "40"> eShop</td>
			   	</tr>
			</table>
		</div>
		<div  class="wrap">
						  <div class="Regisration">
						  	<div class="Regisration-head">
						    	<h2><span></span>Login</h2>
						 	 </div>
						  	<form method="post">
						  		<input type="text" value="Email Address" name= "Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email Address';}" >
								<input type="password" value="Password" name= "Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" >	 
								<div class="submit">
									<input type="submit" onclick="myFunction()" value="Login" name="submit">
								</div>
							</form>
		<?php
			if (isset($_POST['submit'])) {
				$Email = $_POST['Email'];
				$Password = $_POST['Password'];
				mysql_connect('localhost','root','');
				mysql_select_db('eshop');
				$checkUserID = mysql_query("SELECT Email from Users WHERE Email = '$Email' and Password = '$Password'");
				$result = mysql_fetch_row($checkUserID);
					if ($result[0] == $Email) {
						echo "Login successful";
						$_SESSION['authenticated'] = true;
						$_SESSION["user"] = $Email;
						echo "<script> window.location.assign('index.php'); </script>";

					}else{
						echo $result[0];
						echo "Login failed";
					}
			}
		?>
	</body>