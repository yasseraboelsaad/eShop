<!DOCTYPE html>
<html>
	<head>
		<title>
			eShop
		</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	</head>
	<body>
		<div id="topbar">
			<table style="width:100%">
				<tr>
			    	<td><img src="shoppingcart.png" width = "50" height = "40"> eShop</td>
			    	<td><a href="#myPopup" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all ui-icon-check ui-btn-icon-left">login</a></td>
			    	<td><a href="signup.php">Sign up</a></td>
			   	</tr>
			</table>
		</div>
		<div data-role="popup" id="myPopup" class="ui-content" style="min-width:250px;">
      <form method="post" action="demoform.asp">
        <div>
          <h3>Login information</h3>
          <label for="usrnm" class="ui-hidden-accessible">Username:</label>
          <input type="text" name="user" id="usrnm" placeholder="Username">
          <label for="pswd" class="ui-hidden-accessible">Password:</label>
          <input type="password" name="passw" id="pswd" placeholder="Password">
          <label for="log">Keep me logged in</label>
          <input type="checkbox" name="login" id="log" value="1" data-mini="true">
          <input type="submit" data-inline="true" value="Log in">
        </div>
      </form>
    </div>
  </div>
	</body>
</html>
