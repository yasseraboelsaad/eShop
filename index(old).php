<?php
session_start();
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
			    		<td><input type="submit" id="logout" name="logout" value="Log out" /></td>
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
		<br>
		<br>
		<br>
  <?php
			mysql_connect('localhost','root','');
			mysql_select_db('eshop');
			if (isset($_POST['submit'])) {
				$Email = $_POST['user'];
				$Password = $_POST['passw'];
				$sql = mysql_query("SELECT Email FROM Users WHERE Email = '$Email' AND Password = '$Password'")or die(mysql_error());
				echo "lel";
				if (mysql_num_rows($sql) == 1) {
					echo "HI";
                        $_SESSION['authorized'] = true;
                        $_SESSION['success'] = 'Login Successful';
                        $_SESSION['User']='$Email';
                        header('Location: ./index.php');
                        exit;
				} else {
               		$_SESSION['error'] = 'Sorry, wrong username or password';
 				}
			}
			if (isset($_POST['logout'])) {
				session_unset();
				$_SESSION['authorized']=false;
				$_SESSION['User']="";
			}
		?>
		<h1>HELLO</h1>
		<?php
			$query = "SELECT * FROM Product";
			$result = mysql_query($query);
			$num = mysql_num_rows($result);

			while($row = mysql_fetch_assoc($result))
			{

			    echo "<tr><td align=center>{$row['Name']}</td><td align=center>{$row['Price']}</td>";
			    echo "<td align=center>{$row['Stock']}</td>";
			}
		?>
	</body>
</html>
