<?php
session_start();
$_SESSION["User"] = '';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			eShop
		</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
		<script src="js/my_js.js"></script>
	</head>
	<body id="body" style="overflow:hidden;">
		<div id="topbar">
			<table style="width:100%">
				<tr>
			    	<td><img src="images/shoppingcart.png" width = "50" height = "40"> eShop</td>
			    	<td><button id="popup" onclick="div_show()">Login</button></td>
			    	<td><a href="signup.php" class="ui-btn ui-btn-inline ui-corner-all ui-icon-check ui-btn-icon-left">Sign up</a></td>
			   	</tr>
			</table>
		</div>
		<div id="abc">
			<div id="popupContact">
				<form action="#" id="form" method="post" name="form">
					<img id="close" src="images/3.png" onclick ="div_hide()">
					<h2>Login</h2>
					<hr>
					<input id="name" name="user" placeholder="Email" type="text">
					<input id="email" name="passw" placeholder="Password" type="password">
					<input type="submit" onclick="myFunction()" value="Login" name="submit">
				</form>
			</div>
		</div>
  <?php
			if (isset($_POST['submit'])) {
				mysql_connect('localhost','root','');
				mysql_select_db('eshop');
				$Email = $_POST['user'];
				$Password = $_POST['passw'];
				$checkUserID = mysql_query("SELECT Email from Users WHERE Email = '$Email'");
				$checkUserPW = mysql_query("SELECT Password from Users WHERE Email = '$Email'");
				if($checkUserID){
					if($checkUserPW){
						echo "log in successful.";
						$_SESSION["User"] = $Email;
					}else{
						echo "Password is incorrect.";
					}

				}else{
					echo "Email does not exist, Please sign up!";
				}
			}
		?>
		<br>
		<br>
		<h1>HELLO</h1>
		<?php
			echo $_SESSION["User"];
		?>
	</body>
</html>
